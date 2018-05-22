@extends('admin.index')
@section('content')
<div style="text-align:center" id="quanly">
    <form action="" method="get" name="formchon" id="formchon">
        <input type="hidden" name="key" value="san-pham">
        <select name="chungloai" id="chungloai">
            <option value="">----Chọn chủng loại----</option>
            @foreach($chungloai as $cl)
                <option value="{{$cl->idCL}}" <?php if(isset($selected_chungloai)){if($selected_chungloai == $cl->idCL ) echo 'selected';}?>>{{$cl->TenCL}}</option>
            @endforeach 
        </select>
        <select name="loai" id="loai">
            <option value="">----Chọn loại----</option>
            @if(isset($selected_chungloai))
                @foreach($ds_loai as $dsl)
                    <option value="{{$dsl->idLoai}}" <?php if(isset($selected_loai) && $selected_loai == $dsl->idLoai  ){ echo 'selected';}?> >{{$dsl->TenLoai}}</option>
                @endforeach  
            @endif
            <!-- @foreach($loai as $l)
                  <option value="{{$l->idLoai}}" <?php if(isset($selected) && $selected == $l->idLoai  ){ echo 'selected';}?> >{{$l->TenLoai}}</option>
              @endforeach -->  
        </select>
    </form>
     <div id="title">
        <?php if(isset($tenloai)) echo  $tenloai->TenLoai; else echo 'Tất cả sản phẩm' ?>
    </div>
    <table class="table" width="100%" id="table_sp" cellspacing="0" cellpadding="0">
        <th>ID</th>
        <th>Hình ảnh</th>
        <th style="text-align: center;">Tên sản phẩm</th>
        <td colspan="3">
            <div>
                <a href="{{route('themsanpham')}}" title="Thêm"><i class="fa fa-plus-circle" aria-hidden="true" style="color:red"></i></a>
            </div>
        </td>
        @foreach($ds_sanpham as $ds_sp)
            <tr>
                <td>{{$ds_sp->idSP}}</td>
                <td><img src="{{asset('/source')}}/{{$ds_sp->UrlHinh}}" style="width:30px;"></td>
                <td align="center">{{$ds_sp->TenSP}}</td>
                <td>
                    <div>
                        <a href="{{asset('admin/san-pham/xoa')}}/{{$ds_sp->idSP}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" title="Xóa">
                            <i class="fa fa-trash-o" aria-hidden="true" style="color: #895FA4"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <div>
                        <a href="sua/{{$ds_sp->idSP}}" title="Sửa">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #5021FE"></i></a>
                    </div>
                </td>
                <td>
                    <div>
                        <a href="" title="Xem chi tiết">
                            <i class="fa fa-info-circle" aria-hidden="true" style="color: #CC57F8"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="row">{{$ds_sanpham->links()}}</div>
</div>
@endsection