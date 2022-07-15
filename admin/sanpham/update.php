<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
	<?php 
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","demo");
		if ($conn == true) {
			$query = 'SELECT * FROM sanpham where id = "'.$id.'"';
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)) {
				while ($row= mysqli_fetch_assoc($result)) {
					$TenSp = $row['TenSp'];
					$MoTa = $row['MoTa'];
					$GiaTien = $row['GiaTien'];
					$id_danhmuc = $row['id_danhmuc'];
					$img = $row['img'];
				}
			}
		}
	 ?>
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Sửa Sản Phẩm</h3>
		<form method="POST" enctype="multipart/form-data">
			<div class="col-md-9 col-12" style="float: left;">
				<div class="form-group">
				<label >Tên sản phẩm:</label>
				<input type="text" class="form-control" name="TenSp" required="" value="<?php echo isset($_POST['TenSp']) ? $_POST['TenSp'] : $TenSp ?>">
				</div>

				<div class="form-group">
					<label >Mô tả:</label>
					<input type="text" class="form-control" name="MoTa" value="<?php echo isset($_POST['MoTa']) ? $_POST['MoTa'] : $MoTa ?>">
				</div>

				<div class="form-group">
					<label >Giá Tiền:</label>
					<input type="text" class="form-control" name="GiaTien" value="<?php echo isset($_POST['GiaTien']) ? $_POST['GiaTien'] : $GiaTien ?>">
				</div>

				<div class="form-group">
					<label >Danh mục:</label>
					<?php 
					echo "<select class='form-control' name='id_danhmuc'>";
						$conn = mysqli_connect("localhost","root","","demo");
						$id = $_GET['id'];
							if ($conn == true) {
								$query = "SELECT id,TenDanhMuc FROM danhmuc";
								$result = mysqli_query($conn,$query);
								if (mysqli_num_rows($result)) {
									while ($row = mysqli_fetch_assoc($result)) {
					echo "<option value='".$row['id']."'>". $row['TenDanhMuc'] . "</option>";
									}
							}
						}
						echo "</select>";
					?>	
				</div>
				<a href="index.php">Quay lại</a> <br>
				<button class="btn btn-success" name="btnGhi">Sửa sản phẩm</button>
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
			$TenSp = $_POST['TenSp'];
			$MoTa = $_POST['MoTa'];
			$GiaTien = $_POST['GiaTien'];
			$id_danhmuc = $_POST['id_danhmuc'];
			$file = $_FILES['img'];
			$newPath="../../assets/img/".$file['name'];
			$anh=move_uploaded_file($file['tmp_name'], $newPath);
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='UPDATE sanpham SET TenSp="'.$TenSp.'",MoTa="'.$MoTa.'",GiaTien="'.$GiaTien.'",id_danhmuc="'.$id_danhmuc.'",img="'.$newPath.'" WHERE id = "'.$id.'"';
				
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