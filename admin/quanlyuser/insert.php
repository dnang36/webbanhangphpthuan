<?php 
	require_once('../layout/header.php');
 ?>

<div class="row" >
<div class="col-md-12 table-responsive">
		<h3 class="text-center">Thêm tài khoản người dùng</h3>
		<form method="POST" onsubmit="return validate();" >
			<div class="form-group">
				<label >Họ Tên:</label>
				<input type="text" class="form-control" name="HoTen" required="">
			</div>

			<div class="form-group">
				<label >Ngày Sinh:</label>
				<input type="date" class="form-control" name="NgaySinh">
			</div>

			<div class="form-group">
				<label >Giới tính:</label>
				<select class="form-control" name="GioiTinh">
					<option value="Nam" selected="">Nam</option>
					<option value="Nữ">Nữ</option>
				</select>
			</div>

			<div class="form-group">
				<label >Số điện thoại:</label>
				<input type="text" class="form-control" name="sdt" required="">
			</div>

			<div class="form-group">
				<label >Email:</label>
				<input type="email" class="form-control" name="email" required="">
			</div>

			<div class="form-group">
				<label >Mật khẩu:</label>
				<input type="password" class="form-control" name="matkhau" required="" id="password">
			</div>

			<div class="form-group">
				<label >Xác thực mật khẩu: </label>
				<input type="password" class="form-control" id="cpassword">
			</div>

			<div class="form-group">
				<label >Địa chỉ: </label>
				<input type="text" class="form-control"  name="diachi" required="">
			</div>

			<div class="form-group">
				<label >Quyền:</label>
				<select class="form-control" name="role_id">
					<option value="1" selected="">Admin</option>
					<option value="2">User</option>
				</select>
			</div>
			<a href="index.php">Quay lại</a> <br>
			<button class="btn btn-success" name="btnGhi">Đăng Ký</button>
		</form>
	</div>
	<?php 
		if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
			insert();
		}

		function insert(){
			$HoTen = $_POST['HoTen'];
			$NgaySinh = $_POST['NgaySinh'];
			$GioiTinh = $_POST['GioiTinh'];
			$sdt = $_POST['sdt'];
			$email = $_POST['email'];
			$matkhau = $_POST['matkhau'];
			$diachi = $_POST['diachi'];
			$role_id = $_POST['role_id'];
			$conn = mysqli_connect("localhost","root","","demo");
			if ($conn == true) {
				$query ='INSERT INTO user(HoTen,NgaySinh,GioiTinh,sdt,email,matkhau,diachi,role_id) 
				values("'.$HoTen.'","'.$NgaySinh.'","'.$GioiTinh.'","'.$sdt.'","'.$email.'","'.$matkhau.'","'.$diachi.'","'.$role_id.'")';
				
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

<script type="text/javascript">
	function validate() {
		$password = $('#password').val();
		$check = $('#cpassword').val();
		if ($password != $check) {
			alert("Mật khẩu không khớp vui lòng nhập lại");
			return false;
		}
		return true;
	}

</script>
 <?php 
 	require_once('../layout/footer.php');
  ?>