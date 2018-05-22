<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\chungloai;
use App\User;
use App\sanpham;
use App\loai;
class AdminController extends Controller
{

    /*
    |
    |   Đăng nhập admin
    |
     */
    function getSua(){
        $sanpham = sanpham::select('mota','idSP')->get();
        return view ('sua', compact('sanpham'));
    }

    function postSua(Request $req){
        $update = sanpham::where('idSP', $req->idsp)->update(['mota'=>$req->mota]);
        return redirect()->back();
    }


    public function getDangNhapAdmin () {
    	
        if(Auth::check()){
            return redirect()->route('trangchuadmin');
        }else{
            return view('admin.dangnhap.dangnhap');
        }
    }

    public function postDangNhapAdmin (Request $req){

    	$this->validate($req,
            [
                'email'=>'required|',
                'password'=>'required'
            ], 
            [
                'email.required'=>'Nhập email',
                'password.required'=>'Nhập password'
            ]
        );

        $remember = $req->input('remember');

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password, 'idGroup'=>1], $remember)){

            return redirect()->route('trangchuadmin');

        }else{

            return redirect()->back()->with(['flag'=>'danger', 'message'=>'SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU']);
        }
    }

    /*
    |
    |   Đăng xuất
    |
     */
    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('admin');
    }

    /*
    |
    |   Trang chủ
    |
     */
    public function getTrangChu(){
        return view('admin.trangchu.trangchu');
    }

    public function getChonChungLoai ($idChungLoai){
        
        $LoaiSanPham = loai::where('idCL', $idChungLoai)->get();

        echo "<option>----Chọn loại----</option>";
        foreach ($LoaiSanPham as $loaisp) {
            echo "<option value='".$loaisp->idLoai."'>".$loaisp->TenLoai."</option>";
        }
    }
    
}
