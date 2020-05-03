<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    public function customer(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }
    public function product(){
        return $this->belongsTo('App\Product','id_product','id');
    }
}
