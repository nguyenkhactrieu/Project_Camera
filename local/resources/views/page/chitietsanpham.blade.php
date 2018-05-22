@extends('master')
<?php $path = $_SERVER['REQUEST_URI'];?>

@section ('title')
{{$chitietsanpham->TenSP}}
@endsection

@section ('url')
http://khactrieucamera{{$path}}
@endsection

@section ('description')
{!!$chitietsanpham->MoTa!!}
@endsection

@section ('img')
http://khactrieucamera.ga/source/{!!$chitietsanpham->UrlHinh!!}
@endsection

@section('content')

<div class="tatcasanpham">
    <div class="chitiet">
        <div id="tentieudesp" style="padding: 20px;">
            <h3>{{$chitietsanpham->TenSP}}</h3>
        </div>
        <div class="hinh">
            <img width="100%" src="source/{{$chitietsanpham->UrlHinh}}" alt="errorUrl">
            <div><span>Bình chọn</span></div>
                <div class="rateit" id="rateit" data-productid="{{$chitietsanpham->idSP}}" data-rateit-value="{{ round (($chitietsanpham->DiemTrungBinh/2),1)}}" style="padding: 10px 0px;">
                    </div>
            
            <div class="binhchon">
                <span> {{ round (($chitietsanpham->DiemTrungBinh),1)}}/10 ({{$chitietsanpham->SoLanChon}} Lượt)</span>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#rateit').rateit({min: 1, max: 10, step: 1});
                    $('#rateit').bind('rated', function (e) {
                        var ri = $(this);
                        var value = ri.rateit('value');
                        var productID = ri.data('productid');
                        //alert('Bạn đã đánh giá '+value +' sao cho sản phẩm có id là:'+productID );
                        //không cho phép đánh giá,sau khi đã đánh giá xong
                        ri.rateit('readonly', true);

                        $.get('danh-gia/'+productID+'/'+value, function(data){
                            $('.binhchon').html(data);
                        });
                    });
                });
            </script>
            <hr>
            <div class="dich_vu" style="width: 100%; height: auto; margin-top: 20px;">
                <div class="dichvu_" style="width: 100%;">
                    <img src="source/images/van-chuyen-mien-phi.png" alt="">
                </div>
                <div class="dichvu_" style="width: 100%;">
                    <img src="source/images/bao-hanh-tan-nha.png" alt="">
                </div>
                <div class="dichvu_" style="width: 100%;">
                    <img src="source/images/tra-gop.png" alt="">
                </div>
                <div class="dichvu_" style="width: 100%;">
                    <img src="source/images/hang-chinh-hang.png" alt="">
                </div>
            </div>
        </div>
        <div class="tinhnang" >
            <p id="title">TÍNH NĂNG SẢN PHẨM</p>
            <p>{!!$chitietsanpham->TinhNang!!}</p>
            <hr>
                @if($chitietsanpham->KhuyenMai != 0 )
                <div class="gia">
                    <span id="title_gia" >Giá sản phẩm:</span>
                    <span style="font-size: 20px;">{{number_format(((100 - $chitietsanpham->KhuyenMai)/100) * $chitietsanpham->Gia)}}</span>
                    <span style="color:#1b1b1b9b; font-size: 15px;">(Đã có VAT)</span>
                </div>
                <!--giam gia-->
                <div style="margin-top: 25px;">
                    <span>Giá Thị Trường: {{number_format($chitietsanpham->Gia)}}</span><strike></strike>&nbsp Tiết kiệm {{$chitietsanpham->KhuyenMai}} %
                </div>
                @else
                <div class="gia">
                    <span id="title_gia" >Giá sản phẩm:</span>
                    <span style="font-size: 20px;">
                        <span style="color:#1b1b1b9b; font-size: 15px;"></span>
                    </span>
                </div>
                @endif
            <table width="50%" style="margin-top: 20px;">
                <tr>
                    <td><p>Bảo hành:{{$chitietsanpham->BaoHanh}} Tháng</p></td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td><p>Xuất xứ:{{$chitietsanpham->XuatXu}}</p></td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td><p>Tình trạng:@if($chitietsanpham->TinhTrang == 1) Còn hàng @else Tạm hết hàng @endif</p></td>
                    <td><p></p></td>
                </tr>
            </table>
            <hr>
            <h5 style="font-weight: bold;">SẢN PHẨM TẶNG KÈM</h5>
            <p>Đang cập nhật...</p>
            <div id="mua">
                <a href="mua-hang/{{$chitietsanpham->idSP}}/{{$chitietsanpham->TenSP}}" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng</a></div>
        </div>
        <div class="mota">
            <div class="chitietsanpham" > CHI TIẾT SẢN PHẨM</div>
            <p>{!!$chitietsanpham->MoTa!!}</p>
            <div id="show_hide_mota">Xem thêm<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
        </div>
    </div>
</div><!--//Container SAN PHAM-->
<div style="" class="tintuc">
    <!--san phẩm nổi bật-->
    <div style="" class="tieude">SẢN PHẨM CÙNG LOẠI</div>
    @foreach($sp_cungloai as $l)
        <div style="" class="spmoi" style="margin-bottom: 1px solid red">
            <a href="{{$l->slug_cl}}/{{$l->slug_loai}}/{{$l->slug_sanpham}}.html" style="display: block;" title="Xem chi tiết">
                <div class="hinh">
                    <img style="width: 100%" src="source/{{$l->UrlHinh}}" alt="" />
                </div>
                <div class="thongtinsp">
                    <b>{{$l->TenSP}}</b><br /> <br />
                    <div class="rateit" id="rateit" data-rateit-readonly="true" data-productid="{{$l->idSP}}" data-rateit-value="{{ round(($l->DiemTrungBinh/2),1)}}">
                    </div><br><br>
                    <div class="gia">{{number_format(((100 - $l->KhuyenMai)/100) * $l->Gia)}} VND</div>
                </div>
                <div style="clear: both;"></div>
            </a>
        </div>
        @endforeach
</div> <!--//TIN TUC-->
@endsection