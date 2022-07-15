<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản người dùng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../../assets/img/bg.jpg); background-size: cover; background-repeat: no-repeat;">
    <div class="container" style="width: 600px; background-color: lightblue; margin-top: 100px;padding-top: 50px;border-radius: 20px;padding-bottom: 50px;">
        <h3 class="text-center">Đăng kí tài khoản</h3>
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
            <div style="text-align:center">
                <a href="dangnhap.php">Tôi đã có tài khoản</a> <br><br>
                <button class="btn btn-success" name="btnGhi">Đăng Ký</button>
            </div>
            
        </form>
    </div>
    <?php  
        if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
            Success();
        }

        
        function Success(){
            $HoTen = $_POST['HoTen'];
            $NgaySinh = $_POST['NgaySinh'];
            $GioiTinh = $_POST['GioiTinh'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            $diachi = $_POST['diachi'];
            $conn = mysqli_connect("localhost","root","","demo");
            if ($conn ==true) {
                $query ='INSERT INTO user(HoTen,NgaySinh,GioiTinh,sdt,email,matkhau,diachi,role_id) 
                values("'.$HoTen.'","'.$NgaySinh.'","'.$GioiTinh.'","'.$sdt.'","'.$email.'","'.$matkhau.'","'.$diachi.'","2")';
                
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
</body>
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
</html>