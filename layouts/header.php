<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ - Shop Chơi Đồ</title>
	<link  rel="icon" type="image/x-icon" href="https://u6wdnj9wggobj.vcdn.cloud/media/favicon/stores/1/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style type="text/css">	
		.nav li {
			text-transform: uppercase;
			color: red;
			margin-top: 20px;
		}
		.nav li a {
			color: red;
			font-weight: bold;
		}

		.carousel-inner img {
			height: 500px;
			width: 100%;
		}

		.product-item{
			border: 1px solid #ddd;
			padding: 5px;
		}

		.product-item:hover {
			background-color: #f5f6f7;
			cursor: pointer;
			margin-bottom: 10px;
		}

		footer {
			padding-top: 20px;
		}

		footer ul {
			list-style-type: none;
			padding: 0px;
			margin: 0px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.cart_icon {
			position: fixed;
			z-index: 999999;
			right: 0px;
			top: 45%;
		}

		.cart_icon img {
			width: 50px;
		}

		.cart_icon .cart_count {
			background-color: red;
			color: white;
			font-size: 16px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 10px;
			padding-right: 10px;
			font-weight: bold;
			border-radius: 12px;
			position: fixed;
			right: 40px;
		}

		
	</style>
</head>
<body>
<!-- Menu START -->
<div class="topbar header" style="height: 35px;">
		<ul >
			<li style="line-height: 25px;">
				<p >
				Trường đại học công nghệ giao thông vận tải</p>
			</li>
			<li style="margin-left: 3%;line-height: 25px;margin-left: 3%;color: white;text-decoration: none;">
				<p>Nhóm 10 lớp 70DCTT21</p>
			</li>
			<li style="margin-left: 48%;line-height: 25px;color: white;text-decoration: none;">
				
				<a style="color: white;	" href="./admin/authen/dangnhap.php">Đăng nhập | </a>
				<a style="color: white;	" href="./admin/authen/index.php">Đăng kí</a>
			</li>
		</ul>
	</div>

<div class="s">
	<ul class="nav">
		<li class="nav-item" style="margin-top: 0px !important;">
			<a href="index.php" style="margin-left: 300px;"><img src="https://u6wdnj9wggobj.vcdn.cloud/media/logo/stores/1/logo-254x76.png" style="height: 65px;"></a>
		</li>
		<div class="form-group" style="margin-top:15px;width:700px;">
				<input type="text" class="form-control" name="NgaySinh">
			</div>
	</ul>

</div>

	<div class="bar" style="line-height: 30px;">
	<ul class="nav lon" style="background-color: red; width: 100%;height: 70px;">
	  <li class=" nav-item">
	    <a class="nav-link" style="color:#fff;margin-left:300px ;" href="index.php">Trang Chủ</a>
	  </li>	
	  	<?php 
	  		$conn = mysqli_connect("localhost","root","","demo");
	  		mysqli_set_charset($conn,'utf8');
	  		if ($conn ==true) {
	  			$query = "SELECT * FROM danhmuc";
	  			$result = mysqli_query($conn,$query);
	  			if (mysqli_num_rows($result)) {
	  				while ($row = mysqli_fetch_assoc($result)) {
	  					echo '
	  					<li class="nav-item">
				    <a class="nav-link" style="color:#fff;" href="danhmuc.php?id='.$row['id'].'">'.$row['TenDanhMuc'].'</a>
				  </li>';
	  				}
	  			}
	  		}
	  	 ?>
	  <li class="nav-item">
	    <a class="nav-link" style="color:#fff;" href="lienhe.php">Liên Hệ</a>
	  </li>
	</ul>
</div>