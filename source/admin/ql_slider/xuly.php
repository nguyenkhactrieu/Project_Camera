<meta charset="utf-8">
<?php  
	function checkData($string){
			$string = trim($string);
			$string = str_replace(' ', '_', $string);
			$string = str_replace('-', '_', $string);
			$string = str_replace("'", '_', $string);
			$string = strtolower($string); // chuyển chữ hoa thành chữ thường.
		return $string;
	}
	//****************************THÊM HÌNH ẢNH SLIDE*****************************//
	error_reporting(0);
	include('../connect.php');
	include('Images.class.php');
	if(isset($_POST['themHinh'])){
		// tạo 1 chuỗi randum, mã hóa chuỗi sang md5, dc 32 kí tự,tránh upload ảnh trùng tên
	    $str = md5(rand(0,99999));
	    // cắt chuỗi ở trên, lấy ra 5 ký tự
		$str = substr($str, rand(0,20) , 5);

		$img = $_FILES['hinh'] ['name'];
		$img = checkData($img);
		$img = $str.$img;

		$link_img = 'img/'.$img;

		$tmp_name = $_FILES['hinh'] ['tmp_name'];
		$loi = $_FILES['hinh'] ['error'];
		//
		$type = $_FILES['hinh'] ['type'];
		$size = $_FILES['hinh'] ['size'];
		// kiểm tra size và type, bắt buộc phải là file ảnh jpg, png hoặc jpeg
		if($size > 3145728){
			echo "<script> alert('File ảnh không được lớn hơn 3MB'); window.history.go(-1); </script>";
		}elseif($type != "image/jpg" && $type != "image/png" && $type != "image/jpeg" ){
			echo "<script> alert('ERROR'); window.history.go(-1); </script>";
		}else{
			// lenh upload file len server
			move_uploaded_file($tmp_name,$link_img);
			$temp =explode('.', $img);
			$thumb = 'img'.$temp[0].'.'.$temp[1];

			$imagethumb = new Image('img/'.$img);
			
			$imagethumb->resize(980,380,'resize');
			$imagethumb->save($temp[0],'img');

			$queryUrlHinh =("insert into webma_slide (UrlHinh) values ('$link_img')");
			if(mysql_query($queryUrlHinh)){
				echo '<script> window.history.go(-2); </script>';
			}
		}
	}
?>