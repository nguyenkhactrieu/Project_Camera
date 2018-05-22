<div class="menu-slideshow">
    <div class="container" >
        <!--*********************************MENU*********************************-->
        <div class="menu-sp">
            <div id="tieude"> 
                <i class="glyphicon glyphicon-list" style="margin-left:20px; margin-right:20px" ></i>Danh Muc
            </div><!--//tieude-->
            <ul>
                @foreach ($loai_sp as $loai)
                <li>
                    <a href="{{$loai->slug_loai}}.html">{{$loai->TenLoai}}</a> 
                    <span class="glyphicon glyphicon-play"></span>
                </li>
                @endforeach
            </ul>
            <div class="quancao" style="width: 100%; height: 100px;margin-top: 10px;">
                <img src="source/images/banner-giao-hang-nhanh-white-doctors.png" style="width: 100%; height: 100px;" alt="">
            </div>
        </div> <!--//menu-sp-->
        
        <!--*********************************Slideshow*********************************************-->
        <div class="slide">
            <div class="slider">
                @foreach($slide as $sl)
                <img src="source/admin/ql_slider/{{$sl->UrlHinh}}" width="100%" alt="">
                @endforeach
            </div>
        </div> <!--//spnoibat-->
    </div><!--//container-->
</div><!--//menu-slideshow-->   