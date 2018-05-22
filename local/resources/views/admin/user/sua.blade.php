@extends('admin.index')
@section('content')
<div id="sua">
	<h1>SỬA USERS</h1>
	<div id="wrapper_users">
		<form action="{{route('sua-user')}}" method="post" name="suaUsers">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div id="idGroup" class="items-input">
				<div class="label"><label for="level">Level</label></div>
				<div class="input">
					<select name="groups">
						<option value="">----Chọn Group User----</option>
						<option value="0" <?php if($user->idGroup == 0 ) echo "selected"; ?> >Người dùng thường</option>
						<option value="1" <?php if($user->idGroup == 1 ) echo "selected"; ?> >Admin</option>
					</select>
				</div>
				<div style="clear: both;"></div>
			</div><hr>
			<input type="hidden" name="idUser" value="{{$user->id}}">
			<div id="hoten" class="items-input">
				<div class="label"><label for="hoten">Họ Tên</label></div>
				<div class="input"><input type="text" name="hoten" placeholder="Nhập họ tên" value="{{$user->name}}"></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div id="sdt" class="items-input">
				<div class="label"><label for="sdt">Số điện thoại</label></div>
				<div class="input"><input type="text" name="sdt" placeholder="Nhập số điện thoại" value="{{$user->SDT}}"></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div id="diachi" class="items-input">
				<div class="label"><label for="diachi">Địa chỉ</label></div>
				<div class="input"><input type="text" name="diachi" placeholder="Nhập địa chỉ" value="{{$user->DiaChi}}"></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div id="tinhtrang" class="items-input">
				<div class="label"><label for="tinhtrang">Tình Trạng</label></div>
				<div class="input">
					<select name="tinhtrang">
						<option value="0" <?php if($user->TinhTrang == 0 ) echo "selected"; ?> >Lock</option>
						<option value="1" <?php if($user->TinhTrang == 1 ) echo "selected"; ?> >Unlock</option>
					</select>
				</div>
				<div style="clear: both;"></div>
			</div><hr>
			<div>
				<div>
					<input class="btn_sua" style="color:white;font-weight: bold;" type="submit" id="submit" name="suaUsers" value="Update">
				</div>
			</div>
		</form>
	</div>
</div>
@endsection