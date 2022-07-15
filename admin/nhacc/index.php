<?php 
	require_once('../layout/header.php');
	if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnExcel'])) {
					xuat();}

				function xuat(){
					header("Content-Type: application/xls");
					header("Content-Disposition: attachment; filename=nhacungcap.xls");
				}
 ?>

<div class="row" style="margin-top: 3px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Nhà cung cấp</h3>
		<form method="POST" >
			<input type="text" name="txtSearch" id='txtSearch' style="padding-bottom: 6px; width: 36%;">
			<input class="btn btn-primary" type="submit" name="btnSearch" value="Tìm Kiếm" id="btnQue">
			<button class="btn btn-success" name="btnExcel" id='btnTen'>Xuất excel</button>
		</form>
		<a href="insert.php"><button class="btn btn-success">Thêm Nhà cung cấp</button></a>
		<table class="table table-bordered table-hover" id="tblMain" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Hình ảnh</th>
					<th>Tên Nhà cung cấp</th>
					<th>SĐT</th>
					<th>email</th>
					<th>Địa chỉ</th>
					<th>Mô tả</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$conn = mysqli_connect("localhost","root","","demo");
					if ($conn == true) {
							$query = "SELECT * from nhacc";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td><img src='".$row['img']."'style='height:100px'></td>";
									// echo "<td>".$row['img']."</td>";
									echo "<td>".$row['TenNcc']."</td>";
									echo "<td>".$row['sdt']."</td>";										echo "<td>".$row['email']."</td>";
									echo "<td>".$row['diachi']."</td>";								
									echo "<td>".$row['MoTa']."</td>";
									echo "<td>".
									"<a href='update.php?id=".$row['id']."' class='btn btn-warning'>Sửa</a>"." ".
									"<a onclick='return confirm(\"Bạn có muốn xóa không?\")' class='btn btn-danger' href='delete.php?id=".$row['id']."'>Xóa</a>"
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
							$query = "SELECT * FROM nhacc where TenNcc LIKE '%".$key."%'";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								echo "<table id='tblMain' class='table table-bordered table-inverse table-hover'><thead>";
									echo "<tr>
									<th>STT</th>
									<th>Hình ảnh</th>
									<th>Tên Nhà cung cấp</th>
									<th>SĐT</th>
									<th>email</th>
									<th>Địa chỉ</th>
									<th>Mô tả</th>
									<th>Thao tác</th>
								</tr>";
									echo "</thead>";
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td><img src='".$row['img']."'style='height:100px'></td>";
									echo "<td>".$row['TenNcc']."</td>";
									echo "<td>".$row['sdt']."</td>";										echo "<td>".$row['email']."</td>";
									echo "<td>".$row['diachi']."</td>";								
									echo "<td>".$row['MoTa']."</td>";
									echo "<td>".
									"<a href='update.php?id=".$row['id']."' class='btn btn-warning'>Sửa</a>"." ".
									"<a onclick='return confirm(\"Bạn có muốn xóa không?\")' class='btn btn-danger' href='delete.php?id=".$row['id']."'>Xóa</a>"
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