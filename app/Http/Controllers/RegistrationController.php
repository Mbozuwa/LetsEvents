<?php

namespace App\Http\Controllers;

use App\Registration;
use App\PaymentStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use Auth;
use URL;

// use App\Registration;
use App\Email;
use Mail;
use App\Mail\Registered;
use App\Event;


class RegistrationController extends Controller
{
        public function __construct()
        {

            /** PayPal api context **/
            $paypal_conf = \Config::get('paypal');
            $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
            );
            $this->_api_context->setConfig($paypal_conf['settings']);

        }
    /**
     * Function to set the status to "ik ga"
     */
    public function userGoing($id) {
    	  $user = Auth::user();
    	  $registration = new Registration([
          'user_id' => $user['id'],
          'event_id' => $id,
          'status' => "Ik ga",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        $event = \App\event::find($id);
         try {
             Mail::to($user->email)->send(new Registered($event, $user));
         } catch (\Exception $e) {
             return redirect()->back()->with('error', __('msg.reminder.send.error'));
         }

        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }
    /**
     * Function to set the status to "misschien"
     */
    public function userMaybe($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Misschien",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat misschien naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }
    /**
     * Function to set the status to "ik ga niet"
     */
    public function userNotGoing($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga niet",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat niet naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }

    /**
     * Paypal function
     * Remember event_id in the session. Set item_1 as the event and the price $request->amount. $amount and $transaction are required by  * paypal. Set redirect urls to status and set payment type to sale. After this check if the api connection is still valid. If not      * redirect to homescreen with message. After this redirect to the secure paypal url.
     */
    public function payWithpaypal(Request $request)
        {
        session(['event_id' => $request->event_id]);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($request->event_id)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($request->event_id);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', __('msg.RegistrationController.payment.error'));
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }
    /**
     * Feature for getting the status that paypal sends back. Clear the session. If any hackers get back without a payer ID it'll get      * reqocnised. if not safe payment status into database and redirect back to the event page
     */
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        Session::forget('error');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::to('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            $store = new PaymentStatus();
            $store->payment_status = $result->getState();
            $store->event_id = session('event_id');
            $store->user_id = Auth::user()->id;
            $store->save();
            return Redirect::to('/event/'. session('event_id'))->with('message', __('msg.RegistrationController.payment.success'));
        }
        $store = new PaymentStatus();
            $store->payment_status = $result->getState();
            $store->event_id = session('event_id');
            $store->user_id = Auth::user()->id;
            $store->save();
        return Redirect::to('/event/'. session('event_id'));
    }
}
