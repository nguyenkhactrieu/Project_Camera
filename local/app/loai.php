<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\chungloai;
class loai extends Model
{
    protected $table = 'webma_loaisp';

    public function chungloai (){
    	return $this->belongTo('App\chungloai' , 'idCL' , 'idLoai');
    }

    public function sanpham () {
    	return $this->hasMany('App\sanpham' , 'idLoai' , 'idLoai');
    }

    public function gSuaLoai ($id){
    	$loai = loai::where('idLoai', $id)->select('idLoai','idCL','TenLoai')->first();
    	$chungloai = chungloai::all();
    	return [$loai,$chungloai];
    }

    public function pSuaLoai ($idchungloai, $idloai, $tenloai){
    	$loai = loai::where('idLoai', $idloai)->update(['idCL'=>$idchungloai,'TenLoai'=>$tenloai,'slug_loai'=>str_slug($tenloai)]);
    }
}
