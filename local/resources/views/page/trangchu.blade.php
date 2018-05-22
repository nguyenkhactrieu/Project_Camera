@extends('master')
<?php $path = $_SERVER['REQUEST_URI'];?>

@section ('url')
https://khactrieucamera{{$path}}
@endsection

@section ('img')
https://khactrieucamera.ga/source/11082451_1070414206308597_1185469358993272387_n.jpg!!}
@endsection
@section ('title')
    Trang chủ
@endsection
@section('content')
<!--//SAN PHAM MOI-->
<div class="tatcasanpham">
    <div class="tieudespmoi">
        TẤT CẢ SẢN PHẨM
    </div> 
    <div style="width:100%; height:auto; margin-bottom:60px;">
        @foreach($sanpham as $sp)
            <div class="sanpham">
                <div class="hinh">
                    @if($sp->KhuyenMai != 0)
                    <div class ="khuyenmai">
                        <img src="source/images/sale1.png" width="80px;">
                        <span >- {{$sp->KhuyenMai}} %</span>
                    </div>
                    @endif
                    <img alt="errorUrl" width="150px" height="150px" src="source/{{$sp->UrlHinh}}" />
                </div>
                <div class="hide-show">
                    <div class="tensp">{{$sp->TenSP}}</div>
                    <div class="rateit" id="rateit" data-rateit-readonly="true" data-productid="{{$sp->idSP}}" data-rateit-value="{{ round(($sp->DiemTrungBinh/2),1)}}">
                    </div>
                    @if($sp->KhuyenMai != 0)
                    <div class="gia">{{number_format(((100 - $sp->KhuyenMai)/100) * $sp->Gia)}} VND</div>
                        <!--giam gia-->
                    <strike>{{number_format($sp->Gia)}}</strike>
                    @else
                        <div class="gia" style="margin-bottom: 30px;">{{$sp->Gia}}</div>
                    @endif

                    <div class="mua">
                        <a  href="mua-hang/{{$sp->idSP}}/{{$sp->TenSP}}">MUA</a>
                    </div>
                    <div class="xem" style="">
                        <a href="{{$sp->slug_cl}}/{{$sp->slug_loai}}/{{$sp->slug_sanpham}}.html">Xem chi tiết</a>
                    </div>
                    <div class="mota" style="">{!!$sp->TinhNang!!}</div>
                </div>
            </div>
        @endforeach
        <div style="clear:both"> </div>
        <div class="row1">{{$sanpham->links()}}</div>
    </div> <!--//TAT CA SAN PHAM-->
</div><!--//Container SAN PHAM-->
@include('sanpham_xemnhieu')
@endsection