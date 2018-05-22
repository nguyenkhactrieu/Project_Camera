<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\chungloai;
use App\User;
use App\sanpham;
use App\loai;

class SanPhamController extends Controller
{
    /*
    |
    |   Lấy ra danh sách sản phẩm
    |
     */
    public function getDanhSachSanPham (){
        $stt = 0;

        $ds_sanpham = new sanpham ();
        list($chungloai,$loai,$ds_sanpham) = $ds_sanpham->DanhSachSanPham();

        return view('admin.sanpham.sanpham', compact('ds_sanpham', 'stt' ,'chungloai' , 'loai'));
    }
    /*
    |
    |   sau khi chọn chủng loại, sử dụng ajax load listmenu loại sản phẩm có cùng chủng loại.
    |   sau khi chọn loại sản phẩm
    |
     */
    public function getDanhSachSanPhamTheoLoai ($idloai){
        $stt = 0;

        $sp_theoloai = new sanpham();
        list($ds_sanpham ,$chungloai ,$loai ,$tenloai, $selected_loai, $selected_chungloai ,$ds_loai) = $sp_theoloai->DanhSachSanPhamTheoLoai($idloai);

        return view('admin.sanpham.sanpham', compact('ds_sanpham', 'stt' ,'chungloai' , 'loai' ,'tenloai', 'selected_loai', 'selected_chungloai' ,'ds_loai'));
    }

    public function getSuaSanPham ($id) {
        $name = sanpham::where('idSP', $id)->first();
        $slug = str_slug($name->TenSP);
        $update = sanpham::where('idSP', $id)->update(['slug_sanpham'=>$slug]);
        return redirect()->route('danhsachsanpham');
    }

    public function getThemSanPham () {
        $loai = loai::where('AnHien', 1)->get();
        return view('admin.sanpham.them', compact('loai'));
    }

    public function postThemSanPham (Request $req) {
        $file = $req->file('hinh');
        /*
        |   tạo đường dẫn ảnh, (lưu vào database)
         */
        $filename = 'images/'.$file->getClientOriginalName('hinh');
        /*
        | kiem tra file 
        | getClientSize('hinh'); => kiểm tra dung lượng file
        | getClientMimeType('hinh'); => kiểm tra kiểu file (image/png)
         */
        /*$type = $file->getClientMimeType('hinh');
        if($type != 'image/png'){
            echo 'sai hinh';
            return redirect()->route('themsanpham');
        }*/
        $file->move('source/images', $filename);


        $sanpham = new sanpham();
        $sanpham->idLoai = $req->loaisp;
        $sanpham->TenSP = $req->tensp;
        $sanpham->Gia = $req->gia;
        $sanpham->KhuyenMai = $req->khuyenmai;
        $sanpham->BaoHanh = $req->baohanh;
        $sanpham->XuatXu = $req->xuatxu;
        $sanpham->TinhTrang = $req->tinhtrang;
        $sanpham->MoTa = $req->motasp;
        $sanpham->TinhNang = $req->tinhnang;
        $sanpham->UrlHinh = $filename;
        $sanpham->slug_sanpham = str_slug($req->tensp).'-'.time();
        $sanpham->save();
        return redirect()->route('danhsachsanpham');
    }

    public function getXoaSanPham ($id) {
        $delete = sanpham::where('idSP', $id)->delete();
        return redirect()->back();
    }
}
