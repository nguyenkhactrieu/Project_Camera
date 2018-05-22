<?php 
    if (!isset($_SESSION['usernameadmin'])) {
        header ('location: ../index.html'); 
    }
?>
<div id="them">
	<h1>THÊM HÌNH ẢNH</h1>
	<form action="ql_slider/xuly.php" name="themloai" method="post" enctype="multipart/form-data">
		<div class="items-input" style="height: 30px; margin-bottom: 10px;">
			<div class="input">
				<input type="file" name="hinh">
			</div>
		</div><hr>
		<div style="clear: both;"></div>
		<div>
			<input class="btn_them" style="margin: auto; margin-top: 20px;color:white; font-weight: bold;" type="submit" name="themHinh" value="Thêm">
		</div>
		
	</form>
</div>