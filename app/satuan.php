<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    public function barang(){
    	return $this->hasMany('App\barang');
    }
}
