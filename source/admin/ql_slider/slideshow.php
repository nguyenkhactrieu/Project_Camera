<div style="text-align:center" id="quanly">
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <th>ID</th>
        <th>Hình</th>
        <th colspan="3"><div class="btn_them"><a href="them-hinh-anh.html"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbspThêm</a></div></th>
<?php
        $query = mysql_query ("select * from webma_slide");
        while ($row = mysql_fetch_array ($query)){?>
            <tr>
                <td align="center"><?php echo $row['idSL']; ?></td>
                <td align="center"><img style="max-width: 100px; <?php if($row['TrangThai'] == 0){ echo 'opacity: 0.4'; } ?>" src="<?php echo 'ql_slider/'.$row['UrlHinh']; ?>" alt=""></td>
                <td>
                    <div class="btn_xoa">
                        <a href="ql_slider/xoa.php?key=xoaHinh&id=<?php echo $row['idSL'];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> &nbspXóa
                        </a>
                    </div>
                </td>
                <td>
                    <div class="btn_sua">
                        <a href="index.php?key=sua-Hinh&id=<?php echo $row['idSL'];?>&trangthai=<?php echo $row['TrangThai']; ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp <?php if($row['TrangThai'] ==1 ){ echo 'Ẩn'; }else{ echo 'Hiện';} ?>	</a>
                    </div>
                </td>
            </tr>		
<?php	}    
?>
    </table>
</div>