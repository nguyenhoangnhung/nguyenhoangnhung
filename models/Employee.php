<?php 
	include_once('models/Model.php');
	class Employee extends Model{

		private $employee_conn;

		var $table_name = 'nhanvien';
		var $primary_key = 'MaNV';
		
	}
 ?>