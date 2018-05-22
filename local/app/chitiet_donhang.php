<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiet_donhang extends Model
{
    protected $table = 'webma_chitietdh';

    public function donhang (){
    	return $this->belongTo('App\donhang', 'idDH', 'idDH');
    }
}
