@extends('admin.index')
@section('content')
	<div id="sua">
		<h1>SỬA CHỦNG LOẠI</h1>
		<form action="" method="post" name="frm_sua_chung_loai">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="items-input">
				<div class="input">
					<input autocomplete="off" type="text" name="ten_chung_loai" id="ten_chung_loai" value="{{$name->TenCL}}">
				</div>
				<div style="clear: both;"></div>
				<input type="hidden" name="idCL" value="{{$name->idCL}}">
			</div><hr>
			<div>
				<input type="submit" style="margin: auto; margin-top: 20px; font-weight: bold; color:white" class="btn_sua" name="btn_sua_chung_loai"  value="Sửa">
			</div>
		</form>
	</div>
@endsection
