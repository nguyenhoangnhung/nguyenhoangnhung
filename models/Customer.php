<?php 
	include_once('models/Model.php');
	class Customer extends Model{
 
		private $customer_conn;

		var $table_name = 'khachhang';
		var $primary_key = 'MaKH';
	}
 ?>