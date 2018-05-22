$(document).ready(function(){
    // số lượng sản phẩm trong giỏ hàng
	/*$("#soluong").change(function(){
	    var sl= $("#soluong").val(); 
	        $.post("update_cart.php", {sl: sl}, function (data){
	        alert(data);
	    });
	});
    // địa chỉ giao hàng
	$('#tinhthanh').change(function(){
        var id_tinhthanh = $(this).val();
        $.post('giohang/data.php', {id_tinhthanh: id_tinhthanh}, function(data){
            $('#quanhuyen').html(data);
        });
    });
    $('#quanhuyen').change(function(){
        var id_quanhuyen = $(this).val();
        $.post('giohang/data.php', {id_quanhuyen: id_quanhuyen}, function(data){
            $('#phuongxa').html(data);
        });
    });*/
    //-----------------------------------------------------đăng nhập-----------------------------------------------//
    $('#dangnhap_p').click(function(){
        $("#login").fadeIn(500);
    });
    // kiểm tra username trống
    $('#logUsername').blur(function(){
        //lấy giá trị username
        var user = $('#logUsername').val();
        if(user == ""){
            // show class error đứng ngay sau id logUsername
            $('#logUsername').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#logUsername').next('.error').fadeOut(500);
        }
    });
    // kiểm tra password trống
    $('#logPassword').blur(function(){
        //lấy giá trị username
        var pass = $('#logPassword').val();
        if(pass == ""){
            $('#logPassword').next('.error').fadeIn(500);
            return false;
        }else {
            $('#logPassword').next('.error').fadeOut(500);
        }
    });
    // click nút đăng nhập
    $('#btnLogin').click(function(){
        var logUsername = $('#logUsername').val();
        var logPassword = $('#logPassword').val();
        if(logUsername == ''){
            $('#logUsername').next('.error').fadeIn(500);
            return false;
        }else{
            $('#logUsername').next('.error').fadeOut(500);
        }
        if(logPassword == ''){
            $('#logPassword').next('.error').fadeIn(500);
            return false;
        }else{
            $('#logPassword').next('.error').fadeOut(500);
        }
    });
    // close popup 'đăng nhập thành công';
   
    $('#close_i').click(function(){
        $("#login").fadeOut(500);
    });
    $('#login_bg').click(function(){
        $("#login").fadeOut(500);
    });
    //----------------------------------------------------đăng kí-------------------------------------------------//
    
    $('#dangki_p').click(function(){
        $("#dangki").fadeIn(500);
    });
    // kiểm tra username trống
    $('#dkUsername').blur(function(){
        //lấy giá trị username
        var user = $('#dkUsername').val();
        if(user.length < 7){
            // show class error đứng ngay sau id logUsername
            $('#dkUsername').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#dkUsername').next('.error').fadeOut(500);
        }
    });
    /// kiểm tra password trống
    $('#dkPassword').blur(function(){
        var pass = $('#dkPassword').val();
        if(pass.length < 6){
            $('#dkPassword').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            $('#dkPassword').next('.error').fadeOut(500);
        }
    });
    /// kiểm tra nhập lại password
    $('#re_dkPassword').blur(function(){
        var pass = $('#dkPassword').val();
        var re_pass = $('#re_dkPassword').val();
        if( re_pass == ""){
            $('#re_dkPassword').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        if(pass != re_pass){
            $('#re_dkPassword').next('.error').text('');
            $('#re_dkPassword').next('.error').text('Nhập lại password không đúng');
            $('#re_dkPassword').next('.error').fadeIn(500);
            return false;
        }
        if(re_pass != '' && pass == re_pass) {
            $('#re_dkPassword').next('.error').fadeOut(500);
        }
    });
    // kiểm tra họ tên
    $('#dkHoten').blur(function(){
        var hoten = $('#dkHoten').val();
        if(hoten == ""){
            $('#dkHoten').next('.error').fadeIn(500);
            return false;
        }else {
            $('#dkHoten').next('.error').fadeOut(500);
        }
    });
    // kiểm tra email
    $('#dkEmail').blur(function(){
        var email = $('#dkEmail').val();
        if(email == ""){
            $('#dkEmail').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        if(validateEmail(email)){
            $('#dkEmail').next('.error').text('');
            $('#dkEmail').next('.error').fadeOut(500);
        }else {
            $('#dkEmail').next('.error').text('Email sai định dạng');
            $('#dkEmail').next('.error').fadeIn(500);
        }
    });
    // hàm này kiểm tra định dạng email
    function validateEmail(email) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(email)) {
            return true;
        }
        else {
            return false;
        }
    }

    // kiểm tra số điện thoại
    $('#dkSdt').blur(function(){
        var sdt = $('#dkSdt').val();
        if(sdt == ""){
            $('#dkSdt').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        // nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#dkSdt').next('.error').text('');
            $('#dkSdt').next('.error').fadeOut(500);
        }else{ // return false  
            $('#dkSdt').next('.error').text('Số điện thoại không đúng');
            $('#dkSdt').next('.error').fadeIn(500);
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
    // kiểm tra địa chỉ
    $('#dkDiachi').blur(function(){
        var diachi = $('#dkDiachi').val();
        if(diachi == ""){
            $('#dkDiachi').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#dkDiachi').next('.error').fadeOut(500);
        }
    });
    // kiểm tra captcha
    $('#captcha').blur(function(){
        var captcha = $('#dkDiachi').val();
        if(captcha == ""){
            $('#captcha').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#captcha').next('.error').fadeOut(500);
        }
    });
    // reload captcha
    $('#reload').click(function(){
        var id= new Date().getTime(); // tránh cache browser
        $('#captcha_img').attr('src', 'admin/captcha/captcha.php');
        $('#captcha_img').attr('src', 'admin/captcha/captcha.php?'+ id); // tránh cache browser
    });
    // close dk
    $('.close_dk').click(function(){
        $('#dangki').fadeOut(500);
    });
    $('#dangki_bg').click(function(){
        $("#dangki").fadeOut(500);
    });
    // click dk
    $('#btnDK').click(function(){
        // lấy giá trị 
        var user = $('#dkUsername').val();
        var pass = $('#dkPassword').val();
        var re_pass = $('#re_dkPassword').val();
        var hoten = $('#dkHoten').val();
        var email = $('#dkEmail').val();
        var sdt = $('#dkSdt').val();
        var diachi = $('#dkDiachi').val();
        var captcha = $('#captcha').val();
        var urlhinh = $('#urlhinh').val();
        // kiểm tra username rỗng
        if(user.length < 7){
            // show class error đứng ngay sau id logUsername
            $('#dkUsername').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#dkUsername').next('.error').fadeOut(500);
        }
        // kiểm tra password rỗng
        if(pass.length < 6){
            $('#dkPassword').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            $('#dkPassword').next('.error').fadeOut(500);
        }
        // re_pass
        if( re_pass == ""){
            $('#re_dkPassword').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        if(pass != re_pass){
            $('#re_dkPassword').next('.error').text('');
            $('#re_dkPassword').next('.error').text('Nhập lại password không đúng');
            $('#re_dkPassword').next('.error').fadeIn(500);
            return false;
        }
        if(re_pass != '' && pass == re_pass) {
            $('#re_dkPassword').next('.error').fadeOut(500);
        }
        if(hoten == ""){
            $('#dkHoten').next('.error').fadeIn(500);
            return false;
        }else {
            $('#dkHoten').next('.error').fadeOut(500);
        }
        // email 
        if(email == ""){
            $('#dkEmail').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        if(validateEmail(email)){
            $('#dkEmail').next('.error').text('');
            $('#dkEmail').next('.error').fadeOut(500);
        }else {
            $('#dkEmail').next('.error').text('Email sai định dạng');
            $('#dkEmail').next('.error').fadeIn(500);
            return false;
        }
        // hàm này kiểm tra định dạng email
        function validateEmail(email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {
                return true;
            }
            else {
                return false;
            }
        }
        if(sdt == ""){
            $('#dkSdt').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }
        // nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#dkSdt').next('.error').text('');
            $('#dkSdt').next('.error').fadeOut(500);
        }else{ // return false  
            $('#dkSdt').next('.error').text('Số điện thoại không đúng');
            $('#dkSdt').next('.error').fadeIn(500);
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
        if(diachi == ""){
            $('#dkDiachi').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            // hidden class error
            $('#dkDiachi').next('.error').fadeOut(500);
        }
        if(captcha == ''){
            $('#captcha').next('.error').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else {
            $('#captcha').next('.error').fadeOut(500);//
        }
        if(pass != re_pass){
            $('.error').next('.error1').fadeIn(500);
            // dừng xử lý trang web
            return false;
        }else{
            $('.error').next('.error1').fadeOut(500);
        } 
        // gửi user & pass sang trang data.php
        if( user != '' && 
            pass != '' && 
            re_pass != '' && 
            hoten != '' && 
            email != '' && 
            sdt != '' && 
            diachi != '' && 
            captcha != '' && 
            pass == re_pass ){
            $.post("data/data_register.php",{user: user},function(data){
                $('.error_username').html(data);
            });
        }
    });
    //-------------------------------------------show hidden chi tiết sản phẩm----------------------//
    var dem = 1;
    $('#show_hide_mota').click(function(){
        if(dem %2 !=0){
            $('.mota').css('height','auto');
            $('#show_hide_mota').html('Thu gọn <i class="fa fa-chevron-up" aria-hidden="true"></i>');
            dem = dem +1;
        }else{
            $('.mota').css('height','140px');
             $('#show_hide_mota').html('Xem thêm <i class="fa fa-chevron-down" aria-hidden="true"></i>');
            dem = dem +1;
        }
    });
    //-------------------------------AJAX gửi bình luận----------------------------------//
        
    $('#btnGui').click(function(){
        var submit = $('#btnGui').val();
        var idsp = $('#idSP').val();
        var noidungbl = $('#textarea').val();
        if(noidungbl == ''){
            $('.error').html('Vui lòng nhập nội dung.');
            return false;
        }else {
            $('.error').html('');
            $.post('binhluan/data.php',{idsp:idsp, noidungbl:noidungbl,submit:submit}, function(data){
                $('#showBL').html(data);
            });
            $('#textarea').val('');
        }
    });
    //-----------------------------------hiện form trả lời bình luận-------------------------//
    $('.rep_like').click(function(){
        $(this).next('.text_rep').css('display','block');
    });
    // sau khi thực thi ajax, elment được load lên, thông thường sẽ không bắt dc các sự kiện
    // nên dùng hàm .on(sự kiện, đối tượng,function(){})
    $(document).on('click','.rep_like',function(){
        $(this).next('.text_rep').css('display','block');
    });
    //-----------------------------------AJAX trả lời bình luận----------------------//
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
            $.post('binhluan/data.php',{idBL:idBL, noidungtraloi:noidungtraloi, idsp:idsp }, function(data){
                $('#showBL').html(data);
            });
            $('#rep_binhluan').val('');
        }
    });
//-----------------------------------KIỂM TRA FORM ĐẶT HÀNG----------------------//
////---------------------BẮC BUỘC ĐIỀN HỌ TÊN, SỐ ĐIỆN THOẠI, EMAIL, ĐỊA CHỈ, SỐ NHÀ, TÊN ĐƯỜNG-------------------------//
    $('#name_inf').blur(function(){
        var name_inf = $(this).val();
        if(name_inf == ''){
            $('#name_inf').next('span').html('Vui lòng nhập họ tên.');
            return false;
        }else{
            $('#name_inf').next('span').html('');
        }
    });

    $('#sdt_inf').blur(function(){
        var sdt = $(this).val();
        if(sdt == ''){
            $(this).next('span').html('Số điện thoại không được để trống');
            return false;
        }
        // nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#sdt_inf').next('span').html('');
        }else{ // return false  
            $('#sdt_inf').next('span').text('Vui lòng nhập đúng số điện thoại');
            return false;
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
    //email 
    $('#email_inf').blur(function(){
        var email = $(this).val();
        if(email == ''){
            $(email_inf).next('span').html('Email không được để trống');
            return false;
        }
        if(validateEmail(email)){
            $('#email_inf').next('span').html('');
        }else {
            $('#email_inf').next('span').text('Email sai định dạng');
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
    $('#so_nha').blur(function(){
        var so_nha = $(this).val();
        if(so_nha == ''){
            $('#so_nha').next('span').html('Vui lòng nhập số nhà, tên đường.');
            return false;
        }else{
            $('#so_nha').next('span').html('');
        }
    });

    $('#dathang').click(function(){
        var name_inf = $('#name_inf').val();
        var sdt = $('#sdt_inf').val();
        var email = $('#email_inf').val();
        var so_nha = $('#so_nha').val();
        var tinhthanh = $('#tinhthanh').val();
        var quanhuyen = $('#quanhuyen').val();
        var phuongxa = $('#phuongxa').val();

        if(name_inf == ''){
            $('#name_inf').next('span').html('Vui lòng nhập họ tên.');
            return false;
        }else{
            $('#name_inf').next('span').html('');
        }
        //sdt
        if(sdt == ''){
            $('#sdt_inf').next('span').html('Số điện thoại không được để trống');
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
        // nếu return true
        if(validatephone(sdt)){
            // hidden class error
            $('#sdt_inf').next('span').html('');
        }else{ // return false  
            $('#sdt_inf').next('span').text('Vui lòng nhập đúng số điện thoại');
            return false;
        }
        if(email == ''){
            $('#email_inf').next('span').html('Email không được để trống');
            return false;
        }
        if(validateEmail(email)){
            $('#email_inf').next('span').html('');
        }else {
            $('#email_inf').next('span').text('Email sai định dạng.');
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
        if(tinhthanh == ''){
            $('#V_diachi').html('Vui lòng chọn tỉnh hoặc thành phố.');
            return false;
        }else{
            $('#V_diachi').html('');
        }
        if(quanhuyen == ''){
            $('#V_diachi').html('Vui lòng chọn quận hoặc huyện.');
            return false;
        }else{
            $('#V_diachi').html('');
        }
        if(phuongxa == ''){
            $('#V_diachi').html('Vui lòng chọn phường, xã, hoặc thị trấn.');
            return false;
        }else{
            $('#V_diachi').html('');
        }
        if(so_nha == ''){
            $('#so_nha').next('span').html('Vui lòng nhập số nhà, tên đường');
            return false;
        }else{
            $('#so_nha').next('span').html('');
        }
    });
/*---------------------------------ĐỔI MẬT KHẨU------------------------------------------*/
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
        var pass = $('#passwordi').val();
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
    /*---------------------------------ẨN QUẢNG CÁO------------------------------------------*/
    $("#qc").click(function(){
        $('.bgr_qc').css('display','none');
        $('.quangcao').css('display','none');
    });
    $(".bgr_qc").click(function(){
        $('.bgr_qc').css('display','none');
        $('.quangcao').css('display','none');

    });
}); // ready
