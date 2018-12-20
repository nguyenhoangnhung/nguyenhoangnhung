<?php 
	//include_once('helpers/Middleware.php');
	/*$middleware = new Middleware();
	*///session_start();
	include_once("helpers/Middleware.php");
	$mod = 'home';
	$act = '';
	if (isset($_GET['mod'])) {
	$mod=$_GET['mod'];
}
if (isset($_GET['act'])) {
	$act=$_GET['act'];
}

	switch ($mod) {
		//chọn chức năng quản lý sản phẩm
		case 'home':{
			require_once('views/home.php');
		}
		case 'product':{
			//$middleware->isLogin();
			include_once('controllers/ProductController.php');
			$productController = new ProductController();
			switch ($act) {
				//chức năng hiển thị danh sách sản phẩm
				case 'list':
					$productController->list();
					break;

				case 'detail':
					$productController->detail();
					break;

				case 'add':
					$productController->add();
					break;

				case 'store':
					$productController->store();
					break;

				case 'edit':
					$productController->edit();
					break;

				case 'update':
					$productController->update();
					break;

				case 'delete':
					$productController->delete();
					break;

				case '':
					# code...
					break;
				
				default:
					echo "Không tồn tại phương thức";
					break;
			}
			break;
		}
		case 'customer':{
			//$middleware->isLogin();
			include_once('controllers/CustomerController.php');
			$customerController = new CustomerController();
			switch ($act) {
				//chức năng hiển thị danh sách sản phẩm
				case 'list':
					$customerController->list();
					break;

				case 'detail':
					$customerController->detail();
					break;

				case 'add':
					$customerController->add();
					break;

				case 'store':
					$customerController->store();
					break;

				case 'edit':
					$customerController->edit();
					break;

				case 'update':
					$customerController->update();
					break;

				case 'delete':
					$customerController->delete();
					break;
				
				default:
					echo "Không tồn tại phương thức";
					break;
			}
			break;
		}

		case 'employee':{
			//$middleware->isLogin();
			include_once('controllers/EmployeeController.php');
			$employeeController = new EmployeeController();
			switch ($act) {
				//chức năng hiển thị danh sách sản phẩm
				case 'list':
					$employeeController->list();
					break;

				case 'detail':
					$employeeController->detail();
					break;

				case 'add':
					$employeeController->add();
					break;

				case 'store':
					$employeeController->store();
					break;

				case 'edit':
					$employeeController->edit();
					break;

				case 'update':
					$employeeController->update();
					break;

				case 'delete':
					$employeeController->delete();
					break;
				
				default:
					echo "Không tồn tại phương thức";
					break;
			}
			break;
		}

		case 'sale':{
			//$middleware->isLogin();
			include_once('controllers/SaleController.php');
			$SaleController= new SaleController();
				switch ($act) {
					case 'sale':{
						$SaleController->sale();
						break;
					}
					case 'customer':{
						$SaleController->create_bill();
						break;
					}
					case 'purchase':{
						$SaleController->purchase();
						break;
					}
					case 'add2cart':{
						$SaleController->add2cart();
						break;
					}
					case 'remove_product':{
						$SaleController->remove_product();
						break;
					}
					case 'payment':{
						$SaleController->payment();
						break;
					}
					case 'bill_detail':{
						$SaleController->bill_detail();
						break;
					}
					case 'index':{
						$SaleController->index();
					}
					default:{
						echo "Not found!";
						break;
					}

				
				}
				break;
		}

		case 'cart':{
		include_once('controllers/CartController.php');
		$cartController= new CartController();
		switch ($act) {
			case 'cart_product':{
				$cartController->list();
				break;
			}
			case 'detail':{
				$cartController->detail();
				break;
			}
			case 'cart_list':{
				$cartController->cart_list();
				break;
			}
			case 'cus_detail':{
				$cartController->cus_detail();
				break;
			}
			case 'cart_pro':{
				$cartController->cart_pro();
				break;
			}
			case 'cart_dl':{
				$cartController->cart_dl();
				break;
			}
			case 'cart_delete':{
				$cartController->cart_delete();
				break;
			}
			case 'payment':{
				$cartController->payment();
				break;
			}
			case 'list_bill':{
				$cartController->list_bill();
				break;
			}
			case 'findAnh':{
				$cartController->findAnh();
				break;
			}
			default:{
				echo "Không tồn tại phương thức.";
				break;
			}
		}
		break;
	}

		/*case 'login':{
			include_once('controllers/LoginController.php');
			$loginController = new LoginController();

			switch ($act) {
				case 'form':{
					$loginController->formLogin();
					break;
				}
				case 'postLogin':{
					$loginController->Login();
					break;
				}
				case 'logout':{
					$loginController->Logout();
					break;
				}
				
				default:
					echo "abcxyz";
					break;
			}
			break;

		}*/
		default:
			echo "Không tồn tại";
			break;
	}
 ?>