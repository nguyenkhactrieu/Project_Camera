@extends('master')
@section ('title')
    Giỏ Hàng
@endsection
@section('content')
<div class="tatcasanpham">
    <div id="giohang">
        <div id="top">
            <a href="index.php"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                mua thêm sản phẩm khác</a>
            <span>GIỎ HÀNG CỦA BẠN</span>
        </div>
        <div id="main-cart">
            
            <ul>
                @foreach($content as $item)
                <li>
                    <div id="img_name">
                        <div id="img">
                            <img width="100px;" src="source/{{$item->options->has('img') ? $item->options->img : ''}}">
                        </div>
                        <div id="name_gia">
                            <a href="chi-tiet-san-pham/{{$item->id}}" style="">{{$item->name}}</a>
                            <p style="">Giá: {{number_format($item->price)}} VNĐ</p>
                        </div>
                    </div>
                    <div id="del_sl">
                        <div id="del">
                            <i class="fa fa-trash" aria-hidden="true"></i> <a href="xoa-san-pham/{{$item->rowId}}">Delete</a>
                            
                        </div>
                        <div id="sl">
                            <form action="{{route('capnhatgiohang')}}" method="post" name="form_sl">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="">Số Lượng:  </label>
                                <input id="show_sl" type="number" min="1" max="10" size="1" onKeyUp="" name="qty" value="{!! $item->qty !!}">
                                <input type="hidden" id="rowID" name="rowID" value="{{$item->rowId}}">
                                <input type="submit" class="capnhat" value="Update" style="height: 20px;">
                            </form>
                        </div>
                    </div>
                        <p style="color:red;text-align:center"></p>
                </li>
                @endforeach
            </ul>
            <!--**************PHẦN TỔNG TIỀN, UPDATE GIỎ HÀNG************-->
            <div id="tongtien">
                <div id="tongtien_span">
                    <span>Tổng tiền:</span><span id="tong">{{$total}} VNĐ</span>
                </div>
            </div>
            <hr>
            
            <form action="{{route('dathang')}}" method="post" name="form_info">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div id="thongtin_thanhtoan">
                <div class="info_address">THÔNG TIN GIAO HÀNG VÀ THANH TOÁN</div>
                <!--giới tính-->
                <div id="male_female">
                    <span>
                        <input type="radio" id="male_f" name="male_f" value="1" checked="checked" >
                        <label for="">Anh</label>
                    </span>
                    <span style="margin-left: 20px;">
                        <input type="radio" id="male_f2" name="male_f" value="2">
                        <label for="">Chị</label>
                    </span>
                <!--//giới tính-->
                </div>
                <!--********************* thông tin người đặt hàng*********************-->
                <div width="100%" id="table_inf">
                    <input type="text" id="name_inf" name="name" placeholder="Họ và tên">
                    <span></span>
                    <input style="margin-top: 10px;" id="sdt_inf" type="text" name="phone" placeholder="Số điện thoại">
                    <span></span>
                    <input style="margin-top: 10px;" id="email_inf" type="email" name="email" placeholder="Email">
                    <span></span>
                    <textarea style="margin-top: 10px;" type="text" name="note" placeholder="Ghi Chú"></textarea> 

                    <div style="margin-top: 10px;" class="info_address">ĐỊA CHỈ GIAO HÀNG</div>
                </div> 
                <!--*********************** //thông tin người đặt hàng******************-->
                <div width="100%" id="diachi">
                    
                    <div style="clear: both;"></div>
                    <span id="V_diachi"></span>
                    <input style="margin-top: 10px;" type="text" id="so_nha" name="so_nha" placeholder="Số nhà, tên đường">
                    <span></span>
                    <div style="margin:auto; width: auto; height: 60px; margin-top: 10px;">
                        <input type="submit" name="dathang" id="dathang" value="ĐẶT HÀNG NGAY">
                    </div>
                    
                    <div style="margin-top: 10px;">
                        <a href="index.php">Tiếp tục mua hàng <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </div>

                </div>
            </div><!--//thông tin thanh toán-->
            </form>
        </div>
    </div>
</div><!--//Container SAN PHAM-->
@include ('sanpham_xemnhieu')
@endsection