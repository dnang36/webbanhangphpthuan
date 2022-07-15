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
<body>
    <form runat="server" id="form1">
        <header id="day">
        <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/cms/toy-fair/Banner-02.jpg" style="width: 100%; height: 800px;">
            </div>
            <div class="carousel-item">
              <img src="https://u6wdnj9wggobj.vcdn.cloud/media/catalog/category/CAT_PAGE_MKD_1025_X_355_H_NG_D_N_MUA_H_NG.jpg"  style="width: 100%; height: 800px;">
            </div>
            <div class="carousel-item">
              <img src="https://cf.shopee.vn/file/b1ec7b51bdb6830dcae6e76167504f71" style="width:100%;height: 800px;">
            </div>
          </div>

  <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>

        </div>
        </header>

        <section class="main">
          <div class="container">
              <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
              <div class="row">
              <?php
                  $conn = mysqli_connect("localhost","root","","demo");
                  if ($conn ==true) {
                    $query = "SELECT sanpham.*, danhmuc.TenDanhMuc as name FROM sanpham left join danhmuc on sanpham.id_danhmuc=danhmuc.id order by sanpham.id DESC LIMIT 8";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result)) {
                      while ($row=mysqli_fetch_assoc($result)) {
                          echo '<div class="col-md-3 col-6 product-item">
                          <a href="chitietsp.php?id='.$row['id'].'">
                            <img src="'.str_replace('../../','',$row['img']).'" style="height:200px;width:250px">
                            </a>
                         <p style="color:blue">'.$row['name'].'</p>
                          <a href="chitietsp.php?id='.$row['id'].'">
                            <p>'.$row['TenSp'].'</p>
                            </a>
                          <p style="color:red;">'.number_format($row['GiaTien'])." VNĐ".'</p>
                            <form method="POST" action="giohang2.php?action=add">
                              <input type="text" name="soluong['.$row['id'].']" class="form-control" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;">
                              <button class="btn btn-danger" id="btn1" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 20px;">THÊM VÀO GIỎ HÀNG</button>
                            </form>
                      </div>';
                      }
                    }
                  }
              ?>
              </div>
          </div>
        </section>

        
 <?php 
	require_once('layouts/Footer.php');
 ?> 