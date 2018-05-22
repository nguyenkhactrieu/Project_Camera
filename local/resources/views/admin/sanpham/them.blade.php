@extends('admin.index')
@section('content')
<style>
	p{
		color:red;
	}
	span{
		color:black;
	}
</style>
<div class="wrapper">
	<div style="margin: auto; text-align: center;"><h1>THÊM SẢN PHẨM</h1></div>
	<form action="{{route('themsanpham')}}" method="post" id="formthem" name="formthem" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div style="padding: 20px;">
			<div style="background: white; padding: 10px; margin-bottom: 10px;">
				<span>Loại sản phẩm</span>
				<select id="loaisp" name="loaisp">
					<option value="">--Chọn loại--</option>
					@foreach($loai as $loaiSP)
						<option value="{{$loaiSP->idLoai}}">{{$loaiSP->TenLoai}}</option>
					@endforeach
				</select>
				<p></p>
			</div>
			<div style="background: white; padding: 10px; margin-bottom: 10px;">
				<span>Tên sản phẩm</span>
				<input type="text" value="" id="tensp" name="tensp">
				<p></p>
			</div>
			<div style="background: white; padding: 10px; margin-bottom: 10px;">
				<span>Hình ảnh sản phẩm (chưa kiểm tra định dạng file)</span>
				<input type="file" id="hinh" name="hinh"/>
				
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Giá sản phẩm</span>
				<input type="text" id="gia" name="gia"> (VNĐ)
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Khuyến mãi</span>
				<input type="text" id="khuyenmai" name="khuyenmai" value=""> (%)
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Bảo hành</span>
				<input type="text" id="baohanh" name="baohanh" value=""> (Tháng)
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Xuất xứ</span>
				<input type="text" id="xuatxu" name="xuatxu" value="">
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Tình trạng</span>
				<select name="tinhtrang" id="tinhtrang">
					<option value=""></option>
					<option value="1">Còn hàng</option>
					<option value="2">Tạm hết hàng</option>
				</select>
				<p></p>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Mô tả sản phẩm</span>	
				<textarea id="motasp" name="motasp">
					
				</textarea>
				<script type="text/javascript"> // xampp->php->fileinfo.ini
					config = {};
					language:'vi';
					config.entities_latin = false;
					config.filebrowserBrowseUrl 	 = '../../../public/source/admin/ckfinder/ckfinder.html';
					config.filebrowserImageBrowseUrl = '../../../public/source/admin/ckfinder/ckfinder.html';
					CKEDITOR.replace('motasp', config)
				</script>
			</div>
			<div style="background: white; padding: 10px;margin-bottom: 10px;">
				<span>Tính năng sản phẩm</span>
				<textarea id="tinhnang" name="tinhnang">
					
				</textarea>
				<script type="text/javascript">
					config = {};
					config.entities_latin = false;
					CKEDITOR.replace('tinhnang', config)
				</script>
			</div>
			
			<input class="btn_them" type="submit" name="them" id="themsp" value="Thêm" />
		</div>
	</form>
</div>
@endsection