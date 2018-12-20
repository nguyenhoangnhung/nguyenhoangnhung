<?php 
	include_once('models/Model.php');
	class Product extends Model{

		//private $product_conn;

		var $table_name = 'sanpham';
		var $primary_key = 'MaSP';
		

		public function getQuant($maSP){
			$connection = new Connection();
			$this->product_conn = $connection->conn;

			$query = "SELECT  SoLuong FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$maSP."' ";
			$result = $this->product_conn->query($query);

			$sl=$result->fetch_assoc();
			return $sl['SoLuong'];

		}

		public function reduceQuant($maSP, $soLuong){
			$connection = new Connection();
			$this->product_conn = $connection->conn;

			$soLuongCon = $this->getQuant($maSP) - $soLuong;

			$query= "UPDATE ".$this->table_name." SET SoLuong = ".$soLuongCon." WHERE ".$this->primary_key." = '".$maSP."' ";

			$result = $this->product_conn->query($query);

			return $result;
		}

		
	}
 ?>