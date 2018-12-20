
<?php 
require_once('Layout/Header.php');
require_once('helpers/Customer_GD.php');?>
<?php
// session_start();
// var_dump($_SESSION['cart']);

// if (isset($_SESSION['cart'])) {
// 	$products= $_SESSION['cart'];
// 	;
// }
if (!isset($_SESSION['cart'])) {
require_once('views/cart/Cart_delete.php');

}else{
		$products= $_SESSION['cart'];
		?>
		<div class="cart_pro">
			<table class="table table-hover ">
	<thead>
		<tr>
			<td>Ảnh</td>
			<td>mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Đơn giá</td>
			<td>Thành tiền</td>
	</thead>
	<tbody>
		<?php $sum=0; 
		 foreach ($_SESSION['cart'] as $tb) {
$sum+=$tb['num']*$tb['DonGia'];
		 	?>
		 	<tr>
		 		<td style="width: 15%"><img src="<?=$tb['Anh']?>" alt=""></td>
			<td><?= $tb['MaSP'] ?></td>
			<td><?= $tb['TenSP'] ?></td>
			<td><a href="?mod=cart&act=cart_pro&MaSP=<?= $tb['MaSP'] ?>"><button type="submit" class="btn-info btn">+</button></a><?= $tb['num'] ?><a href="?mod=cart&act=cart_dl&MaSP=<?= $tb['MaSP']?>"><button type="submit" class="btn-info btn">-</button></a></td>
			<td><?= number_format($tb['DonGia'])?></td>
			<td><?=number_format($tb['num']*$tb['DonGia'])?></td>
		</tr>
			<?php } ?>
		<tr>
			<td colspan="4" align="right">Tổng tiền</td>
			<td  align="right" style="color: red;font-size: 20px"><?=number_format($sum)?></td>
			<td><button class="btn-danger btn" style="font-size: 20px" onclick="return confirm('Are you sure?')"><a href="<?php if(isset($_SESSION['isLogin'])||isset($_SESSION['isLoginKH'])) {
				echo "?mod=cart&act=payment";
			}else{ echo "?mod=login&act=form";}?>" style="color: white;">Mua Hàng</a></button></td>
		</tr>
	</tbody>
</table>
		</div>


<?php
}
 require_once('Layout/Footer.php') ?>