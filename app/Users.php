<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'telephone'
    ];
    protected $table = "users";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function profileInformation(Request $request, $id) {
        $profile = \App\profile::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
    
        $request->session()->put('cart', $cart);
      }

}
