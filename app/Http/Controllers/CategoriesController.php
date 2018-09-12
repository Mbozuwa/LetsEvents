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
}
