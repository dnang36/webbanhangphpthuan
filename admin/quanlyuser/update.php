<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
	<?php 
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","demo");
		if ($conn == true) {
			$query = 'SELECT * FROM user where id = "'.$id.'"';
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)) {
				while ($row= mysqli_fetch_assoc($result)) {
					$HoTen = $row['HoTen'];
					$NgaySinh = $row['NgaySinh'];
					$GioiTinh = $row['GioiTinh'];
					$sdt = $row['sdt'];
					$email = $row['email'];
					$diachi = $row['diachi'];
					$role_id = $row['role_id'];

				}
			}
		}
	 ?>
<div class="col-md-12 table-responsive">
		<h3 class="text-center">sửa tài khoản người dùng</h3>
		<form method="POST">
			<div class="form-group">
				<label >Họ Tên:</label>
				<input type="text" class="form-control" name="HoTen" value="<?php echo isset($_POST['HoTen']) ? $_POST['HoTen'] : $HoTen ?>" required="">
			</div>

			<div class="form-group">
				<label >Ngày Sinh:</label>
				<input type="date" class="form-control" name="NgaySinh" value="<?php echo isset($_POST['NgaySinh']) ? $_POST['NgaySinh'] : $NgaySinh ?>">
			</div>

			<div class="form-group">
				<label >Giới tính:</label>
				<select class="form-control" name="GioiTinh">
					<?php 
						if ($GioiTinh=='Nam') {
							echo "<option value='Nam' selected=''>Nam</option>
							<option value='Nữ'>Nữ</option>";
						}
						elseif ($GioiTinh=='Nữ') {
							echo "<option value='Nam'>Nam</option>
							<option value='Nữ' selected=''>Nữ</option>";
						}
					?>
				</select>
			</div>

			<div class="form-group">
				<label >Số điện thoại:</label>
				<input type="text" class="form-control" name="sdt" required="" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : $sdt ?>">
			</div>

			<div class="form-group">
				<label >Email:</label>
				<input type="email" class="form-control" name="email" required="" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $email ?>">
			</div>

			<div class="form-group">
				<label >Địa chỉ: </label>
				<input type="text" class="form-control"  name="diachi" required="" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : $diachi ?>">
			</div>

			<div class="form-group">
				<label >Quyền:</label>
				<select class="form-control" name="role_id">
					<?php 
						if ($role_id==1) {
							echo "<option value='1' selected=''>Admin</option>
							<option value='2'>User</option>";
						}
						elseif ($role_id==2) {
							echo "<option value='1'>Admin</option>
							<option value='2' selected=''>User</option>";
						}
					?>
				</select>
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
			$HoTen = $_POST['HoTen'];
			$NgaySinh = $_POST['NgaySinh'];
			$GioiTinh = $_POST['GioiTinh'];
			$sdt = $_POST['sdt'];
			$email = $_POST['email'];
			$diachi = $_POST['diachi'];
			$role_id = $_POST['role_id'];
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='UPDATE user SET HoTen="'.$HoTen.'",NgaySinh="'.$NgaySinh.'",GioiTinh="'.$GioiTinh.'",sdt="'.$sdt.'",email="'.$email.'",diachi="'.$diachi.'",role_id="'.$role_id.'" WHERE id = "'.$id.'"';
				
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