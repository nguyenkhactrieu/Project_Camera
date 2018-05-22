<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
   	protected $table = 'webma_donhang';

   	public function chitietdonhang (){
   		return $this->hasMany('App\chitiet_donhang', 'idDH', 'idDH');
   	}
}
