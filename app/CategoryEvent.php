<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    protected $table = 'category_event';
    protected $fillable = ['event_id' , 'category_id'];

}
