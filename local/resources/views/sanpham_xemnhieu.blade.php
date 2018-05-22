<div class="tintuc">
    <!--san phẩm nổi bật-->
    <div style="" class="tieude">SẢN PHẨM XEM NHIỀU</div>
    @foreach($sanpham_xemnhieu as $sp_xemnhieu)
        <div style="" class="spmoi" style="margin-bottom: 1px solid red">
            <a href="{{$sp_xemnhieu->slug_cl}}/{{$sp_xemnhieu->slug_loai}}/{{$sp_xemnhieu->slug_sanpham}}.html" style="display: block;" title="Xem chi tiết">
                <div class="hinh">
                    <img style="width: 100%" src="source/{{$sp_xemnhieu->UrlHinh}}" alt="" />
                </div>
                <div class="thongtinsp">
                    <b>{{$sp_xemnhieu->TenSP}}</b><br /> <br />
                    <div class="rateit" id="rateit" data-rateit-readonly="true" data-rateit-value="{{ round (($sp_xemnhieu->DiemTrungBinh/2),1)}}">
                    </div><br><br>
                    <div class="gia">{{number_format(((100 - $sp_xemnhieu->KhuyenMai)/100) * $sp_xemnhieu->Gia)}} VND</div>
                </div>
                <div style="clear: both;"></div>
            </a>
        </div>
    @endforeach
</div> <!--//TIN TUC-->