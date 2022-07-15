<?php 
	require_once('../layout/header.php');
	if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnExcel'])) {
					xuat();}

				function xuat(){
					header("Content-Type: application/xls");
					header("Content-Disposition: attachment; filename=donhang.xls");

				}
 ?>
<title>Trang sản phẩm</title>
<div class="row" style="margin-top: 3px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Đơn hàng</h3>
		<form method="POST" >
			<input type="text" name="txtSearch" id='txtSearch' style="padding-bottom: 6px; width: 36%;">
			<input class="btn btn-success" type="submit" name="btnSearch" value="Tìm Kiếm" id="btnQue">
			<button class="btn btn-success" name="btnExcel" id='btnTen'>Xuất excel</button>
		</form>
		<table id="tblMain" class="table table-bordered table-hover" style="margin-top: 20px;">
			
				<tr>
					<th>STT</th>
					<th>Họ Tên</th>
					<th>Email</th>
					<th>SĐT</th>
					<th>Địa chỉ</th>
					<th>Mô tả</th>
					<th>nội dung</th>
					<th></th>
				</tr>
			
			<tbody>
				<?php
					$conn = mysqli_connect("localhost","root","","demo");
					if ($conn == true) {
							$query = "SELECT * from donhang";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['HoTen']."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>".$row['sdt']."</td>";
									echo "<td>".$row['DiaChi']."</td>";
									echo "<td>".$row['MoTa']."</td>";
									echo "<td>".number_format($row['TongTien'])." VNĐ"."</td>";
									echo "<td>".
									"<a href='' class='btn btn-success'>Chấp nhận</a>"." ".
									"<a onclick='return confirm(\"Bạn có muốn xóa không?\")' class='btn btn-danger' href='delete.php?id=".$row['id']."'>Từ chối</a>"
									."</td>";
									echo "</tr>";

								}
							}
						}
				?>
			</tbody>
			<?php 
				if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnSearch'])) {
						search();
					}	
					function search(){
						$key = $_POST['txtSearch'];
						echo "<script type='text/javascript'>
						var tbl = document.getElementById('tblMain');
						var btnSearch = document.getElementById('txtSearch');
						btnSearch.value = '".$key."';
						tbl.innerHTML='';
						</script>";
						$conn = mysqli_connect("localhost","root","","demo");
						if ($conn == true) {
								$query = "SELECT * from donhang WHERE HoTen LIKE '%".$key."%'";
								$result = mysqli_query($conn,$query);
								if (mysqli_num_rows($result)>0) {
									echo "<table id='tblMain' class='table table-bordered table-inverse table-hover'><thead>";
									echo "<tr><th>STT</th>
											<th>Họ Tên</th>
											<th>Email</th>
											<th>SĐT</th>
											<th>Địa chỉ</th>
											<th>Mô tả</th>
											<th>nội dung</th>
											<th></th></tr>";
									echo "</thead>";
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>".$row['id']."</td>";
										echo "<td>".$row['HoTen']."</td>";
										echo "<td>".$row['email']."</td>";
										echo "<td>".$row['sdt']."</td>";
										echo "<td>".$row['DiaChi']."</td>";
										echo "<td>".$row['MoTa']."</td>";
										echo "<td>".number_format($row['TongTien'])." VNĐ"."</td>";
										echo "<td>".
										"<a href='' class='btn btn-success'>Chấp nhận</a>"." ".
										"<a onclick='return confirm(\"Bạn có muốn xóa không?\")' class='btn btn-danger' href='delete.php?id=".$row['id']."'>Từ chối</a>"
										."</td>";
										echo "</tr>";

									}
								}
							}
					}
			 ?>
		</table>
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
 ?>