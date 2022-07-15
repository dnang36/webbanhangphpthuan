<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" style="margin-top: 3px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Phản hồi </h3>
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ Tên</th>
					<th>Nội dung</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$conn = mysqli_connect("localhost","root","","demo");
					if ($conn == true) {
							$query = "SELECT * from phanhoi";
							$result = mysqli_query($conn,$query);
							if (mysqli_num_rows($result)>0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['HoTen']."</td>";
									echo "<td>".$row['MoTa']."</td>";
									echo "<td>".
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