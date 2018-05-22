<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function getUser(){
        $user = User::Paginate(5);
        return $user;
    }

    function getSua ($id) {
        $user = User::where('id', $id)->first();
        return $user;
    }

    function postSua ($req){
        $user = User::where('id',$req->idUser)->update([
            'idGroup' => $req->groups,
            'name' => $req->hoten,
            'SDT' => $req->sdt,
            'DiaChi' => $req->diachi,
            'TinhTrang' => $req->tinhtrang,
            'slug'=> str_slug($req->hoten)
        ]);
    }
}
