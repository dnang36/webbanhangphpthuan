<?php 
  require_once('layouts/header.php');
 ?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row">
    <table class="table table-bordered">
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
          <td> <img src="'.str_replace('../../','',$row['img']).'" style="height:200px"></td>
          <td>'.number_format($row['GiaTien'])." VNĐ".'</td>
           <td style="display: flex;">
              <input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;" onchange="">
           </td>
           <td>'.number_format($row['GiaTien'])." VNĐ".'</td>
           <td><button class="btn btn-danger" onclick="">Xoá</button></td>
        <tr>';
      }
    }
  }
?>
    </table>
    <?php 
       echo '<a href="thanhtoan.php?id='.$id.'"><button class="btn btn-danger" style="border-radius: 0px; font-size: 26px;">TIẾP TỤC THANH TOÁN</button></a>';
     ?>
  </div>
</div>
<script type="text/javascript">
  function addMoreCart(id, delta) {
    num = parseInt($('#num_' + id).val())
    num += delta
    $('#num_' + id).val(num)

    updateCart(id, num)
  }

  function fixCartNum(id) {
    $('#num_' + id).val(Math.abs($('#num_' + id).val()))

    updateCart(id, $('#num_' + id).val())
  }

  function updateCart(productId, num) {
    $.post('api/ajax_request.php', {
      'action': 'update_cart',
      'id': productId,
      'num': num
    }, function(data) {
      location.reload()
    })
  }
</script>
<?php 
  require_once('layouts/Footer.php');
 ?> 