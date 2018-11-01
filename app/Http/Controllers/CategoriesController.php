<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
	/**
	*
	* @return \Illuminate\Http\Response
	*/

	/*
	*this functions gets all the categorys by id and shows the events corresponding to that category id
	*/
	public function show($id)
    {

	  $category = Category::find($id);
      $events = Category::find($id)->events()->get();

      return view('categories/show', ['events' => $events, 'category' => $category]);
    }
}
