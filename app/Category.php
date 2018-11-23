<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	* The attributes that are mass assignable.
	**/
	protected $fillable = ['name'];

	/**
	* The table associated with the model.
	*/
	protected $table = 'category';

	public function events() {
      return $this->belongsToMany('App\Event', 'category_event', 'category_id')->withPivot('category_id', 'event_id');
  }
}
