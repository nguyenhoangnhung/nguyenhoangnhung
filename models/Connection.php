<?php 
	class Connection{

		var $conn;

		public function __construct(){
			//kết nối cơ sở dữ liệu
			//Thông số kết nối CSDL
			$servername = "localhost";//255.123.45.21-Địa chỉ IP của máy chủ chứ CSDL
			$username = "root";//Tên đăng nhập
			$password = "";//Mật khẩu truy cập
			$dbname = "qlbh";//Tên cơ sở dữ liệu muốn kết nối đến

			//tạo kết nối đến cơ sở dữ liệu
			$this->conn = new mysqli($servername, $username, $password, $dbname);

			$this->conn->set_charset("utf8");//set utf8 để đọc dữ liệu tiếng việt

			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}
	}
 ?>