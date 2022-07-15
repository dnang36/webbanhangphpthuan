<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
	<?php 
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","demo");
		if ($conn == true) {
			$query = 'SELECT * FROM danhmuc where id = "'.$id.'"';
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)) {
				while ($row= mysqli_fetch_assoc($result)) {
					$TenDanhMuc = $row['TenDanhMuc'];
				}
			}
		}
	 ?>
<div class="col-md-12 table-responsive">
		<h3 class="text-center">sửa tài khoản người dùng</h3>
		<form method="POST">
			<div class="form-group">
				<label >Tên Danh Mục:</label>
				<input type="text" class="form-control" name="TenDanhMuc" value="<?php echo isset($_POST['TenDanhMuc']) ? $_POST['TenDanhMuc'] : $TenDanhMuc ?>" required="">
			</div>
			<a href="index.php">Quay lại</a> <br>
			<button class="btn btn-success" name="btnGhi">Sửa</button>
		</form>
	</div>
	<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
			update();
		}

		function update(){
			$id = $_GET['id'];
			$TenDanhMuc = $_POST['TenDanhMuc'];
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='UPDATE danhmuc SET TenDanhMuc="'.$TenDanhMuc.'" WHERE id = "'.$id.'"';
				
				$result = mysqli_query($conn,$query);
				if ($result) {
					echo "<script type='text/javascript'>
					alert('sửa thành công');
					</script>";
				}
				else{
					echo "<script type='text/javascript'>
					alert('sai');
					</script>";
				}
			}
		}
	 ?>
</div>

 <?php 
 	require_once('../layout/footer.php');
  ?>