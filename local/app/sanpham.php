<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\chungloai;
use App\loai;
class sanpham extends Model
{
    protected $table = 'webma_sanpham';

    public function loai(){
    	return $this->belongTo('App\loai' , 'idLoai' , 'idSP');
    }

    public function getTatCaSanPham (){  	
    	$sanpham = sanpham::where('webma_sanpham.AnHien',1)
        ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
        ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
        ->Paginate(8);
    	return $sanpham;
    }

    public function getLoaiSanPham ($slug){
        /*
        |
        |   lấy ra các sp khi chọn loại từ menu
        |   paginate() => phân trang
        |
         */
        $idLoai = loai::where('slug_loai', $slug)->select('idLoai','TenLoai')->first();
        
    	$loaisanpham = sanpham::where('webma_sanpham.idLoai',$idLoai->idLoai )
        ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
        ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
        ->Paginate(8);
    	return [$loaisanpham,$idLoai->TenLoai];
    }
    public function getSanPhamXemNhieu(){     
        $sanpham_xemnhieu = sanpham::orderBy('LuotXem','desc')
        ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
        ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
        ->skip(0)->take(5)->get();
        return $sanpham_xemnhieu;
    }
    public function getChiTietSanPham($slug_sp){

        /*
        |
        |   lấy thông tin sản phẩm người dùng đang xem
        |
         */  
        
        $chitietsanpham = sanpham::where('slug_sanpham', $slug_sp)->first();
        /*
        |
        |   Nếu slug_sanpham có tồn tại thì mới cập nhật lượt xem
        |
        */
        if($chitietsanpham != null ){
        /*
        |
        |   Cập nhật lượt xem sản phẩm
        |
         */
        $update_LX = sanpham::where('slug_sanpham',$slug_sp)->update([
            'LuotXem'=> $chitietsanpham->LuotXem + 1
        ]);

        return $chitietsanpham;

        }else{
            return $chitietsanpham; 
        }
        
    }
    public function getSanPhamCungLoai ($slug_sp) {
        /*
        |
        |   lấy ra idLoai của sản phẩm mà người dùng đang xem
        |
         */
        
        $idloai = sanpham::where('slug_sanpham', $slug_sp)->pluck('idLoai');
        
        /*
        |
        |   lấy ra 5 sản phẩm cùng loại với sản phẩm đang xem (có thể dùng random)
        |
         */
        $sp_cungloai = sanpham::where('webma_sanpham.idLoai',$idloai)
        ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
        ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
        ->skip(0)->take(5)->get();

        return $sp_cungloai;

    }

    public function getSearch ($key){
        $sanpham = sanpham::where('webma_sanpham.TenSP','like', "%$key%")
        ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
        ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
        ->paginate(8);
        return $sanpham;
    }

    public function getDanhGia ($id, $value){
        $idSanPham = $id ; 
        $diembinhchon = $value*2;
        /*
        |
        | lấy ra số lần chọn và số điểm
        |
        */
        $binhchon= sanpham::where('idSP', $idSanPham)->first();
        /*
        | cập nhật lại số lần chọn và điểm bình chọn
        | số lần chọn + 1 , điểm bình chọn + điểm bình chọn người dùng vừa chọn
        |
         */
        $sanpham = sanpham::where('idSP', $idSanPham)->update([
            'SoLanChon'=> $binhchon->SoLanChon + 1, 'DiemBinhChon'=>$binhchon->DiemBinhChon + $diembinhchon
        ]);
        /*
        | 
        | lấy ra điểm và số lần chọn sau khi đã cập nhật để tính điểm trung bình
        |
         */
        $tb = sanpham::where('idSP', $idSanPham)->first();
        $diem = $tb->DiemBinhChon;
        $solan = $tb->SoLanChon;
        $dtb = ($diem / $solan);
        /*
        | 
        | cập nhật lại điểm trung bình (có thể không cần lưu vào database)
        |
         */
        $DiemTrungBinh = sanpham::where('idSP', $idSanPham)->update([
            'DiemTrungBinh'=> $dtb
        ]);
        /*
        | 
        | lấy ra điểm trung bình
        |
         */
        $solanchon = sanpham::where('idSP', $idSanPham)->first();
        /*
        | 
        | Gửi sang class binhchon trong chitietsanpham.balde.php (sử dụng ajax)
        |
         */
        return $solanchon;
    }

    /*
    |   Admin
    */
    public function DanhSachSanPham (){
        $chungloai = chungloai::where('AnHien', 1)->get();
        $loai = loai::where('AnHien',1)->get();
        $ds_sanpham = sanpham::where('AnHien', 1)->Paginate(10);

        return [$chungloai,$loai,$ds_sanpham];

    }

    public function DanhSachSanPhamTheoLoai ($idloai){
        $chungloai = chungloai::where('AnHien', 1)->get();

        $loai = loai::where('AnHien',1)->get();

        $tenloai = loai::where ('idLoai' , $idloai)->first();
        /*
        | selected_loai,   selected_chungloai đk selected trong listMenu
         */
        $selected_loai = $idloai;

        $selected_chungloai = $tenloai->idCL;
        /*
        |   lấy danh sách loại theo chủng loại đã chọn
         */
        $ds_loai = loai::where('idCL', $selected_chungloai)->get();
        /*
        |   lấy sản phẩm theo idLoai
         */
        $ds_sanpham = sanpham::where('idLoai', $idloai)->Paginate(10);

        return [$ds_sanpham ,$chungloai , $loai ,$tenloai, $selected_loai, $selected_chungloai ,$ds_loai];
    }
}
