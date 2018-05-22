<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\sanpham;
use App\loai;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Cart;
use DB;
use App\donhang;
use App\chitiet_donhang;
class PageController extends Controller
{

    /*function __construct (sanpham $sanpham){
        //
    }*/
    public function getChinhSach()
    {
        return view('chinhsach');
    }
    public function getIndex(){
        $sanpham = new sanpham();
        $sanpham = $sanpham->getTatCaSanPham(); //
    	return view('page.trangchu', compact('sanpham'));
       
    }
    public function getLoaiSanPham ($slug_loai){
        
        $loai = new sanpham();
        list($SP_TheoLoai,$TenLoai) = $loai->getLoaiSanPham($slug_loai);
        /*
        |
        |   lấy 5 sản phẩm có lượt xem nhiều nhất
        |
         */
        $sanpham_xemnhieu = $loai->getSanPhamXemNhieu();
        return view('page.loaisanpham', compact('SP_TheoLoai','sanpham_xemnhieu','TenLoai'));
    }
    // chi tiet san pham
    public function getChiTiet(Request $req){
        
    	$sanpham = new sanpham();
        $chitietsanpham = $sanpham->getChiTietSanPham($req->slug_sp);
        /*
        |
        |   Nếu slug_sanpham không tồn tại thì thông báo lỗi
        |
        */
        if($chitietsanpham == null){
            return view('errors.404'); 
        }else{
            $sp_cungloai = $sanpham->getSanPhamCungLoai($req->slug_sp);
            return view('page.chitietsanpham', compact('chitietsanpham','sp_cungloai')); 
        }
    	
    }

    public function getDanhGia($id , $value){

        $danhgia = new sanpham();
        $solanchon = $danhgia->getDanhGia($id, $value);

        echo '<span>'.round (($solanchon->DiemTrungBinh),1).'/10'.' ('.$solanchon->SoLanChon .' Lượt)'.'</span>';
    }
    public function getDangNhap(){
        return view('page.dangnhap');
    }

    public function postDangNhap(Request $req){
        /*
        |
        |   kiểm tra dữ liệu nhập vào
        |
         */
        $this->validate($req,
            [
                'email'=>'required|',
                'password'=>'required'
            ], 
            [
                'email.required'=>'nhap email',
                'password.required'=>'nhap password'
            ]
        );
        
        $remember = false;

        if(isset($req->remember)){
            $remember = true;
        }

        $chungnhan = array('email'=>$req->email,'password'=>$req->password); //('email-cot trong database')
        if(Auth::attempt($chungnhan, true)){
            return redirect()->route('trang-chu');
        }else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'EMAIL HOẶC MẬT KHẨU KHÔNG ĐÚNG']);
        }
    }
    // dang xuat
    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    // dang ki 
    public function getDangKi(){
        return view('page.dangki');
    }
    public function postDangKi(Request $req){
        $hoten = str_slug($req->hoten);
        $this->validate($req,
            [
                'username'=>'required|min:6|max:24',
                'password'=>'required|min:6|max:24',
                'nhaplai_password'=>'required|same:password',
                'hoten' =>'required',
                'email' => 'required|email',
                'sodienthoai'=> 'required',
                'diachi' => 'required'
            ],
            [
                'username.required'=>'Nhập username',
                'username.min'=>'Tên đăng nhập phải lớn hơn 6 kí tự',
                'username.max'=>'Tên đăng nhập phải nhỏ hơn 12 kí tự',
                'password.required'=>'nhập password',
                'password.min'=>'Mật khẩu lớn hơn 6 kí tự',
                'password.max'=>'Mật khẩu nhỏ hơn 24 kí tự',
                'nhaplai_password.same'=>'Nhập lại không đúng',
                'nhaplai_password.required'=>'nhập lại password',
                'hoten.required'=>'nhập họ tên',
                'email.required'=>'nhập email',
                'email.email'=>'nhập email ko đúng',
                'sodienthoai.required'=>'nhập sđt',
                'diachi.required'=>'nhập địa chỉ'
            ]
        );

        $user = new User();
        $user->UserName = $req->username;
        $user->Password = Hash::make($req->password);
        $user->name = $req->hoten;
        $user->Email = $req->email;
        $user->SDT = $req->sodienthoai;
        $user->DiaChi = $req->diachi;
        $user->slug = $hoten;

        $user->save();

        return redirect()->back()->with('thongbao', 'ĐĂNG KÍ TÀI KHOẢN THÀNH CÔNG');

    }
}
