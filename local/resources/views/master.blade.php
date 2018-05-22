
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width", initial-scale=1 /> 
<title>
    @yield('title')
</title>

<meta property="og:url"                content="@yield('url')" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="@yield('title')" />

<meta property="og:image"              content="@yield('img')" />


<!---<base href="http://192.168.231.102/khactrieucamera3/" />-->
<base href="http://localhost/camera/">
<link rel="Shortcut Icon" href="source/images/camera-42319_960_720.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="source/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="source/css/style_index.css"/>
<!--*********************reponsive_mobile_taplet*********************-->
<link rel="stylesheet" type="text/css" href="source/css/reponsive.css"/>
<link rel="stylesheet" type="text/css" href="source/css/slideshow.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>-->
<script type="text/javascript" src="source/js/script.js"></script>
<!--*********************//reponsive_mobile_taplet*********************-->
<!--************************slider********************-->
<link rel="stylesheet" href="source/slider/jquery.bxslider.min.css">

<!--********************************************-->
<!--icon-font-->

<!--binh chon-->
<link href="source/binhchon/rateit.css" rel="stylesheet" type="text/css">
<script src="source/binhchon/jquery.rateit.js" type="text/javascript"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
<!--style Binh Luan-->
<!--binh chon-->


</head>
<body>
    <!--bình luận facebook-->
    <!---->
<div class="wrapper">
    @include('header')
    <!--Phần menu, slide ảnh-->
    @include('slide')
    <div class="container" id="container">
        @yield('content')
    </div>
    
    <!--logo thuong hieu-->
    <div class="container" style="padding: 20px;">
        <div class="logosl">
            <ul>
                <li><img src="source/images/logo/canon.png"  ></li>
                <li><img src="source/images/logo/fujifilmpng.png"  ></li>
                <li><img src="source/images/logo/nikon.png" ></li>
                <li><img src="source/images/logo/olympus.png" ></li>
                <li><img src="source/images/logo/sony.png" ></li>
                <li><img src="source/images/logo/panasonic.png" ></li>
                <li><img src="source/images/logo/pentax.png" ></li>
                <li><img src="source/images/logo/samsung.png" ></li>
            </ul>
        </div>
        
    </div>
    <div class="footer">
        <div class="thongtinchung">
            <div class="thongtin">
                <a href="#">THÔNG TIN</a>
                <p>Địa chỉ: 14/1/4 Văn Chung, P.13, Q.Tân Bình, TP.HCM | 37N, Nguyễn Thị Minh Khai, TT.Gia Ray, Xuân Lộc, Đồng Nai</p>
                <p>Điện thoại: 0963.537.347</p>
            </div>
            <div class="dichvu">
                <a href="#">DỊCH VỤ</a>
                <p>Mua bán máy ảnh, phụ kiện máy ảnh, máy quay phim</p>
                <p>Cho thuê máy ảnh</p>
                <p>Chụp ảnh cưới</p>
                <p>Phục hồi ảnh cũ</p>
                <p>Sủa chữa máy ảnh, máy quay phim</p>
            </div>
            <div class="copy">Copyright © 2018 KhacTrieuCamera.com | WEB PHP</div>
             <div id="map" style="height: 10px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.039834372606!2d106.6451132714238!3d10.808261074902516!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752946ab4b7ec9%3A0x9a5c3bc946cc1db!2zSOG6u20gNCBWxINuIENodW5nLCBwaMaw4budbmcgMTMsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1512359309413" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div><hr />
        </div>

    </div>
        <!--//footer-->
    <!--chen trang dang nhap, dang ky-->
    
</div> <!--//wrapper-->
<div class="link" style="position: fixed; top: 40%;z-index: 30;width: 30px">
    <div class="fb">
        <a href="https://www.facebook.com/" target="_blank" title="Liên kết đến Facebook"><img src="source/images/facebook.png" width="100%" alt="facebook" /></a>
    </div>
    <div class="fb">
        <a href="https://plus.google.com" target="_blank" title="Liên kết đến Google+" ><img src="source/images/google.png" width="100%" alt="" /></a>
    </div>
    <div class="fb">
        <a href="https://twitter.com" target="_blank" title="Liên kết đến Twitter"><img src="source/images/Twitter.png" width="100%" alt="" /></a>
    </div>
</div>
<script type="text/javascript" src="source/js/bootstrap.min.js"></script>
<script src="source/slider/jquery.bxslider.min.js"></script>
<script>
    $(document).ready(function() {
        $('.slider').bxSlider({
            auto: true, // tự động
            pager: true,
        });
        
        $dem = $('.logosl ul li').size();
        $img = $('.logosl ul').children();
        $img.attr("id", function(id){
            return "img"+id;
        });
        setInterval(function () {
            $('.logosl ul').animate({'margin-left':'-=200px'},1000,
            function(){
                $('.logosl ul li:first').appendTo('.logosl ul');    
                $('.logosl ul').css('margin-left',0);
            });
        }, 4000);
    });
</script>
</body>
</html>