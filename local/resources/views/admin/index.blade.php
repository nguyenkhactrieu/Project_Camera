<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="{{asset('source/images/camera-42319_960_720.png')}}" type="image/x-icon" />
<!--<base href="http://localhost/khactrieucamera3/admin/" />-->
<meta name="viewport" content="width=device-width", initial-scale=1 /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="{{asset('source/admin/js/jquery-3.1.1.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('source/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('source/css/bootstrap-theme.min.css')}}"/>
<!--ckeditor && ckfinder-->
<script type="text/javascript" src="{{asset('source/admin/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('source/admin/ckfinder/ckfinder.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('source/admin/css/style_index.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('source/admin/css/reponsive.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('source/admin/fonts/css/font-awesome.min.css')}}" />
<script type="text/javascript" src="{{asset('source/admin/js/jquery.js')}}"></script>
<title>Admin</title>
<script>
    $(document).ready(function(){
       /* $("#chungloai").change(function(){
            var id = $("#chungloai").val(); 
                $.post("data.php", {id: id}, function (data){
                $("#loai").html(data);
            });
        });*/
        /*var hide = 1;
        $('#logout').click(function(){
            if(hide % 2 != 0){
                $('#arow_dow').css('color','red');
                $('#menu_logout').css('display','block');
                hide = hide + 1;
            }else {
                $('#arow_dow').css('color','white');
                $('#menu_logout').css('display','none');
                hide = hide + 1;
            }
        });*/
    });
</script>
</head>
<body>
    <div id="wrapper">
        @include ('admin.header')
        <div id="container">
            <div id="menu_wrapper">
                @include ('admin.menu')
            </div>
            <div id="content" >
                @yield('content')
            </div>
            <div class="clear" style="clear: both;">
            </div>
        </div>
        <div class="clear" style="clear: both;">
            </div>
        <div id="footer">
            
        </div>
    </div>
</body>
</html>