<?php 
    if (!isset($_SESSION['usernameadmin'])) {
        header ('location: ../index.html'); 
    }
?>
<?php  
	include('../connect.php');
	if(isset($_GET['key']) && $_GET['key'] == 'xoaHinh'){
		$idHinh = $_GET['id'];
		$query = ("delete from webma_slide where idSL =".$idHinh);
		if(mysql_query($query)){
			echo '<script> window.history.go(-1); </script>';
		}else{ echo "Error";}
	}
?>