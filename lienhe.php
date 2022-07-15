<?php 
  require_once('layouts/header.php');
 ?>

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <form method="post">
  <div class="row">
    <div class="col-md-6">

     <div class="form-group">
        <input required="true" type="text" class="form-control" name="HoTen" placeholder="Nhập Tên">
      </div>

      <div class="form-group">
        <input required="true" style="height: 200px;" type="text" class="form-control" name="MoTa" placeholder="Nhập nội dung">
      </div>

      <a href="checkout.php"><button name="btnGhi" class="btn btn-danger" style="border-radius: 0px; font-size: 26px; width: 100%;">GỬI PHẢN HỒI</button></a>
    </div>
    <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238166.3307400773!2d105.55142594291479!3d21.138508290051384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1638192110818!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</form>
</div>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnGhi'])) {
            gui();
        }
  function gui(){
    $HoTen = $_POST['HoTen'];
    $MoTa = $_POST['MoTa'];
    $conn = mysqli_connect("localhost","root","","demo");
    if($conn==true)
    {
      $query= 'INSERT INTO phanhoi(HoTen, MoTa) values ("'.$HoTen.'","'.$MoTa.'")';
      $result = mysqli_query($conn, $query); 
      if($result){
        if ($result) {
                    echo "<script type='text/javascript'>
                    alert('Gửi phản hồi thành công');
                    </script>";
      }
    }

  }
}

 ?>


 <?php 
  require_once('layouts/Footer.php');
 ?>