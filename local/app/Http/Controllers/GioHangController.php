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

class GioHangController extends Controller
{
    public function getMuaHang ($id){
        /*
        |
        |   lấy thông tin sản phẩm người dùng mua
        |
         */
        $sanpham = sanpham::where('idSP', $id)->first();
        /*
        |
        |   tính giá khuyến mãi
        |
         */
        $khuyenmai = ((100 - $sanpham->KhuyenMai)/100)*$sanpham->Gia;
        /*
        |
        |   lưu vào giỏ hàng => id, name, qty, price
        |   lưu thêm thông tin khác dùng option
        |
         */
        Cart::add(
            ['id' => $id , 
            'name'=>$sanpham->TenSP,
            'qty'=>1, 
            'price'=>$khuyenmai,
            'options'=>['img'=>$sanpham->UrlHinh]
        ]);
        return redirect()->route('giohang');
    }
    public function getGioHang(){
        /*
        |
        |   lấy ra thông tin của giỏ hàng, bao gồm các sản phẩm có trong giỏ hàng
        |
         */
        $content = Cart::content();
        /*
        |
        |   tính tổng tiền các sản phẩm trong giỏ => subtotal();
        |
         */
        $total = Cart::subtotal();
        /*
        |
        |   nếu giỏ hàng rỗng thì view giohang_rong.blade.php
        |
         */
        if(Cart::count() == 0){
            return view('page.giohang_rong');
        }
        return view('page.giohang', compact('content','total'));
    }
    public function getXoaSanPham ($id) {
        /*
        |
        |   xóa sản phẩm khỏi giỏ hàng dựa vào id.
        |
         */
        Cart::remove($id);
        return redirect()->route('giohang');
    }
    public function getCapNhatGioHang(Request $req){
            $qty = (int)$req->qty;
            cart::update($req->rowID,$qty);
            return redirect()->route('giohang');
    }

    public function postDatHang(Request $req){
        /*
        |   Lưu đơn hàng (thông tin người đặt hàng)
        |
         */
        $donhang = new donhang();
        $idDH = time();
        $donhang->HoTen = $req->name;
        $donhang->GioiTinh = $req->male_f;
        $donhang->SDT = $req->phone;
        $donhang->Email = $req->email;
        $donhang->GhiChu = $req->note;
        $donhang->SoNha = $req->so_nha;
        $donhang->idDH = $idDH;
        $donhang->save();


        $content = Cart::content();
        $total = Cart::subtotal();

        /*
        |   lưu chi tiết đơn hàng (idsp, qty, price)
         */
        foreach($content as $item){
            $chitiet_donhang = new chitiet_donhang();
            $chitiet_donhang->idDH = $idDH;
            $chitiet_donhang->idSP = $item->id;
            $chitiet_donhang->SoLuong = $item->qty;
            $chitiet_donhang->Gia = $item->price;
            $chitiet_donhang->save();
        }
        $name = $req->name;
        if($req->male_f == 1){
            $male_f = 'Anh';
        }else{
            $male_f = 'Chị';
        }
        $info_address = $req->so_nha;
        return view('page.order', compact('name','content','total','male_f','info_address'));
    }
     public function getDatHang(){
        return view('errors.error');
    }
}
