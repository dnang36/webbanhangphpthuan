<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
	<?php 
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","demo");
		if ($conn == true) {
			$query = 'SELECT * FROM nhacc where id = "'.$id.'"';
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)) {
				while ($row= mysqli_fetch_assoc($result)) {
					$TenNcc = $row['TenNcc'];
					$MoTa = $row['MoTa'];
					$diachi = $row['diachi'];
					$email = $row['email'];
					$sdt = $row['sdt'];
					$img = $row['img'];
				}
			}
		}
	 ?>
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Sửa Nhà cung cấp</h3>
		<form method="POST" enctype="multipart/form-data">
			<div class="col-md-9 col-12" style="float: left;">
				<div class="form-group">
				<label >Tên sản phẩm:</label>
				<input type="text" class="form-control" name="TenNcc" required="" value="<?php echo isset($_POST['TenNcc']) ? $_POST['TenNcc'] : $TenNcc ?>">
				</div>

				<div class="form-group">
					<label >Địa chỉ:</label>
					<input type="text" class="form-control" name="diachi" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : $diachi ?>">
				</div>

				<div class="form-group">
					<label >Email:</label>
					<input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $email ?>">
				</div>

				<div class="form-group">
					<label >Số điện thoại:</label>
					<input type="text" class="form-control" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : $sdt ?>">
				</div>

				<div class="form-group">
					<label >Mô tả:</label>
					<input type="text" class="form-control" name="MoTa" value="<?php echo isset($_POST['MoTa']) ? $_POST['MoTa'] : $MoTa ?>">
				</div>
				<a href="index.php">Quay lại</a> <br>
				<button class="btn btn-success" name="btnGhi">Sửa</button>
			</div>
			
			<div class="col-md-3 col-12" style="border: solid grey 1px; padding-top: 5px; padding-bottom: 5px; float: left;">
					<div class="form-group">
						<label >Đường dẫn ảnh:</label>
						<input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" class="form-control" name="img">
					</div>
			</div>
			
		</form>
	</div>
	<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
			update();
		}

		function update(){
			$id = $_GET['id'];
			$TenNcc = $_POST['TenNcc'];			
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$sdt = $_POST['sdt'];
			$MoTa = $_POST['MoTa'];
			$file = $_FILES['img'];
			$newPath="../../assets/img/".$file['name'];
			$anh=move_uploaded_file($file['tmp_name'], $newPath);
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='UPDATE nhacc SET TenNcc="'.$TenNcc.'",diachi="'.$diachi.'",email="'.$email.'",sdt="'.$sdt.'",MoTa="'.$MoTa.'",img="'.$newPath.'" WHERE id = "'.$id.'"';
				
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