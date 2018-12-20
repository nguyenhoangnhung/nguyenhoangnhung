<?php 
require_once('layouts/header.php');
require_once('helpers/Customer_GD.php');
?>
<div style="background:	#F5F5F5;padding-top: 15%">
<?php foreach ($data as $row) {?>
<div class="boxed" style="">
	<div>
		<a href="?mod=cart&act=detail&MaSP=<?=$row['MaSP']?>" title=""><img src="<?=$row['Anh']?>" alt=""></a>
	</div>	
	<div class="overlay" align="center">
		<div >
			<?php echo $row['TenSP']; ?>
		<br>
		<?php echo $row['DonGia'].'vnđ'; ?>
		<i class="fa fa-truck" aria-hidden="true" style="color:	#20B2AA"></i>
		<br>
		<a href="?mod=cart&act=detail&MaSP=<?=$row['MaSP']?>" title=""><button class="btn btn-default">Detail</button> </a>
		</div>
		
	</div>
	<div align="center">
		<?php echo $row['TenSP']; ?>
		<br>
		<?php echo $row['DonGia'].'vnđ'; ?>
		<i class="fa fa-truck" aria-hidden="true" style="color:	#20B2AA"></i>
		<br>
		<a href="?mod=cart&act=detail&MaSP=<?=$row['MaSP']?>" title=""><button class="btn btn-default">Detail</button> </a>
	</div>
</div>
<?php } ?>	
</div>
<?php require_once('layouts/footer.php') ?>