<?php 
	require_once('views/layouts/header.php');
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
		<div class="col-md-6">
			<h3>AUTOMART</h3>
			<p>Add: Ba Đình, Hà Nội</p>
			<p>Mobile: 0917677899</p>
		</div>
		<div class="col-md-6">
			<h3>HÓA ĐƠN BÁN HÀNG</h3>
			<p>Mã hóa đơn:<?=$maHD?></p>
		</div>

		<div class="col-md-12">
			<p>Khách hàng: <?=$customer['MaKH']?> </p>
			<p>Địa chỉ: <?=$customer['DiaChi']?></p>
		</div>
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Mã SP</td>
						<td>Tên SP</td>
						<td>SL</td>
						<td>Đơn Giá</td>
						<td>Thành tiền</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($billDetail as $key => $row)	{
						?>
						<tr>
							<td><?= $row['MaSP'] ?></td>
							<td><?php $maSP=$row['MaSP']; $pro=$productModel->detail($maSP);
							echo $pro['TenSP'];
							?></td>
							<td><?= $row['SoLuong'] ?></td>
							<td><?= number_format($row['DonGia']) ?></td>
							<td><?= number_format($row['DonGia']*$row['SoLuong']) ?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>

				

				<div>
					<a href="?mod=sale&act=index&MaHD=<?=$maHD?>" title=""><button class="btn btn-seccess">Print</button></a>
				</div>
			</div>
		</div>
	</div>
</body>
	

</html>
<?php 
	require_once('views/layouts/footer.php');
 ?>