<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class chungloai extends Model
{
    protected $table = 'webma_chungloaisp';
    
    public function loai (){
    	return $this->hasMany('App\loai' , 'idCL' , 'idCL');
    } 

    public function getsuachungloai($id){
    	$name = chungloai::where('idCL', $id)->select('TenCL','idCL')->first();
    	return $name;
    }
    public function postsuachungloai($name,$id){
    	$name = chungloai::where('idCL', $id)->update(['TenCL'=>$name,'slug_cl'=>str_slug($name)]);
    }
}
