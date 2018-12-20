<?php 
	include_once('models/Customer.php');
	class CustomerController{

		private $customerModel;

		public function __construct(){
			$this->customerModel = new Customer();
		}
		public function list(){
			//$employeeModel = new Employee();
			$data = $this->customerModel->All();
			/*echo "<pre>";
				print_r($data);
			echo "</pre>";*/
			require_once('views/customer/list.php');
		}

		public function add(){
			require_once('views/customer/add.php');
		}

		public function store(){
			$data = $_POST;
			unset($data['submit']);
			$status =$this->customerModel->add($data);

			if ($status == 1) {
				header('Location: ?mod=customer&act=list');
			}/*else{
				header('Location: ?mod=customer&act=add');
			}*/
		}

		public function edit(){
			$MaKH = $_GET['MaKH'];
			$customer = $this->customerModel->detail($MaKH);
			require_once('views/customer/edit.php');
		}

		public function update(){
			$data = $_POST;
			unset($data['submit']);
			//echo "string";

			$status = $this->customerModel->update($data);

			if ($status == 1) {
				header('Location: ?mod=customer&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/	
		}

		public function detail(){
			//$employeeModel = new Employee();
			$MaKH = $_GET['MaKH'];
			$customer = $this->customerModel->detail($MaKH);
			require_once('views/customer/detail.php');
		}

		public function Delete(){
			$MaKH = $_GET['MaKH'];
			$status = $this->customerModel->delete($MaKH);
			if ($status == 1) {
				header('Location: ?mod=customer&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

	}
 ?>