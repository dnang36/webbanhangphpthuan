<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang quản trị</title>
	<link  rel="icon" type="image/x-icon" href="https://u6wdnj9wggobj.vcdn.cloud/media/favicon/stores/1/favicon.ico" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		.nav{
			
			height: 46px;
			background-color: red;
			margin: 0 auto;
		}
		.main{
			
			margin: 0 auto;
		}
		.left{
			float: left;
			width: 20%;
		}
		.title{
			height: 40px;
			background: red;
			line-height: 40px;
			text-align: center;
			color: white;
		}
		.title p{
			font-size: 13px;
			font-weight: bold;
		}
		.title p a{
			color: white;
		}
		.card{
			height: 100px;
			text-align: center;
			line-height: 100px;
			border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);
			border: 1px solid rgba(0, 0, 0, 0.2);
		}
		.card a{
			text-decoration: none;
			color: black;
			font-size: 20px;
			font-weight: bold;
		}
		.card:hover{
			border: 2px solid red;
			transition: ease-in 0.15s;
		}
		.card:hover a{
			color: red;
			transition: ease-in 0.15s;
		}
		.right{
			float: right;
			width: 79%;
		}
		.dx {
			float: right;
			line-height: 46px;
			list-style: none;
			color: white;
			display: inline-block;
		}
		.dx:hover{
			color: white;
		}
	</style>
</head>
<body>
	<div class="nav">
		<a href="../../index.php"><img src="https://u6wdnj9wggobj.vcdn.cloud/media/logo/stores/1/logo-254x76.png" style="height: 46px;"></a>
		<a class="dx" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" href="../authen/dangnhap.php">Đăng xuất</a>
	</div>
	<div class="main">
			<div class="left">
				<div class="title">
					<p>Danh mục</p>
				</div>
				<div class="card">
					<a href="../quanlyuser/index.php">Quản lý tài khoản người dùng</a>
				</div>
				<div class="card">
					<a href="../danhmuc/index.php">Quản lý danh mục sản phẩm</a>
				</div>
				<div class="card">
					<a href="../sanpham/index.php">Quản lý sản phẩm</a>
				</div>
				<div class="card">
					<a href="../nhacc/index.php">Quản lý nhà cung cấp</a>
				</div>
				<div class="card">
					<a href="../phanhoi/index.php">Quản lý phản hồi</a>
				</div>
				<div class="card">
					<a href="../donhang/index.php">Quản lý đơn hàng</a>
				</div>

			</div>
			<div class="right"></div>
