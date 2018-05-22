@extends('master')
@section ('title')
    Giỏ Hàng
@endsection
@section('content')
<div class="tatcasanpham">
    <div id="giohang">
        <div id="main-cart">
            <div id="cart_nl">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <p>Không có sản phẩm nào trong giỏ hàng</p>
                <div id="back_index">
                    <a href="{{route('trang-chu')}}">Quay về trang chủ</a>
                </div>
                <span>Khi cần trợ giúp vui lòng gọi 0963.537.347</span>
                <p>(9h-21h)</p>
            </div>
        </div>
    </div>
</div><!--//Container SAN PHAM-->
@include ('sanpham_xemnhieu')
@endsection