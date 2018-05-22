<?php 
    if (!isset($_SESSION['usernameadmin'])) {
        header ('location: ../index.html'); 
    }
?>
<?php  
	if(isset($_GET['key']) && $_GET['key'] == 'sua-Hinh'){
		$idHinh = $_GET['id'];
		$trangthai = $_GET['trangthai'];
		if($trangthai == 1 ){
			$query = ("update webma_slide set TrangThai = 0 where idSL = ".$idHinh);
		}elseif($trangthai == 0){
			$query = ("update webma_slide set TrangThai = 1 where idSL = ".$idHinh);
		}
		if(mysql_query($query)){
			echo '<script> window.history.go(-1); </script>';
		}else{ echo "Error";}
	}
?>