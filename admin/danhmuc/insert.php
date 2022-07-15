<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Thêm tài Danh mục</h3>
		<form method="POST" onsubmit="return validate();" >
			<div class="form-group">
				<label >Tên danh mục: </label>
				<input type="text" class="form-control" name="TenDanhMuc" required="">
			</div>
			<a href="index.php">Quay lại</a> <br>
			<button class="btn btn-success" name="btnGhi">Thêm</button>
		</form>
	</div>
	<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
			insert();
		}

		function insert(){
			$TenDanhMuc = $_POST['TenDanhMuc'];
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='INSERT INTO danhmuc(TenDanhMuc) 
				values("'.$TenDanhMuc.'")';
				
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

 <?php 
 	require_once('../layout/footer.php');
  ?>