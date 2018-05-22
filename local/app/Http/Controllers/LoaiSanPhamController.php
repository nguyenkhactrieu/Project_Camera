<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\chungloai;
use App\User;
use App\sanpham;
use App\loai;

class LoaiSanPhamController extends Controller
{
    /*
    |
    |   Lấy ra danh sách loại
    |
     */
    public function getDanhSachLoai (){
        $stt = 0;
        $ds_loai = loai::where('AnHien', 1)->Paginate(10);
        return view('admin.loai.loai', compact('ds_loai', 'stt'));
    }

    public function getThemLoai () {
        $chungloai = chungloai::where('AnHien', 1)->get();
        return view('admin.loai.them', compact('chungloai'));
    }

    public function postThemLoai (Request $req) {
        $idChungLoai = $req->chungloai ;
        $tenloai = $req->tenloai;
        $slug = str_slug($req->tenloai);

        $themloai = new loai();
        $themloai->idCL = $idChungLoai;
        $themloai->TenLoai = $tenloai;
        $themloai->slug_loai = $slug;
        $themloai->save();

        return redirect()->route('danhsachloai');
    }

    public function getXoaLoai ($id) {
        $xoaloai = loai::where('idLoai' , $id )->delete();
        return redirect()->back();
    }

    public function getSuaLoai ($id){
        $loai = new loai();
        list($loai,$chungloai) = $loai->gSuaLoai($id);
        return view('admin.loai.sua',compact('loai','chungloai'));
    }

    public function postSuaLoai (Request $req){
        $loai = new loai();
        $loai = $loai->pSuaLoai($req->chungloai,$req->idLoai,$req->tenloai);
        return redirect()->route('danhsachloai');
    }
}
