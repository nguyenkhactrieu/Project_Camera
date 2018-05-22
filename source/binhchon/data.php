<?php
	include("../connect.php");
	if(isset($_POST['productID']) && isset($_POST['value'])){
		$diembinhchon = $_POST['value'] * 2;
		//cập nhật số lần chọn và số điểm bình chọn
		$querybinhchon = mysql_query("update webma_sanpham set DiemBinhChon = DiemBinhChon + '$diembinhchon', SoLanChon = SoLanChon + 1 where idSP = ".$_POST['productID']); 
		//lấy điểm binh chọn và số lần để tính điểm trung binh
		$querydiem = mysql_query("select DiemBinhChon,SoLanChon from webma_sanpham where idSP = ".$_POST['productID']);
		$rowdiem = mysql_fetch_array($querydiem);
		$diem = $rowdiem['DiemBinhChon'];
		$solan = $rowdiem['SoLanChon'];
		//tinh điểm trung bình
		$diemtrungbinh = ($diem / $solan);
		$queryDiemTrungBinh = mysql_query("update webma_sanpham set DiemTrungBinh ='$diemtrungbinh' where idSP = ".$_POST['productID']); 
		// lấy ra điểm trung bình
		$querydiemtb = mysql_query("select DiemTrungBinh,SoLanChon from webma_sanpham where idSP = ".$_POST['productID']);
		$rowdiemtb = mysql_fetch_array($querydiemtb);
		$diemtb = $rowdiemtb['DiemTrungBinh'];
		?>
		<span><?php echo round($diemtb,1); ?>/10&nbsp (<?php echo $rowdiemtb['SoLanChon'],' Lượt'; ?>)</span>
<?php	}?>