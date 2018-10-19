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
	public function index()
	{
		$categories = Category::all();
	}

	public function show($id)
    {
      // $category_name = DB::table('categories')->select('id', $id)->get();

	  $category = Category::find($id);
      $events = Category::find($id)->events()->get();

	  // Category::find($id)->events()->get();
	  $test = Event::find($id)->category();

	  // Categories::find($id)->events()->get();
      // $events = $category->event();
	  // dd(Category::where('category_id' ,$id));
      return view('categories/show', ['events' => $events, 'category' => $category]);
    }
}
