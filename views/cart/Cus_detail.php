<?php 
require_once('Layout/Header.php');
require_once('helpers/Customer_GD.php');

?>
<div class="Cus_detail">
	<h3 align="center">Customer Detail</h3>
	<table class="table-bordered table">
		<?php 
		$customerModel= new Customer();

		$employeeModel=new Employee();
		if(isset($_SESSION['isLogin'])){
			$employee=$employeeModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']);?>
			<thead>
				<tr>
					<td>Mã KH</td>
					<td>Tên khách hàng</td>
					<td>Số Điện thoại</td>
					<td>Email</td>
					<td>Mật khẩu</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$employee['MaNV']?></td>
					<td><?=$employee['TenNV']?></td>
					<td><?=$employee['SDT']?></td>
					<td><?=$employee['Email']?></td>
					<td><?=$employee['MatKhau']?></td>
				</tr>
				<?php  }?>


				<?php if (isset($_SESSION['isLoginKH'])) {
					$customer=$customerModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']); ?>
					<thead>
						<tr>
							<td>Mã KH</td>
							<td>Tên khách hàng</td>
							<td>Số Điện thoại</td>
							<td>Địa chỉ</td>
							<td>Email</td>
							<td>Mật khẩu</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$customer['MaKH']?></td>
							<td><?=$customer['TenKH']?></td>
							<td><?=$customer['SDT']?></td>
							<td><?=$customer['DiaChi']?></td>
							<td><?=$customer['Email']?></td>
							<td><?=$customer['MatKhau']?></td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
			<?php require_once('Layout/Footer.php') ?>