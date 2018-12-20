<?php 
include_once('models/Bill.php');
include_once('models/BillDetail.php');
include_once('models/Cart.php');
include_once('models/Product.php');
include_once('models/Customer.php');
include_once('models/Employee.php');
class CartController
{
	private $cartModel;
	function __construct()
	{
		$this->cartModel = new Cart();
	}
	public function list(){
		$data=$this->cartModel->All();
		require_once('views/cart/Cart_GD.php');
	}
	public function detail(){
			//$productModel = new Product();
		$MaSP = $_GET['MaSP'];
		$product = $this->cartModel->detail($MaSP);
		require_once('views/cart/Cart_proDetail.php');
	}
	public function cart_pro(){
		// session_start();
		$MaSP = $_GET['MaSP'];
		$product = $this->cartModel->detail($MaSP);
		
	// echo "<pre>";
	// print_r($_SESSION['cart'][$MaSP]);
	// echo "</pre>";
	// die;
		if (isset($_SESSION['cart'][$MaSP])) {
			$_SESSION['cart'][$MaSP]['num']++;
		}else{
			$_SESSION['cart'][$MaSP]=$product;
			
			$_SESSION['cart'][$MaSP]['num']=1;
		}
		header('Location:?mod=cart&act=detail&MaSP='.$MaSP);	
	}
	public function cart_dl(){
		if (isset($_GET['MaSP'])) {
			$MaSP= $_GET['MaSP'];
			// echo $_SESSION['cart'][$MaSP]['num'];
			// die;
			if ($_SESSION['cart'][$MaSP]['num']>1) {
				$_SESSION['cart'][$MaSP]['num']--;
			}else {
				unset($_SESSION['cart'][$MaSP]);
			}
			header('Location:?mod=cart&act=cart_product');		
		}
	}
	public function payment(){
		$productModel= new Product();
		$maNV= 'NV01';
		// $customer=$_SESSION['customer'];
		$cart=$_SESSION['cart'];	
		$customerModel= new Customer();
		$employeeModel=new Employee();
		if(isset($_SESSION['isLogin'])){
			$employee=$employeeModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']);
			$maKH= $employee['MaNV'];
		}
		if (isset($_SESSION['isLoginKH'])) {
			$customer=$customerModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']);
			$maKH= $customer['MaKH'];
		}
		$hoadon=array();
		$hoadon['MaHD']=$maKH.'_'.$maNV.'_'.time();
		$hoadon['MaKH']=$maKH;
		$hoadon['MaNV']=$maNV;
		$hoadon['NgayBan']=date('Y-m-d H:i:s');

		// $hoadon['TongTien']=$sum;
		$bill= new Bill();
		$bill->add($hoadon);

		$tong_tien=0;
		foreach ($cart as $product) {
			$prod['MaHD']= $hoadon['MaHD'];
			$prod['MaSP']=$product['MaSP'];
			$prod['SoLuong']=$product['num'];
			$prod['DonGia']=$product['DonGia'];
			$prod['Thanhtien']=$product['DonGia']*$product['num'];
			$tong_tien+=$prod['Thanhtien'];
			$billDetail= new BillDetail();
			$billDetail->add($prod);
			$productModel->reduceQuant($prod['MaSP'],$prod['SoLuong']);
			// include_once('email.php');
		}
	//update tong tien hoa don
		$ubill['MaHD']= $hoadon['MaHD'];
		$ubill['TongTien']=$tong_tien;

		$bill->update($ubill);
		unset($_SESSION['cart']);
		unset($_SESSION['customer']);
		header('Location:?mod=cart&act=cart_delete');
	}
	public function cart_delete(){
		// unset($_SESSION['cart']);
		require_once('views/cart/Cart_delete.php');
	}
	public function cart_list(){
		require_once('views/cart/cart_pro.php');
	}
	public function cus_detail(){
		require_once('views/cart/Cus_detail.php');
	}
	public function findAnh(){
		$productModel= new Product();
		$anh= $_GET['Anh'];
		$product=$productModel->findAnh($anh);
		$maSP= $product['MaSP'];
		header('Location:?mod=cart&act=detail&MaSP='.$maSP);
	}
	public function list_bill(){
		$billDetail= new Bill();
		$customerModel= new Customer();

		$employeeModel=new Employee();
		// if(isset($_SESSION['isLogin'])){
		// 	$employee=$employeeModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']);
		// 	$maKH= $employee['MaNV'];
		// }
		// if (isset($_SESSION['isLoginKH'])) {
		// 	$customer=$customerModel->find($_SESSION['info']['Email'],$_SESSION['info']['MatKhau']);
		// 	$maKH= $customer['MaKH'];
		// }
		// $bills= $billDetail->ListBillByEmpl($maKH);
		// $billss= $billDtail
		require_once('views/cart/List_bill.php');
	}
	
}
?>