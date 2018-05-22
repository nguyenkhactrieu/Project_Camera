@extends('master')
@section ('title')
Search
@endsection
@section('content')
<!--//SAN PHAM MOI-->
<div class="tatcasanpham">
    <div class="tieudespmoi">
        Tìm thấy {{count($sanpham_search)}} sản phẩm
    </div> 
    <div style="width:100%; height:auto; margin-bottom:60px;">
        <?php 
            if(count($sanpham_search) == 0){ ?>
                <div style="text-align: center;">
                    <span>Không tìm thấy sản phẩm nào phù hợp với từ khóa</span>
                </div>
        <?php   } ?>
        @foreach($sanpham_search as $sp)
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
                <div class="gia">Gia: {{number_format(((100 - $sp->KhuyenMai)/100) * $sp->Gia)}} VND</div>
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
        <div class="row1" style="margin: auto;">{{$sanpham_search->appends(Request::only('key'))->links()}}</div>
    </div> <!--//TAT CA SAN PHAM-->
</div><!--//Container SAN PHAM-->
@include('sanpham_xemnhieu')
@endsection