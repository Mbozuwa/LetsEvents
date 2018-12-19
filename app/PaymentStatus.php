<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paymentAmount', 'paymentStatus', 'event_id', 'user_id'
    ];

    protected $table = "transaction";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function registration() {
        return $this->belongsTo('App\Registration');
    }

    public function paymentStatus() {
        return $this->hasOne('App\PaymentStatus', 'event_id', 'user_id');
    }
}
