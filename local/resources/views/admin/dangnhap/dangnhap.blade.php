<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="../images/camera-42319_960_720.png" type="image/x-icon" />
<meta name="viewport" content="width=device-width", initial-scale=1 /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="source/admin/css/style_index.css"/>
<link rel="stylesheet" type="text/css" href="source/admin/css/reponsive.css"/>
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="source/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css"/>

<script type="text/javascript" src="source/admin/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="source/admin/js/jquery.js"></script>
</head>
<div id="login">
    <div id="formlogin" style="border: 1px solid ;">
        <h3 align="center">ĐĂNG NHẬP TÀI KHOẢN ADMIN</h3>
        <div class="form">
            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        <form method="post" action="" name="formlogin">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <table width="100%" >
                <tr>
                    <td width="126px;"><label>Tên đăng nhập </label> 
                        <input type="text" name="email" value="nguyenkhactrieu@gmail.com" id="logUsername" placeholder="Tên đăng nhập" />
                        <span class="error">Chưa nhập Username</span>
                    </td><br />
                </tr>
                <tr>
                    <td><label>Mật khẩu</label>
                        <input type="password" name="password" value="khactrieu" id="logPassword" placeholder="Mật khẩu"  />
                        <span class="error">Chưa nhập Password</span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="remember" id="nho" /> <label> Duy trì đăng nhập </label> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit_login" id="btnLogin" value="Đăng nhập"/></td>
                </tr>
            </table>
        </form>
        </div>
    </div>      
</div>
<body>
</body>
</html>