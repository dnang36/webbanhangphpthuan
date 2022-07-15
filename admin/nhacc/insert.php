<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Thêm Nhà cung cấp</h3>
		<form method="POST" enctype="multipart/form-data">
				<div class="col-md-9 col-12" style="float: left;">
					<div class="form-group">
					<label >Tên Nhà cung cấp:</label>
					<input type="text" class="form-control" name="TenNcc" required="">
				</div>

				<div class="form-group">
					<label >Địa chỉ:</label>
					<input type="text" class="form-control" name="diachi">
				</div>

				<div class="form-group">
					<label >Email:</label>
					<input type="email" class="form-control" name="email">
				</div>

				<div class="form-group">
					<label >Số điện thoại:</label>
					<input type="text" class="form-control" name="sdt">
				</div>

				<div class="form-group">
					<label >Mô tả:</label>
					<input type="text" class="form-control" name="MoTa">
				</div>
				<button class="btn btn-success" name="btnGhi">Thêm sản phẩm</button> <br>
				<a href="index.php">Quay lại</a> <br>
			</div>
			
			<div class="col-md-3 col-12" style="border: solid grey 1px; padding-top: 5px; padding-bottom: 5px; float: left;">
					<div class="form-group">
						<label >Đường dẫn ảnh:</label>
						<input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" class="form-control" name="img">
					</div>
			</div>		
		</form>
		<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
			insert();
		}
		function insert(){
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
				$query ='INSERT INTO nhacc(TenNcc,diachi,email,sdt,MoTa,img) values("'.$TenNcc.'","'.$diachi.'","'.$email.'","'.$sdt.'","'.$MoTa.'","'.$newPath.'")';
				$result = mysqli_query($conn,$query);
				if ($result) {
					echo "<script type='text/javascript'>
					alert('Thêm thành công');
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
</div>
 <?php 
 	require_once('../layout/footer.php');
  ?>