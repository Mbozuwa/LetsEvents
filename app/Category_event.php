<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_event extends Model
{
    protected $table= 'category_event';
    protected $fillable= ['event_id' , 'category_id'];

    public function event(){
        return $this->belongsTo('App\Event');
	}
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
