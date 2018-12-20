<?php 
	include_once('models/Model.php');
	include_once('models/connection.php');
	class BillDetail extends Model{
		var $table_name='chitiethoadon';
		var $primery_key='MaHD';
		var $product_conn;

		// public function __construct(){
		// 	$connection = new Conection();
		// 	$this->product_conn = $connection->conn;

		// }
		

		public function detail($input){
			$connection = new Connection();

			$this->product_conn = $connection->conn;

			$query = "SELECT * from chitiethoadon WHERE MaHD = '".$input."' ";
			
			$result = $this->product_conn->query($query);
			
			$data = array();
			while ($row=$result->fetch_assoc()){
				$data[]= $row;
			}

			return $data;
			// $bills = $result->fetch_assoc();
			// return $bills;
		}
	}

?>