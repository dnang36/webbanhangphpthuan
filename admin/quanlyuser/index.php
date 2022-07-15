<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" style="margin-top: 3px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Người Dùng</h3>
		<form method="POST" >
			<input type="text" name="txtSearch" id='txtSearch' style="padding-bottom: 6px; width: 36%;">
			<input class="btn btn-primary" type="submit" name="btnSearch" value="Tìm Kiếm" id="btnQue">
		
		</form>
		<a href="insert.php"><button class="btn btn-success">Thêm Tài Khoản</button></a>
		<table class="table table-bordered table-hover" id="tblMain" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & Tên</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa Chỉ</th>
					<th>Quyền</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$conn = mysqli_connect("localhost","root","","demo");
					if ($conn == true) {
							$query = "select * from user";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['HoTen']."</td>";
									echo "<td>".$row['NgaySinh']."</td>";
									echo "<td>".$row['GioiTinh']."</td>";
									echo "<td>".$row['sdt']."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>".$row['diachi']."</td>";
									echo "<td>".$row['role_id']."</td>";
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
							$query = "SELECT * FROM user where HoTen LIKE '%".$key."%'";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								echo "<table id='tblMain' class='table table-bordered table-inverse table-hover'><thead>";
									echo "<tr>
									<th>STT</th>
									<th>Họ & Tên</th>
									<th>Ngày sinh</th>
									<th>Giới tính</th>
									<th>SĐT</th>
									<th>Email</th>
									<th>Địa Chỉ</th>
									<th>Quyền</th>
									<th>Thao tác</th>
								</tr>";
									echo "</thead>";
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['HoTen']."</td>";
									echo "<td>".$row['NgaySinh']."</td>";
									echo "<td>".$row['GioiTinh']."</td>";
									echo "<td>".$row['sdt']."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>".$row['diachi']."</td>";
									echo "<td>".$row['role_id']."</td>";
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