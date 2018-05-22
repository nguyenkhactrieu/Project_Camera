@extends('master')
@section ('title')
    Đặt Hàng
@endsection
@section('content')
<div id="giohang">
	<div id="top">
		<a href="index.php"><i class="fa fa-cart-plus" aria-hidden="true"></i>
 			mua thêm sản phẩm khác</a>
		<span>GIỎ HÀNG CỦA BẠN</span>
	</div>
	<div id="main-cart">
		<ul>
			@foreach($content as $item)
			<li>
				<div id="img_name">
					<div id="img"><img width="100px;" src="source/{{$item->options->img}}"></div>
					<div id="name_gia">
						<a href="" style="">{{$item->name}}</a>
						<p style="">Giá: {{number_format($item->price)}} VNĐ</p>
					</div>
				</div>
				<div id="del_sl">
					<div id="sl">
						<label for="">Số Lượng: </label>
						<input id="show_sl" type="text" disabled value="{!! $item->qty !!}">
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		<div id="tongtien">
			<span>Tổng tiền:</span><span id="tong">{{$total}} VNĐ</span>
		</div>
		<div id="thanks" style="padding: 20px;">
			<p>Cảm ơn <b>{{$name}}</b> đã chọn dịch vụ của <strong>KhacTrieuCamera</strong> </p>
			<p>Đơn hàng của <b>{{$male_f}}</b> đã được gửi đến <strong>KhacTrieuCamera</strong> </p>
			<p>Giao đến: <b>{{$info_address}}</b> </p>
			<p>Nhân viên <strong>KhacTrieuCamera</strong> sẽ liên hệ lại với <b></b> để xác nhận thông tin đặt hàng</p>
			<p>Một Email đã được đến <a href="https://mail.google.com" target=_blank >hộp thư</a> của bạn.</p>
			<hr>
			<a href="index.php">Tiếp tục mua hàng <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
		</div>
	</div>
</div>
@endsection
