<?php 
	require_once('views/layouts/header.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Product</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <title>QUẢN LÝ</title> -->

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
    <!-- <link href="public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> -->

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
		<form action="?mod=product&act=update" method="POST" role="form">
			<legend>UPDATE PRODUCT</legend>
		
			<div class="form-group">
				<label for="">Mã SP</label>
				<input type="text" readonly class="form-control" id="" placeholder="" name="MaSP" value="<?= $product['MaSP']?>">
			</div>

			<div class="form-group">
				<label for="">Tên SP</label>
				<input type="text" class="form-control" id="" placeholder="" name="TenSP" value="<?= $product['TenSP']?>">
			</div>

			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="text" class="form-control" id="" placeholder="" name="SoLuong" value="<?= $product['SoLuong']?>">
			</div>

			<div class="form-group">
				<label for="">Đơn giá</label>
				<input type="text" class="form-control" id="" placeholder="" name="DonGia" value="<?= $product['DonGia']?>">
			</div>
			<button type="submit" class="btn btn-primary" name="update">Update</button>
		</form>
	</div>
</body>
</html>

<?php 
	require_once('views/layouts/footer.php');
 ?>