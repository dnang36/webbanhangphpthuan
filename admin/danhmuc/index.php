<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" style="margin-top: 3px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản lý Danh mục sản phẩm</h3>

		<a href="insert.php"><button class="btn btn-success">Thêm Danh Mục</button></a>
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên danh mục</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$conn = mysqli_connect("localhost","root","","demo");
					if ($conn == true) {
							$query = "select * from danhmuc";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['TenDanhMuc']."</td>";
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
		</table>
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
 ?>