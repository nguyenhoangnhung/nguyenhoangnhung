<?php 
	include_once('models/Employee.php');
	class EmployeeController{

		private $employeeModel;

		public function __construct(){
			$this->employeeModel = new Employee();
		}
		public function list(){
			//$employeeModel = new Employee();
			$data = $this->employeeModel->All();
			/*echo "<pre>";
				print_r($data);
			echo "</pre>";*/
			require_once('views/employee/list.php');
		}

		public function add(){
			require_once('views/employee/add.php');
		}

		public function store(){
			$data = $_POST;
			unset($data['submit']);

			$status =$this->employeeModel->add($data);

			if ($status == 1) {
				header('Location: ?mod=employee&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

		public function edit(){
			$MaNV = $_GET['MaNV'];
			$employee = $this->employeeModel->detail($MaNV);
			require_once('views/employee/edit.php');
		}

		public function update(){
			$data = $_POST;
			unset($data['submit']);

			$status = $this->employeeModel->update($data);

			if ($status == 1) {
				header('Location: ?mod=employee&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

		public function detail(){
			//$employeeModel = new Employee();
			$MaNV = $_GET['MaNV'];
			$employee = $this->employeeModel->detail($MaNV);
			require_once('views/employee/detail.php');
		}

		public function Delete(){
			$MaNV = $_GET['MaNV'];
			$status = $this->employeeModel->delete($MaNV);
			if ($status == 1) {
				header('Location: ?mod=employee&act=list');
			}/*else{
				header('Location: ?mod=product&act=add');
			}*/
		}

	}
 ?>