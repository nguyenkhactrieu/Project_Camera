@extends('master')
@section ('title')
    {{$TenLoai}}
@endsection
@section('content')
<!--//SAN PHAM MOI-->
<div class="tatcasanpham">
    <div class="tieudespmoi">
        TẤT CẢ SẢN PHẨM
    </div> 
    <div style="width:100%; height:auto; margin-bottom:60px;">
        @foreach($SP_TheoLoai as $loaiSP)
            <div class="sanpham">
                <div class="hinh">
                    @if($loaiSP->KhuyenMai != 0)
                    <div class ="khuyenmai">
                        <img src="source/images/sale1.png" width="80px;">
                        <span >- {{$loaiSP->KhuyenMai}} %</span>
                    </div>
                    @endif
                    <img alt="errorUrl" width="150px" height="150px" src="source/{{$loaiSP->UrlHinh}}" />
                </div>
                <div class="hide-show">
                    <div class="tensp">{{$loaiSP->TenSP}}</div>
                    <div class="rateit" id="rateit" data-rateit-readonly="true" data-productid="{{$loaiSP->idSP}}" data-rateit-value="{{ round (($loaiSP->DiemTrungBinh/2),1)}}">
                    </div>
                    @if($loaiSP->KhuyenMai != 0)
                    <div class="gia">Gia: {{number_format(((100 - $loaiSP->KhuyenMai)/100) * $loaiSP->Gia)}} VND</div>
                        <!--giam gia-->
                    <strike>{{number_format($loaiSP->Gia)}}</strike>
                    @else
                        <div class="gia" style="margin-bottom: 30px;">{{number_format($loaiSP->Gia)}} VND</div>
                    @endif

                    <div class="mua">
                        <a  href="mua-hang/{{$loaiSP->idSP}}/{{$loaiSP->TenSP}}">MUA</a>
                    </div>
                    <div class="xem" style="">
                        <a href="{{$loaiSP->slug_cl}}/{{$loaiSP->slug_loai}}/{{$loaiSP->slug_sanpham}}.html">Xem chi tiết</a>
                    </div>
                    <div class="mota" style="">{!!$loaiSP->TinhNang!!}</div>
                </div>
            </div>
        @endforeach
        <div style="clear:both"> </div>
        <div class="row1" style="margin: auto;">{{$SP_TheoLoai->links()}}</div>
    </div> <!--//TAT CA SAN PHAM-->
</div><!--//Container SAN PHAM-->
@include('sanpham_xemnhieu')
@endsection