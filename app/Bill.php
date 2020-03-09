<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    public function bill(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
}
