<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Thêm Sản Phẩm</h3>
		<form method="POST" enctype="multipart/form-data">
				<div class="col-md-9 col-12" style="float: left;">
					<div class="form-group">
					<label >Tên sản phẩm:</label>
					<input type="text" class="form-control" name="TenSp" required="">
				</div>

				<div class="form-group">
					<label >Mô tả:</label>
					<input type="text" class="form-control" name="MoTa">
				</div>

				<div class="form-group">
					<label >Giá Tiền:</label>
					<input type="text" class="form-control" name="GiaTien">
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
			$TenSp = $_POST['TenSp'];
			$MoTa = $_POST['MoTa'];
			$GiaTien = $_POST['GiaTien'];
			$id_danhmuc = $_POST['id_danhmuc'];
			$file = $_FILES['img'];
			$newPath="../../assets/img/".$file['name'];
			$anh=move_uploaded_file($file['tmp_name'], $newPath);
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='INSERT INTO sanpham(TenSp,MoTa,GiaTien,id_danhmuc,img) values("'.$TenSp.'","'.$MoTa.'","'.$GiaTien.'","'.$id_danhmuc.'","'.$newPath.'")';
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