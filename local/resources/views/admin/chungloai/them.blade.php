@extends('admin.index')
@section('content')
<div id="them">
	<h1>THÊM CHỦNG LOẠI</h1>
	<form action="{{route('themchungloai')}}" method="post" name="frm_them_chung_loai">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="items-input">
			<div class="input" id="ichungloai">
				<input style="" type="text" name="ten_chung_loai" id="ten_chung_loai" placeholder="Nhập tên chủng loại">
			</div>
			<p></p>
			<div style="clear: both;"></div>
		</div><hr>
		<div>
			<input type="submit" style="margin: auto; margin-top: 20px;color:white; font-weight: bold;" class="btn_them" name="btn_them_chung_loai" id="themchungloai" value="Thêm">	
		</div>
	</form>
</div>
@endsection