<?php 
  require_once('layouts/header.php');
 ?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <form method="POST">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input required="true" type="text" class="form-control" id="usr" name="HoTen" placeholder="Nhập họ * tên">
      </div>
      <div class="form-group">
        <input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
      </div>
      <div class="form-group">
        <input required="true" type="tel" class="form-control" id="phone" name="sdt" placeholder="Nhập sđt">
      </div>
      <div class="form-group">
        <input required="true" type="text" class="form-control" id="address" name="DiaChi" placeholder="Nhập địa chỉ">
      </div>
      <div class="form-group">
        <input required="true" type="text" class="form-control" id="address" name="MoTa" placeholder="Nhập nội dung" style="height: 200px">
      </div>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
      <tr>
        <th>STT</th>
        <th>Tiêu Đề</th>
        <th>Giá</th>
        <th>Số Lượng</th>
        <th>Tổng Giá</th>
      </tr>
<?php
   $conn = mysqli_connect("localhost","root","","demo");
  $id = $_GET['id'];
  if ($conn ==true) {
    $query= "SELECT * FROM sanpham WHERE id = '".$id."' ";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['TenSp'].'</td>
          <td>'.number_format($row['GiaTien'])." VNĐ".'</td>
           <td style="display: flex;">
              <input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;" onchange="">
           </td>
           <td>'.number_format($row['GiaTien'])." VNĐ".'</td>

        <tr>';
      }
    }
  }
?>
    </table>
    <a href="thanhcong.php">
     <button name="btnGhi" class="btn btn-danger" style="border-radius: 0px; font-size: 26px; width: 100%;">THANH TOÁN</button>
   </a>
    </div>
  </div>
</form>

<?php  
    if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
      mua();
    }

    function mua(){
        $HoTen = $_POST['HoTen'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $DiaChi = $_POST['DiaChi'];
        $MoTa = $_POST['MoTa'];
        $conn = mysqli_connect("localhost","root","","demo");
        if ($conn == true) {

          $query = "INSERT INTO donhang(HoTen,email,sdt,DiaChi,MoTa)
          VALUES('".$HoTen."','".$email."','".$sdt."','".$DiaChi."','".$MoTa."')";
          $result = mysqli_query($conn,$query);
          if ($result) {
            echo "<script type='text/javascript'>";
            echo "window.location.href='thanhcong.php';";
            echo"</script>";
          }
        }
    }
 ?>

</div>

<?php 
  require_once('layouts/Footer.php');
 ?> 