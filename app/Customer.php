<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    public function bill_detail(){
        return $this->hasMany('App\Bill','id_customer','id');
    }
    public function bill(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }
}
