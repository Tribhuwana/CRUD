<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    public function satuan(){
    	return $this->belongsTo('App\satuan');
    }

}
