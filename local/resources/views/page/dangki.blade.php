@extends('master')
@section ('title')
    Đăng Kí Tài Khoản
@endsection
@section('content')
<div id="dangki">
    <div id="dangki_bg"></div>
    <div id="formdangki">
        <h3 align="center">ĐĂNG KÝ TÀI KHOẢN</h3>
        <div class="form">
        <form method="post" action="{{route('dangki')}}" id="formDK" name="formdangki" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="alert alert-success">{{Session::get('thongbao')}}</div>
            @endif
            <table width="100%" id="table_dangki" >
                <tr>
                    <td><label>Tên đăng nhập</label><input type="text" name="username" value="" id="dkUsername" placeholder="Tên đăng nhập"  /> *
                        <span class="error" style="display: none;">Tên đăng nhập phải lớn hơn 6 kí tự</span>
                    </td> <br />
                </tr>
                <tr>
                    <td><label>Mật khẩu</label><input type="password" name="password" value="" id="dkPassword" placeholder="Mật khẩu"  /> * 
                        <span class="error" style="display: none;">Mật khẩu phải lớn hơn 6 kí tự</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhập lại mật khẩu</label><input type="password" name="nhaplai_password" value="" id="re_dkPassword" placeholder="Nhập lại mật khẩu"  /> *
                        <span class="error" style="display: none;">Chưa nhập lại Password</span>
                        <span class="error1" style="display: none;">Nhập lại Password sai</span>
                    </td>
                </tr>
                <tr>
                    <td><label>Họ tên</label><input type="text" name="hoten" id="dkHoten" value="" placeholder="Họ tên"  /> *
                        <span class="error" style="display: none;">Chưa nhập họ tên</span>
                    </td>
                </tr>
                <tr>
                    <td><label>Email</label><input type="text" name="email" id="dkEmail" value="" placeholder="Email"  /> *
                        <span class="error" style="display: none;">Chưa nhập Email</span>
                    </td>
                </tr>
                <tr>
                    <td><label>Số điện thoại</label><input type="text" name="sodienthoai" value="" id="dkSdt" placeholder="Số điện thoại"  /> *
                        <span class="error" style="display: none;">Chưa nhập số điện thoại</span>
                    </td>
                    
                </tr>
                <tr>
                    <td><label>Địa chỉ</label><input type="text" name="diachi" value="" id="dkDiachi" placeholder="Địa chỉ"  /> *
                        <span class="error" style="display: none;">Chưa nhập địa chỉ</span>
                    </td>
                </tr>
                <!--captcha-->
                
                <tr>
                    <td><span> </span></td>
                </tr>                <tr>
                    <td><span class="error_username"></span></td>
                </tr>
                <!--//captcha-->
                <tr>
                    <td><input style="margin:auto align="center" type="submit" name="submit_dangki" id="btnDK" value="Đăng ký"  /></td>
                </tr>
            </table>
        </form>
        </div>
    </div>      
</div>
@endsection