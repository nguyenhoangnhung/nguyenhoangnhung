
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="views/public/vendor/bootstrap/css/bootstrap.min.css">

	<style type="text/css" media="screen">
		.container{
			width: 21cm;
			overflow: hidden;
			min-height: 297mm;
			padding: 2.5cm;
			margin-left: auto;
			margin-right: auto;
			background: white;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
		*{
			box-sizing: border-box;
			5-moz-box-sizing: border-box;
		}
	</style>
</head>

<body onload="window.print();">
	<div class="container">
		
		<div class="col-md-6">
			<h3>AUTOMART</h3>
			<p>Add: Ba Đình, Hà Nội</p>
			<p>Mobile: 0917677899</p>
		</div>
		<div class="col-md-6">
			<h3>HÓA ĐƠN BÁN HÀNG</h3>
			<p>Mã hóa đơn:<?=$bill['MaHD']?></p>
		</div>

		<div class="col-md-12">
			<p>Khách hàng: <?=$bill['MaKH']?> </p>
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
					<?php foreach ($products as $key => $row)	{
						
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
				</div>
			</div>
		</body>

		</html>
