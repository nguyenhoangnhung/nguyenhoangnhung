<?php 
	require_once('views/layouts/header.php');
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
		<h3 align="center">PRODUCTS LIST</h3>
		<a href="?mod=product&act=add" class="btn btn-success">Add</a>
		<p><?php if(isset($_COOKIE['msg'])) echo $_COOKIE['msg']; ?></p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">Mã SP</th>
					<th style="text-align: center;">Tên SP</th>
					<th style="text-align: center;">Đơn giá</th>
					<th style="text-align: center;">Hành động</th>
				</tr>

			</thead>
			<tbody>
			<?php foreach ($data as $row) { ?>
				<tr>
					<td align="center"><?php echo $row['MaSP']; ?></td>
					<td><?php echo $row['TenSP']; ?></td>
					<td align="right"><?php echo number_format($row['DonGia']); ?> VND</td>
					<td align="center">
						<a href="index.php?mod=product&act=detail&MaSP=<?php echo $row['MaSP']; ?>" title="" class="btn btn-success">Xem chi tiết</a>
						<a href="index.php?mod=product&act=edit&MaSP=<?php echo $row['MaSP']; ?>" title="" class="btn btn-primary">Sửa</a>
						<a href="index.php?mod=product&act=delete&MaSP=<?php echo $row['MaSP']; ?>"  onclick="return confirm('Are you sure?')" title="" class="btn btn-danger">Xóa</a>
					</td>
				</tr>

			<?php } ?>
			</tbody>
			


		</table>
	</div>
</body>
</html>

<?php 
	require_once('views/layouts/footer.php');
 ?>