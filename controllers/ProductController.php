<?php 
	include_once('models/Product.php');
	class ProductController{

		private $productModel;

		public function __construct(){
			$this->productModel = new Product();
		}
		public function list(){
			// $productModel = new Product();
			$data = $this->productModel->All();
			/*echo "<pre>";
				print_r($data);
			echo "</pre>";*/
			require_once('views/product/list.php');
		}

		public function add(){
			require_once('views/product/add.php');
			
		}

		public function store(){
			$data = $_POST;
			unset($data['submit']);

			$status = $this->productModel->add($data);

			if ($status == 1) {
				header('Location: ?mod=product&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

		public function edit(){
			//$productModel = new Product();
			$MaSP = $_GET['MaSP'];
			$product = $this->productModel->detail($MaSP);
			require_once('views/product/edit.php');
		}

		public function update(){
			$data = $_POST;
			unset($data['update']);

			$status = $this->productModel->update($data);

			if ($status == 1) {
				header('Location: ?mod=product&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

		public function detail(){
			//$productModel = new Product();
			$MaSP = $_GET['MaSP'];
			$product = $this->productModel->detail($MaSP);
			require_once('views/product/detail.php');
		}

		public function Delete(){
			$MaSP = $_GET['MaSP'];
			$status = $this->productModel->delete($MaSP);
			if ($status == 1) {
				header('Location: ?mod=product&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

	}
 ?>