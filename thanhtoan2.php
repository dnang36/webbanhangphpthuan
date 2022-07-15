<?php 
  session_start();
  require_once('layouts/header.php');
  $conn = mysqli_connect("localhost","root","","demo");
  if (!$conn) {
    echo "FAIL";
  }
  if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang']=array();
  }
  if (isset($_GET['action'])) {
    function update_cart($add = false){
         foreach ($_POST['soluong'] as $id => $soluong) {
          if ($soluong==0) {
            unset($_SESSION['giohang'][$id]);
          }else{
            if ($add) {
              $_SESSION['giohang'][$id] +=$soluong;
            }
            else{
              $_SESSION['giohang'][$id] =$soluong;
            }
          }
            
          }
      }
    switch ($_GET['action']) {
      
      case 'add': 
         update_cart();
          header('location: giohang2.php');
        break;
      case 'delete':
        if (isset($_GET['id'])) {
          unset($_SESSION['giohang'][$_GET['id']]);

        }
        
        break;
      case 'submit':
        if (isset($_POST['update_click'])) { // cập nhật giỏ hàng
          update_cart();
          header('location: giohang2.php');
        }
        elseif (isset($_POST['order_click'])) { // đi đến trang thanh toán
          header('location: thanhtoan2.php');
        }
        break;
      default:
        // code...
        break;
    }
  }

  if (!empty($_SESSION['giohang'])) {
    $sanpham =
     mysqli_query($conn,"SELECT * FROM sanpham where id in (".implode(",",array_keys($_SESSION['giohang'])).")");
  }
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
        <th>Đơn Giá</th>
        <th>Số Lượng</th>
        <th>Thành tiền</th>
      </tr>
        <?php 
        if (!empty($sanpham)) {
          $num = 1;
           $tongtien=0;
              while ($row=mysqli_fetch_assoc($sanpham)) 
              {?>
              <tr>
                <td><?=$num++;?></td>
                <td><?=$row['TenSp'];?></td>
                <td><?=number_format($row['GiaTien']) .'VNĐ';?></td>
                <td><input type="text" value="<?=$_SESSION['giohang'][$row['id']]?>" name="soluong[<?=$row['id']?>]" style="width: 40px; height: 40px;"></td>
               <td><?=number_format($row['GiaTien']*$_SESSION['giohang'][$row['id']]).'VNĐ'?></td>
                <td><a href="thanhtoan2.php?action=delete&id=<?=$row['id']?>">Xóa</a></td>
              </tr>
            <?php 
            $num++;
          $tongtien += $row['GiaTien']*$_SESSION['giohang'][$row['id']];
        }?>
         <tr style="background-color:#ecf0f1;">
          <td>&nbsp</td>
          <th>Tổng tiền</th>
          <td>&nbsp</td>
          <td>&nbsp</td>
            <td><?=number_format($tongtien). 'VNĐ'?></td>
          <td></td>
        </tr>
      <?php
     
    }?>
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
            unset($_SESSION['giohang']);
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