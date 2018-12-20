<?php 
require_once('Layout/Header.php');
require_once('helpers/Customer_GD.php');
?>
<div class="detail_pro">
	<h3 align="center">Product Detail</h3>
	<div>
		<div style="width: 25%;float: left">
			<div class="cart_detail_pro">
				<div class="mySlides">
					<div class="numbertext">1 / 4</div>
					<img src="<?=$product['Anh']?>">
				</div>

				<div class="mySlides">
					<div class="numbertext">2 / 4</div>
					<img src="<?=$product['Anh2']?>" >
				</div>

				<div class="mySlides">
					<div class="numbertext">3 / 4</div>
					<img src="<?=$product['Anh3']?>">
				</div>
				
				<div class="mySlides">
					<div class="numbertext">4 / 4</div>
					<img src="<?=$product['Anh4']?>" >
				</div>


				
				<a class="prev" onclick="plusSlides(-1)">❮</a>
				<a class="next" onclick="plusSlides(1)">❯</a>

				
				<div class="rows">
					<div class="column">
						<img class="demos cursor" src="<?=$product['Anh']?>"  onclick="currentSlide(1)" alt="The Woods">
					</div>
					<div class="column">
						<img class="demos cursor" src="<?=$product['Anh2']?>"  onclick="currentSlide(2)" alt="Cinque Terre">
					</div>
					<div class="column">
						<img class="demos cursor" src="<?=$product['Anh3']?>"  onclick="currentSlide(3)" alt="Mountains and fjords">
					</div>
					<div class="column">
						<img class="demos cursor" src="<?=$product['Anh4']?>" onclick="currentSlide(4)" alt="Northern Lights">
					</div>
				</div>
			</div>

			<hr>
			<div>
				<i class="fa fa-heart-o" aria-hidden="true" style="color: red"></i> Thích: 30 <span style="padding-left: 20px"></span> Chia sẻ tới<i class="fa fa-facebook-square" aria-hidden="true" style="color: blue; font-size: 25px; padding-left: 10px"></i> <i class="fa fa-google-plus-official" aria-hidden="true" style="color: red; font-size: 25px"></i> <i class="fa fa-twitter-square" aria-hidden="true" style="color: blue; font-size: 25px"></i>
			</div>
		</div>
		<div style="width: 70%;float: right">
			<div>
				<h4>[RẺ VÔ ĐỊCH] Chi tiết sản phẩm </h4>
				<div>
					<img src="" alt="">
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Mã sản phẩm</td>
							<td>Tên sản phẩm</td>
							<td>Số lượng</td>
							<td>Đơn giá</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$product['MaSP']?></td>
							<td><?=$product['TenSP']?></td>
							<td><?=$product['SoLuong']?></td>
							<td><?=number_format($product['DonGia'])?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div>
				<i class="fa fa-truck" aria-hidden="true" style="color: blue"></i> Miễn phí vận chuyển đối với đơn hàng có mức giá trị tối thiểu.
			</div>
			<hr>
			<div class="cart_btn">
				<button class="btn btn-info"><a href="#" title=""><i class="fa fa-commenting-o" aria-hidden="true"></i>Chat now</a></button>
				<button class="btn btn-info" onclick="myFunction()"><a href="?mod=cart&act=cart_pro&MaSP=<?=$product['MaSP']?>" title=""><i class="fa fa-cart-plus" aria-hidden="true"></i>Thêm vào giỏ hàng</a></button>
				<button class="btn btn-info"><a href="#" title="">Mua ngay</a></button>
			</div>
		</div>
	</div>
</div>


<?php require_once('Layout/Footer.php') ?>
