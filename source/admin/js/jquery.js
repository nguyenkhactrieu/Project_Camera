$(document).ready(function(){
	//************************************kiểm tra dữ liệu rỗng************************************//
	// Đưa con trỏ chuột ra khỏi text
	$('#logUsername').blur(function(){
		//lấy giá trị username
		var user = $('#logUsername').val();
		if(user == ""){
			// show class error đứng ngay sau id logUsername
			$('#logUsername').next('.error').show();
			// dừng xử lý trang web
			return false;
		}else {
			// hidden class error
			$('#logUsername').next('.error').hide();
		}
	});
	// tương tụ phần username ở trên
	$('#logPassword').blur(function(){
		//lấy giá trị username
		var pass = $('#logPassword').val();
		if(pass == ""){
			$('#logPassword').next('.error').show();
			return false;
		}else {
			$('#logPassword').next('.error').hide();
		}
	});
	// captcha 
	$('#captcha').blur(function(){
		var code = $('#captcha').val();
		if(code == ""){
			$('#captcha').next('.error').show();
			return false;
		}else {
			$('#captcha').next('.error').hide();
		}
	});
	// khi nút đăng nhập dc nhấn.
	$('#btnLogin').click(function(){
		// lấy val của text user.
		var user = $('#logUsername').val();
		if(user == ""){
			// show class error
			$('#logUsername').next('.error').show();
			// dừng xử lý trang web
			return false;
		}else {
			$('#logUsername').next('.error').hide();
		}
		// lấy val của text pass.
		var pass = $('#logPassword').val();
		if(pass == ""){
			$('#logPassword').next('.error').show();
			return false;
		}else {
			$('#logPassword').next('.error').hide();
		}
		// captcha
		var code = $('#captcha').val();
		if(code == ""){
			$('#captcha').next('.error').show();
			return false;
		}else {
			$('#captcha').next('.error').hide();
		}
	});
	// reload captcha 
	$('#reload').click(function(){
		var id= new Date().getTime();
        $('#captcha_img').attr('src', 'captcha/captcha.php');
        $('#captcha_img').attr('src', 'captcha/captcha.php?'+ id);
	});

	/*---------------------------------------------------------------*/
	/*---------------------------------------------------------------*/
	/*-----------------------------Thêm USERs----------------------------------*/
	$('#hoteni').blur(function(){
		var hoten = $(this).val();
		if(hoten == ''){
			$(this).next('span').html('Họ tên không được để trống');
			return false;
		}else{
			$(this).next('span').html('');
		}
	});

	$('#usernamei').blur(function(){
		var username = $(this).val();
		if(username == ''){
			$(this).next('span').html('Username không được để trống');
			return false;
		}else{
			$(this).next('span').html('');
		}
	});

	$('#passwordi').blur(function(){
		var password = $(this).val();
		if(password.length < 7){
			$(this).next('span').html('Password phải lớn hơn 6 ký tự');
			return false;
		}else{
			$(this).next('span').html('');
		}
	});

	$('#re_passwordi').blur(function(){
        var pass = $('#passwordi').val();
        var re_pass = $('#re_passwordi').val();
        if( re_pass == ""){
            $('#re_passwordi').next('span').html('Nhập lại password');
            // dừng xử lý trang web
            return false;
        }
        if(pass != re_pass){
            $('#re_passwordi').next('span').html('');
            $('#re_passwordi').next('span').html('Nhập lại password không đúng');
            return false;
        }
        if(re_pass != '' && pass == re_pass) {
            $('#re_passwordi').next('span').html('');
        }
    });

	$('#emaili').blur(function(){
		var email = $(this).val();
		if(email == ''){
			$(this).next('span').html('Email không được để trống');
			return false;
		}
		if(validateEmail(email)){
            $('#emaili').next('span').html('');
        }else {
            $('#emaili').next('span').text('Email sai định dạng');
            return false;
        }
	});
	// hàm kiểm tra định dạng email
	function validateEmail(email) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(email)) {
            return true;
        }
        else {
            return false;
        }
    }

	$('#sdti').blur(function(){
		var sdt = $(this).val();
		if(sdt == ''){
			$(this).next('span').html('Số điện thoại không được để trống');
			return false;
		}
		// nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#sdti').next('span').html('');
        }else{ // return false  
            $('#sdti').next('span').text('Vui lòng nhập đúng số điện thoại');
            return false
        }
	});
	// hàm này kiểm tra số điện thoại
    function validatephone(sdt) {
        var filter = /^[0-9-+]+$/;
        if (filter.test(sdt)) {
            return true;
        }
        else {
            return false;
        }
    }
    $('#diachii').blur(function(){
		var diachi = $(this).val();
		if(diachi == ''){
			$(this).next('span').html('Địa chỉ không được để trống');
			return false;
		}else{
			$(this).next('span').html('');
		}
	});
    $('#submitU').click(function(){
    	var hoten = $('#hoteni').val();
    	var username = $('#usernamei').val();
    	var password = $('#passwordi').val();
    	var re_pass = $('#re_passwordi').val();
    	var email = $('#emaili').val();
    	var sdt = $('#sdti').val();
    	var diachi = $('#diachii').val();
    	//----------họ tên------------//
		if(hoten == ''){
			$('#hoteni').next('span').html('Họ tên không được để trống');
			return false;
		}else{
			$('#hoteni').next('span').html('');
		}
		//----------email------------//
		if(email == ''){
			$('#emaili').next('span').html('Email không được để trống');
			return false;
		}
		if(validateEmail(email)){
            $('#emaili').next('span').html('');
        }else {
            $('#emaili').next('span').text('Email sai định dạng');
            return false;
        }
		// hàm kiểm tra định dạng email
		function validateEmail(email) {
	        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	        if (filter.test(email)) {
	            return true;
	        }
	        else {
	            return false;
	        }
	    }
	    //----------SDT------------//
		if(sdt == ''){
			$('#sdti').next('span').html('Số điện thoại không được để trống');
			return false;
		}
		// nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#sdti').next('span').html('');
        }else{ // return false  
            $('#sdti').next('span').text('Vui lòng nhập đúng số điện thoại');
            return false;
        }
        // hàm này kiểm tra số điện thoại
	    function validatephone(sdt) {
	        var filter = /^[0-9-+]+$/;
	        if (filter.test(sdt)) {
	            return true;
	        }
	        else {
	            return false;
	        }
	    }
	    //----------Địa chỉ------------//
		if(diachi == ''){
			$('#diachii').next('span').html('Địa chỉ không được để trống');
			return false;
		}else{
			$('#diachii').next('span').html('');
		}
		//----------tên đăng nhập------------//
		if(username == ''){
			$('#usernamei').next('span').html('username không được để trống');
			return false;
		}else{
			$('#usernamei').next('span').html('');
		}
		//----------nhập pass------------//
		if(password.length < 7){
			$('#passwordi').next('span').html('password phải lớn hơn 6 ký tự');
			return false;
		}else{
			$('#passwordi').next('span').html('');
		}
	     
	    //----------re_pass------------//
       	if( re_pass == ""){
            $('#re_passwordi').next('span').html('Nhập lại password');
            // dừng xử lý trang web
            return false;
        }
        if(pass != re_pass){
            $('#re_passwordi').next('span').html('');
            $('#re_passwordi').next('span').html('Nhập lại password không đúng');
            return false;
        }
        if(re_pass != '' && pass == re_pass) {
            $('#re_passwordi').next('span').html('');
        }
    });

    //------------------------------------ĐỔI MẬT KHẨU------------------------------------------//
    //---mật khẩu cũ-----/
    $('#dpasswordi').blur(function(){
    	var dpasswordi = $('#dpasswordi').val();
    	if(dpasswordi.length < 7){
    		$("#dpasswordi").next('span').html('Mật khẩu phải lớn hơn 6 kí tự');
    		return false;
    	}else{
    		$("#dpasswordi").next('span').html('');
    	}
    });
    //---mật khẩu mới-----/
    $('#new_passwordi').blur(function(){
    	var mkMoi = $('#new_passwordi').val();
    	if(mkMoi.length < 7){
    		$("#new_passwordi").next('span').html('Mật khẩu phải lớn hơn 6 kí tự');
    		return false;
    	}else{
    		$("#new_passwordi").next('span').html('');
    	}
    });
    //----nhập lại mật khẩu mới-----/
    $('#renew_passwordi').blur(function(){
        var pass = $('#new_passwordi').val();
        var re_pass = $('#renew_passwordi').val();
        if( re_pass == ""){
            $('#renew_passwordi').next('span').html('Nhập lại password');
            // dừng xử lý trang web
            return false;
        }
        if(pass != re_pass){
            $('#renew_passwordi').next('span').html('');
            $('#renew_passwordi').next('span').html('Nhập lại password không đúng');
            return false;
        }
        if(re_pass != '' && pass == re_pass) {
            $('#re_passwordi').next('span').html('');
        }
    });
    $('#submitDoiMK').click(function(){
    	var dpasswordi = $('#dpasswordi').val();
    	var mkMoi = $('#new_passwordi').val();
    	var RmkMoi = $('#renew_passwordi').val();

    	if(dpasswordi.length < 7){
    		$("#dpasswordi").next('span').html('Mật khẩu phải lớn hơn 6 kí tự');
    		return false;
    	}else{
    		$("#dpasswordi").next('span').html('');
    	}

    	if(mkMoi.length < 7){
    		$("#new_passwordi").next('span').html('Mật khẩu phải lớn hơn 6 kí tự');
    		return false;
    	}else{
    		$("#new_passwordi").next('span').html('');
    	}
    	
    	if( RmkMoi == ""){
            $('#renew_passwordi').next('span').html('Nhập lại password');
            // dừng xử lý trang web
            return false;
        }
        if(mkMoi != RmkMoi){
            $('#renew_passwordi').next('span').html('');
            $('#renew_passwordi').next('span').html('Nhập lại password không đúng');
            return false;
        }
        if(RmkMoi != '' && mkMoi == RmkMoi) {
            $('#re_passwordi').next('span').html('');
        }
    });
    /*------------------------------------PHẦN BÌNH LUẬN---------------------------------------*/
    $('.rep_like').click(function(){
    	$('.text_rep').css('display','block')
    });
    $(document).on('click','.rep_like',function(){
        $(this).next('.text_rep').css('display','block');
    });
    $(document).on('click','.submitRep',function(){
        // những class có tên idBL đứng trước class submitRep  (prevAll)
        var idBL = $(this).prevAll('.idBL').val();
        var noidungtraloi = $(this).prevAll('.rep_binhluan').val();
        var idsp = $(this).prevAll('.idSP').val();
        if(noidungtraloi == ''){
            $('.error1').html('Vui lòng nhập nội dung.');
            return false;
        }else {
            $('.error1').html('');
            $.post('ql_binhluan/data.php',{idBL:idBL, noidungtraloi:noidungtraloi, idsp:idsp }, function(data){
                $('#showBL').html(data);
            });
            $('#rep_binhluan').val('');
        }
    });
    /*---------------------------------------------------------------*/
	/*---------------------------------------------------------------*/
	/*-----------------------------Thêm SẢN PHẨM----------------------------------*/
	$('#themsp').click(function(){
		var loaisp = $('#loaisp').val();
		var tensp = $('#tensp').val();
		var hinh = $('#hinh').val();
		var gia = $('#gia').val();
		var baohanh = $('#baohanh').val();
		var xuatxu = $('#xuatxu').val();
		var tinhtrang = $('#tinhtrang').val();
		function validatenum(gia) {
	        var filter = /^[0-9]+$/;
	        if (filter.test(gia)) {
	            return true;
	        }
	        else {
	            return false;
	        }
	    }
		if(loaisp == ''){
			$('#loaisp').next('p').html('Chọn loại sản phẩm');
			return false;
		}else{
			$('#loaisp').next('p').html('');
		}
		if(tensp == ''){
			$('#tensp').next('p').html('Tên sản phẩm không được để trống');
			return false;
		}else{
			$('#tensp').next('p').html('');
		}
		if(hinh == ''){
			$('#hinh').next('p').html('Chọn hình sản phẩm');
			return false;
		}else{
			$('#hinh').next('p').html('');
		}
		if(gia == ''){
			$('#gia').next('p').html('Giá sản phẩm không được để trống');
			return false;
		}if(validatenum(gia)){
			$('#gia').next('p').html('');
		}else{
			$('#gia').next('p').html('Nhập số nguyên dương');
			return false;
		}
		if(baohanh == ''){
			$('#baohanh').next('p').html('Bảo hành không được để trống');
			return false;
		}if(validatenum(baohanh)){
			$('#baohanh').next('p').html('');
		}else{
			$('#baohanh').next('p').html('Nhập số nguyên dương');
			return false;
		}
		if(xuatxu == ''){
			$('#xuatxu').next('p').html('Xuất xứ không được để trống');
			return false;
		}else{
			$('#xuatxu').next('p').html('');
		}
		if(tinhtrang == ''){
			$('#tinhtrang').next('p').html('Chọn tình trạng sản phẩm');
			return false;
		}else{
			$('#tinhtrang').next('p').html('');
		}
	});
	// thêm chủng loại
	$('#themchungloai').click(function(){
		var tencl = $('#ten_chung_loai').val();
		if(tencl == ''){
			$('#ichungloai').next('p').html('Nhập tên chủng loại');
			return false;
		}else{
			$('#ichungloai').next('p').html('');
		}
	});
	// thêm loại sản phẩm
	$('#themloai').click(function(){
		var chungloai = $('#chon_chungloai').val();
		var tenloai = $('#tenloai').val();
		if(chungloai == '' ){
			$('#chon_chungloai').next('span').html('Chọn chủng loại');
			return false;
		}else{
			$('#chon_chungloai').next('span').html('');
		}
		if(tenloai == ''){
			$('#ithemthoai').next('span').html('Nhập tên loại');
			return false;
		}else{
			$('#ithemthoai').next('span').html('');
		}
	});
	// rewrite url lọc trạng thái đơn hàng.
	$('#trangthaidonhang').change(function(){
		var trangthai = $(this).val();
		window.location.href = "trang-thai-don-hang-"+trangthai+".html";
	});
	/*
	|
	| Lọc sản phẩm theo loai, trong menu sản phẩm
	|
	 */
	$('#chungloai').change(function(){
		var chungloai = $('#chungloai').val();
		$.get('http://localhost/camera/admin/san-pham/chon-chung-loai/'+chungloai, function(data){
			$('#loai').html(data);
		});
	});
	$('#loai').change(function(){
		var loai = $('#loai').val();
		var chungloai = $('#chungloai').val();
		window.location.href = 'http://localhost/camera/admin/san-pham/danh-sach-theo-loai/'+loai;
	});
	$('#locBL').change(function(){
		var trangthai = $('#locBL').val();
		window.location.href = "binh-luan-san-pham-"+trangthai+".html";
	});
}); // ready
