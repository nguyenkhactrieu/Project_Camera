@extends('admin.index')
@section('content')
<div id="them">
	<h1>THÊM LOẠI SẢN PHẨM</h1>
	<form action="{{route('themloai')}}" name="themloai" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="items-input" style="height: 30px; margin-bottom: 10px;">
			<div class="label">
				<label for="tenchungloai">Chọn chủng loại</label>
			</div>
			<div class="input">
				<select name="chungloai" id="chon_chungloai">
					<option value="">--Chọn chủng loại--</option>
						@foreach($chungloai as $cl)
						<option value="{{$cl->idCL}}">{{$cl->TenCL}}</option>
						@endforeach
				</select>
				<span></span>
			</div>
		</div><hr>
		<div class="items-input">
			<div class="label">
				<label for="tenloai">Nhập tên loại</label>
			</div>
			<div class="input" id="ithemthoai">
				<input type="text" name="tenloai" id="tenloai" placeholder="Nhập tên loại sản phẩm">
			</div>
			<span></span>
			<div style="clear: both;"></div>
		</div><hr>
		<div style="clear: both;"></div>
		<div>
			<input class="btn_them" style="margin: auto; margin-top: 20px;color:white; font-weight: bold;" type="submit" name="themloai" id="themloai" value="Thêm">
		</div>
	</form>
</div>
@endsection