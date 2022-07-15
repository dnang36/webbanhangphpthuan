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
          }
          else{
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
    <form method="POST" action="giohang2.php?action=submit">
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row">
      <table class="table table-bordered" >
      <tr>
        <th>STT</th>
        <th>Tên sản Phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số Lượng</th>
        <th>Thành tiền</th>
        <th></th>
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
        <td><img style="height:100px;" src="<?=str_replace('../../','',$row['img']);?>"></td>
        <td><?=number_format($row['GiaTien']) .'VNĐ';?></td>
        <td><input type="text" value="<?=$_SESSION['giohang'][$row['id']]?>" name="soluong[<?=$row['id']?>]" style="width: 40px; height: 40px;"></td>
        <td><?=number_format($row['GiaTien']*$_SESSION['giohang'][$row['id']]).'VNĐ'?></td>

        <td><a href="giohang2.php?action=delete&id=<?=$row['id']?>">Xóa</a></td>
      </tr>
    <?php 
      $tongtien += $row['GiaTien']*$_SESSION['giohang'][$row['id']];
    $num++;
      }?>
         <tr style="background-color:#ecf0f1;">
          <td>&nbsp</td>
          <th>Tổng tiền</th>
          <td>&nbsp</td>
          <td>&nbsp</td>
           <td>&nbsp</td>
            <td><?=number_format($tongtien). 'VNĐ'?></td>
          <td></td>
        </tr>
      <?php
  
    }?>   
    </table>
    <a href="thanhtoan2.php"><button class="btn btn-danger" name="order_click" style="font-size: 20px;">TIẾN HÀNH THANH TOÁN</button></a>
  
       <input type="submit"  name="update_click" value="cập nhật giỏ hàng" style="font-size: 20px;height: 44px;" class="btn btn-primary">   
  </div>
    <a href="index.php">Tiếp tục mua hàng</a>
</div> </form>

<?php 
  require_once('layouts/Footer.php');
 ?> 