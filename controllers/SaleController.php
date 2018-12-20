<?php 
session_start();
	include_once('models/Bill.php');
	include_once('models/BillDetail.php');
	include_once('models/Product.php');
	include_once('models/Customer.php');
	include_once('models/Employee.php');

	class SaleController{

		public function index(){
			$maHD = $_GET['MaHD'];

			$billModel = new Bill();

			$bill = $billModel->detail($maHD);
			// var_dump($bill['MaKH']);
			// die;
			$billDetailModel = new BillDetail();
			$billDetails = $billDetailModel->detail($maHD);

			$customerModel = new Customer();
			$customer = $customerModel->detail($bill['MaKH']);

			$products = array();
			foreach ($billDetails as $billDetail) {
				$productModel = new Product();
				$product = $productModel->detail($billDetail['MaSP']);
				$product['SoLuong'] = $billDetail['SoLuong'];
				$products[] = $product;
			}

			// $bills = $billModel->ListBillByEmpl('');

			// echo "<pre>";

			// var_dump($data);
			// echo "</pre>";
			// die;

			require_once('views/sale/bill.php');
		}

		public function create_bill(){
			$productModel = new Customer();
			$customers = $productModel->All();

			require_once('views/sale/customer.php');
		}

		public function purchase(){
			if (isset($_GET['MaKH'])) {
				$MaKH = $_GET['MaKH'];
				// var_dump($MaKH);
				// die;
				$customerModel = new Customer();
				$customer = $customerModel->detail($MaKH);
				$_SESSION['customer'] = $customer;
				// var_dump($_SESSION['customer'] );
				// die;
				header('Location: ?mod=sale&act=sale');
			// }else{
			// 	header('Location: ?mod=customer&act=list');
			// }
}
		}

		public function sale(){
				// var_dump($_SESSION['customer'] );
				// die;
			if (isset($_SESSION['customer'])) {
				$customer = $_SESSION['customer'];
 				
				$productModel = new Product();
				$products = $productModel->All();

				$cart = array();
				if (isset($_SESSION['cart'])) {
					$cart = $_SESSION['cart'];
				}

				require_once('views/sale/sale.php');
			}else{
				header('Location: ?mod=customer&act=list');
			}
		}

		public function add2cart(){
			$maSP = $_GET['MaSP'];
			if (isset($_SESSION['cart'][$maSP])) {
				$_SESSION['cart'][$maSP]['SoLuong'] = $_SESSION['cart'][$maSP]['SoLuong'] + 1;
			}else{
				$productModel = new Product();
				$product = $productModel->detail($maSP);
				$product['SoLuong'] = 1;
				$_SESSION['cart'][$maSP] = $product;
			}

			header('Location: ?mod=sale&act=sale');
		}

		public function remove_product(){
			$maSP = $_GET['MaSP'];
			if ($_SESSION['cart'][$maSP]['SoLuong'] == 1) {
				unset($_SESSION['cart'][$maSP]);
			}else{
				$_SESSION['cart'][$maSP]['SoLuong'] = $_SESSION['cart'][$maSP]['SoLuong'] - 1;
			}

			header('Location: ?mod=sale&act=sale');
		}

		public function payment(){

			$productModel = new Product();

			$maNV = 'NV01';
			$customer = $_SESSION['customer'];
			$cart = $_SESSION['cart'];

			$hoadon = array();
			$hoadon['MaHD'] = $customer['MaKH'].'_'.$maNV.'_'.time();
			$hoadon['MaKH'] = $customer['MaKH'];
			$hoadon['MaNV'] = $maNV;
			$hoadon['NgayBan'] = date('Y-m-d H:i:s');


			//them hoa don
			$bill = new Bill();

			$status = $bill->add($hoadon);
		
			//them chi tiet hoa don va cap nhat so luong san pham con trong kho
			$tong_tien = 0;
			foreach ($cart as $product) {
				$prod['MaHD'] = $hoadon['MaHD'];
				$prod['MaSP'] = $product['MaSP'];
				$prod['SoLuong'] = $product['SoLuong'];
				$prod['DonGia'] = $product['DonGia'];
				$prod['ThanhTien'] = $product['DonGia']*$product['SoLuong'];
				$tong_tien += $prod['ThanhTien'];

				$billDetail = new BillDetail();

				$billDetail->add($prod);

				$productModel->reduceQuant($prod['MaSP'],$prod['SoLuong']);
			}

			//update tong tien cua hoa don
			$upbill['MaHD'] = $hoadon['MaHD'];
			$upbill['TongTien'] = $tong_tien;
			$bill->update($upbill);

			//huy SESSION customer va cart
			unset($_SESSION['cart']);
			unset($_SESSION['customer']);

			header('Location: ?mod=sale&act=bill_detail&MaHD='.$hoadon['MaHD']); 
		}

		public function bill_detail(){
			$maHD = $_GET['MaHD'];
			$bill = new Bill();

			$hoadon = $bill->detail($maHD);

			$customerModel = new Customer();
			$customer = $customerModel->detail($hoadon['MaKH']);
			$billModel = new BillDetail();
			$billDetail = $billModel->detail($hoadon['MaHD']);

			$employeeModel = new Employee();
			$employee = $employeeModel->detail($hoadon['MaNV']);
			$products = array();
			$productModel = new Product();

			foreach ($billDetail as $key => $bill) {
				$product = $productModel->detail($bill['MaSP']);
				$products[] = $product;
			}

			$_SESSION['hd'] = $billDetail;
			
			require_once('views/sale/bill_detail.php');
		}



	}
 ?>