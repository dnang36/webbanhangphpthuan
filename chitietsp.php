<?php 
  require_once('layouts/header.php');
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vương Quốc Đồ Chơi MyKingdom</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</head>
<body style="margin-top: 20px;margin-bottom: 20px;">
        <section class="main">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <?php 
                  $conn = mysqli_connect("localhost","root","","demo");
                  if ($conn ==true) {
                  $id = $_GET['id'];
                  $query = "SELECT sanpham.*, danhmuc.TenDanhMuc as name
                  FROM sanpham left join danhmuc on sanpham.id_danhmuc=danhmuc.id 
                  WHERE sanpham.id = $id";
                  $result = mysqli_query($conn,$query);
                  if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<img src="'.str_replace('../../','',$row['img']).'" style="width: 100%;">
                        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 30px;">
                            <h3>Chi Tiết Sản Phẩm</h3>'.$row['MoTa'].'</div>';
                    }
                  }
                }
               ?>
              </div>
              <div class="col-md-6">
                <?php 
                  $conn = mysqli_connect("localhost","root","","demo");
                  if ($conn ==true) {
                  $query = "SELECT sanpham.*, danhmuc.TenDanhMuc as name
                  FROM sanpham left join danhmuc on sanpham.id_danhmuc=danhmuc.id 
                  WHERE sanpham.id = '".$_GET['id']."'";
                  $result = mysqli_query($conn,$query);
                  if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<ul class="breadcrumb">
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li>
                              <a href="danhmuc.php?id='.$row['id_danhmuc'].'">'."/ ".$row['name']."/ ".'</a>
                            </li>
                            <li>'.$row['TenSp'].'</li>
                          </ul>
                          <h2>'.$row['TenSp'].'</h2>';

                        echo'<p style="font-size: 30px; color: red; margin-top: 15px; margin-bottom: 15px;">
                            '.number_format($row['GiaTien'])." VNĐ".'
                          </p>
                          <form method="POST" action="giohang2.php?action=add">
                            <input type="text" name="soluong['.$row['id'].']" class="form-control" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;">
                            <button class="btn btn-danger"  style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px;">THÊM VÀO GIỎ HÀNG</button>
                            <button class="btn btn-danger"  style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px;">
                              Mua Ngay</button>                         
                             </form>';
                    }
                  }
                }

                 ?>    
              </div>
            </div>
          </div>  

          <div class="container">
             <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM LIÊN QUAN</h1>
              <div class="row">
              <?php
                  $conn = mysqli_connect("localhost","root","","demo");
                  if (!$conn ==true) {
                   }
                    $query = "SELECT sanpham.*, danhmuc.TenDanhMuc as name 
                    FROM sanpham left join danhmuc on sanpham.id_danhmuc=danhmuc.id 
                    WHERE sanpham.id  = '".$_GET['id']."'
                    order by sanpham.id DESC LIMIT 4";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result)) {
                      while ($row=mysqli_fetch_assoc($result)) {
                          echo '<div class="col-md-3 col-6 product-item">
                          <a href="chitietsp.php?id='.$row['id'].'">
                          <img src="'.str_replace('../../','',$row['img']).'" style="width: 100%;height:250px"></a>
                         <p style="color:blue">'.$row['name'].'</p>
                         <a href="chitietsp.php?id='.$row['id'].'">
                          <p>'.$row['TenSp'].'</p></a>
                          <p style="color:red;">'.number_format($row['GiaTien'])." VNĐ".'</p>
                           <form method="POST" action="giohang2.php?action=add">
                            <input type="text" name="soluong['.$row['id'].']" class="form-control" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;">
                            <button class="btn btn-danger" id="btn1" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 20px;">THÊM VÀO GIỎ HÀNG</button>
                             </form>
                      </div>';
                      }
                    }
                  
              ?>
              </div>
          </div>
        </section>

 <?php 
  require_once('layouts/Footer.php');
 ?> 
