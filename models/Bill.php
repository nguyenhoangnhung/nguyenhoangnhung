<?php 
	require_once('models/Model.php');
	class Bill extends Model{
		var $table_name = "hoadon";
		var $primary_key = "MaHD";
		var $bill_conn;

		public function __construct(){
			parent::__construct();
			$connection = new Connection();
			$this->bill_conn = $connection->conn;
		}
		public function detail($input){//find
			/*$connection = new Connection();

			$this->product_conn = $connection->conn;*/

			$query = "SELECT * from ".$this->table_name." WHERE ".$this->primary_key." = '".$input."' ";

			$result = $this->bill_conn->query($query);

			$data = $result->fetch_assoc();
			return $data;
		}


		public function ListBillByEmpl($Empl){
			if ($Empl == '') {
				$where = '';
			}else{
				$where = " WHERE hd.MaNV ='".$Empl."'";
			}

			

			$data = array();

			$query = "SELECT hd.*, kh.TenKH, nv.TenNV, kh.TenKH,kh.MaKH FROM hoadon hd join khachhang kh ON  hd.MaKH = kh.MaKH JOIN nhanvien nv ON nv.MaNV = hd.MaNV ".$where;

			$result = $this->bill_conn->query($query);

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}




			return $data;
		}
	}
 ?>