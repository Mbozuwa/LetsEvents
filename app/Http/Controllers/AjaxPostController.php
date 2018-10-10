<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AjaxPostController extends Controller
{
    /**
     * Render a form to perform an ajax post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('formajax.form_ajax_post');
    }

    /**
     * Receive the ajax POST request from the form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxpost(Request $request)
    {
        return view('formajax.form_ajax_post_response', ['request' => $request->all()]);
    }
}