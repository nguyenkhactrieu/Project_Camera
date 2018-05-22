@extends('admin.index')
@section('content')
<div id="sua">
	<h1>SỬA LOẠI SẢN PHẨM</h1>
	<form action="" name="sualoai" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="items-input">
			<input type="hidden" name="idLoai" value="{{$loai->idLoai}}">
			<div class="label">
				<label for="chungloai">Chọn chủng loại</label>
			</div>
			<div class="input">
				<select name="chungloai" id="chon_chungloai">
					@foreach($chungloai as $chungl)
						<option value="{{$chungl->idCL}}" <?php if($chungl->idCL == $loai->idCL){ echo 'selected'; } ?>>{{$chungl->TenCL}}</option>
					@endforeach
				</select>
			</div>
			<div style="clear: both;"></div>
		</div><hr>
		<div style="margin-top:10px;" class="items-input">
			<div class="label">
				<label for="tenloai">Tên loại</label>
			</div>
			<div class="input">
				<input autocomplete="off" type="text" name="tenloai" value="{{$loai->TenLoai}}">
			</div>
			<div style="clear: both;"></div>
		</div><hr>
		<div style="clear: both;"></div>
		<div style="margin-top:10px">
			<input style="margin: auto; margin-top: 20px; font-weight: bold; color:white" class="btn_sua" type="submit" name="sualoai" value="Cập nhật" >
		</div>
	</form>
</div>
@endsection