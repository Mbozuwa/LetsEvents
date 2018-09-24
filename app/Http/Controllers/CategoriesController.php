<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;

class CategoriesController extends Controller
{
	/**
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$categories = Categories::all();
	}

	public function show($id)
    {
      // $category_name = DB::table('categories')->select('id', $id)->get();
      $category = Categories::where('category_id' ,$id);
      $events = $category->event;
      // $cat_prd = Categories::all()->load('product');
      // , 'category' => $category_name
	  // dd($events);
      return view('categories/show', ['events' => $events]);
    }
}
