<?php 
	require_once('views/layouts/header.php') ;
	//require_once('helpers/Employee_GD.php');
 ?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Bootstrap Core CSS -->
    <link href="views/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="views/public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="views/public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="views/public/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="views/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- DataTables CSS -->
    <link href="views/public/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="views/public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    
	    Latest compiled and minified CSS
	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	
	    Optional theme
	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	
	    Latest compiled and minified JavaScript
	    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="container">
		<center><h2>AUTOMART</h2></center>
		<div id="left" style="float:left;width: 49%;">
		<h3>DANH SÁCH SẢN PHẨM</h3>
		<table class="table-bordered table" id="data">
			<thead class="thead-dark">
				<tr>
					<!-- <td>Ảnh</td> -->
					<td>Mã SP</td>
					<td>Tên SP</td>
					<td>Đơn giá</td>
					<td>#</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $row) {?>
				<tr>
					<!--  -->
					<td><?=$row['MaSP']?></td>
					<td><?=$row['TenSP']?></td>
					<td><?=number_format($row['DonGia'])?></td>
					<td>
						<a href="?mod=sale&act=add2cart&MaSP=<?=$row['MaSP']?>"><button type="submit" class="btn-info btn"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 20px;"></i></button></a>
						
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		<div id="right">
			<h3>Hóa đơn bán hàng</h3>
			<p>Mã KH: <?=$_SESSION['customer']['MaKH'] ?></p>
			<p>Tên KH: <?=$_SESSION['customer']['TenKH'] ?></p>
			<p>Số điện thoại: <?=$_SESSION['customer']['SDT'] ?></p>
			<p>Địa chỉ: <?=$_SESSION['customer']['DiaChi'] ?></p>

			<table class="table table-bordered" id="data" style="width: 49%">
				<thead class="thead-dark">
					<tr>
						<td>Mã SP</td>
						<td>Tên SP</td>
						<td>SL</td>
						<td>Đơn giá</td>
						<td>Thành tiền</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sum=0;
					foreach ($cart as $row) {
						$sum+=$row['SoLuong']*$row['DonGia'];
						?>
						<tr>
							<td><?=$row['MaSP']?></td>
							<td><?=$row['TenSP']?></td>
							<td><a href="?mod=sale&act=add2cart&MaSP=<?=$row['MaSP']?>" title=""><button class="btn-primary btn">+</button> </a><?=$row['SoLuong']?> <a href="?mod=sale&act=remove_product&MaSP=<?=$row['MaSP']?>" title=""><button class="btn-warning btn">-</button></a></td>
							<td><?= number_format($row['DonGia']);?></td>
							<td>
								<?= number_format($row['SoLuong']*$row['DonGia']); ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<div style="margin-left: 560px;">
					<p>Tổng tiền: <?=number_format($sum)?></p>
					<a href="?mod=sale&act=payment" title=""><button class="btn btn-success">Thanh toán</button></a>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
<?php 
	require_once('views/layouts/footer.php') 
 ?>