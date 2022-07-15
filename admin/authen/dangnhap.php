<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../../assets/img/bg.jpg); background-size: cover; background-repeat: no-repeat;">
    <div class="container" style="width: 600px;height: 500px; background-color: lightblue; margin-top: 100px;padding-top: 50px;border-radius: 20px;">
        <h3 class="text-center" style="margin-top:50px">Đăng Nhập</h3>
        <?php $msg='' ?>
        <h5 style="color: red;" class="text-center"><?php echo $msg;?></h5>
        <form method="POST">
            <div class="form-group">
                <label >Tên Đăng nhập:</label>
                <input type="text" class="form-control" name="email" required="">
            </div>

            <div class="form-group">
                <label >Mật khẩu:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div style="text-align:center;">
                <a href="index.php"><strong>Đăng kí tài khoản</strong></a><br><br>
                <button class="btn btn-success" name="btnGhi">Đăng Nhập</button>
            </div>
            
        </form>
    </div>

    <?php 
        if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
            login();
        }


        function login(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conn = mysqli_connect("localhost","root","","demo");
            if ($conn == true) {
            $query="select * from user where email = '".$email."' and matkhau = '".$password."'";
                $result = mysqli_query($conn,$query);
                // $row = mysqli_fetch_assoc($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['email']==$email && $row['matkhau']==$password && $row['role_id']==1) {
                        header('location: ../layout/header.php');    
                    }
                elseif ($row['email']==$email && $row['matkhau']==$password && $row['role_id']==2) {
                        header('location: ../../');
                    }
                }
                echo $msg='sai tên đăng nhập hoặc mật khẩu';
            }
        }
     ?>
</body>
</html>