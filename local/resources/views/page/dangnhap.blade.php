@extends('master')
@section ('title')
    Đăng Nhập Tài Khoản
@endsection
@section('content')
<div id="login">
    <div id="login_bg"></div>
    <div id="formlogin">
        <h3 align="center">ĐĂNG NHẬP TÀI KHOẢN</h3>
        <div class="form">
        <form method="post" action="{{route('dangnhap')}}" name="formlogin">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(Session::has('flag'))
        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        @endif
            <table width="100%" id="dangnhap" >
                <tr>
                    <td><label>Email </label> <input type="text" name="email" id="logUsername" placeholder="Nhập Email" />
                        <span class="error" style="display: none;">Chưa nhập Username</span>
                    </td> <br />
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                        <input type="password" name="password" id="logPassword" placeholder="Mật khẩu"  />
                    <span class="error" style="display: none;">Chưa nhập Password</span>
                    </td>
                <tr>
                    <td><a href="quen-mat-khau.html">* Quên mật khẩu?</a></td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="remember"> Remember
                    </td>
                </tr>
                <tr>
                    <td><input style="height: 40px; width: 100px;" align="center" type="submit" name="submit_login" id="btnLogin" value="Đăng nhập"/></td>
                </tr>
            </table>
        </form>
        </div>
    </div> 
</div>
@endsection