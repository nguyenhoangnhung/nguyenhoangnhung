<?php 
	include_once('models/Connection.php');
	class Model{

		var $product_conn;
		var $table_name = '';
		var $primary_key = '';

		public function __construct(){
			$connection = new Connection();
			$this->product_conn = $connection->conn;
		}

		public function All(){
			/*$connection = new Connection();
			$this->product_conn = $connection->conn;*/
			$data = array();


			/*//kết nối cơ sở dữ liệu
			//Thông số kết nối CSDL
			$servername = "localhost";//255.123.45.21-Địa chỉ IP của máy chủ chứ CSDL
			$username = "root";//Tên đăng nhập
			$password = "";//Mật khẩu truy cập
			$dbname = "qlbh";//Tên cơ sở dữ liệu muốn kết nối đến

			//tạo kết nối đến cơ sở dữ liệu
			$conn = new mysqli($servername, $username, $password, $dbname);

			$conn->set_charset("utf8");//set utf8 để đọc dữ liệu tiếng việt

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}*/

			$query = "SELECT * from " . $this->table_name;

			$result = $this->product_conn->query($query);

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;

			}
			return $data;

		}

		public function detail($input){//find
			/*$connection = new Connection();

			$this->product_conn = $connection->conn;*/

			$query = "SELECT * from ".$this->table_name." WHERE ".$this->primary_key." = '".$input."' ";

			$result = $this->product_conn->query($query);

			$product = $result->fetch_assoc();
			return $product;
		}

		public function add($data){//create

			$fields = '';
			$values = '';

			foreach ($data as $key => $value) {
				// echo "<br> Key: " . $key;
				// echo "<br> Values: " . $value;

				$fields = $fields .  $key . ",";

				$values = $values ."'". $value . "' ,";

				// echo "<br> Fields: " . $fields;
				// echo "<br> Values: " . $values;
				// echo "<br>-------------------";
			}

			$fields = trim($fields,',');
			$values = trim($values,',');

			// echo "<br>$fields";
			// echo "<br>$values";

			$query = "INSERT INTO ".$this->table_name." (". $fields .") VALUES (".$values.")";


			// echo "<br>";
			// echo $query;
			// die;


			$result = $this->product_conn->query($query);


			//$product = $result->fetch_assoc();
			return $result;
		}

		public function update($data){

			$input = '';

			foreach ($data as $key => $value) {
				echo "<br> Key: " . $key;
				echo "<br> Values: " . $value;

				$input = $input . $key ."='". $value ."',";

			}

			$input = trim($input,',');

			echo "<br>$input";


			$query = "UPDATE ".$this->table_name." SET ".$input." WHERE ".$this->primary_key." = '".$data[$this->primary_key]."'";

			$result = $this->product_conn->query($query);

			return $result;

		}

		public function delete($input){
			$query = "DELETE from ".$this->table_name." WHERE ".$this->primary_key." = '".$input."' ";

			$result = $this->product_conn->query($query);

			return $result;
		}
	}
 ?>