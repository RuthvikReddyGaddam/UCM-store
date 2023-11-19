<?php
if(session_status() == PHP_SESSION_NONE){
    $lifetime = 24*60*60;
    session_set_cookie_params($lifetime);
    session_start();
}

if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
}
require_once('model/pdo.php');
require_once('model/signin_model.php');
require_once('model/signin_model.php');
require_once('model/all_products.php');
require_once('model/product_detail.php');


$action = $_SERVER['QUERY_STRING'];
if (!$action) {
	$action = "login";
} else {
	parse_str($action, $output);
	$action = $output['action'];
}
// $action = "all_products";



switch ($action) {
	case 'login':
		if (($_SESSION['loggedIn'] == false) && isset($_POST["email"]) && isset($_POST["password"])) {
			$email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
			$password = $_POST["password"];
			$isAdmin = (isset($_POST["isAdmin"])) ? true : false;
			
			$isPassMatched = checkLogin($email, $password, $isAdmin, $conn);
			if ($isPassMatched[0]) {
				// create session and route to other page
				$_SESSION["loggedIn"] = true;
				$_SESSION["user_id"] = $isPassMatched[1];
				$_SESSION["admin"] = $isPassMatched[2];
				header("Location: .?action=all_products");
				break;
			} else {
				// invalid credentials flow
				header("Location: .?action=all_products");
			}
			include('view/signin.php');
		}
		else header("Location: .?action=all_products");
		
		break;
	case 'register':
		// header("Location: .?action=show_admin_menu");
		if ($_SESSION['loggedIn'] == false && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["contactNo"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zipCode"])) {
			$result = registerUser($conn);
			
			if(is_array($result)){
				$_SESSION["loggedIn"] = $result[0];
				$_SESSION["user_id"] = $result[1];
				$_SESSION["admin"] = $result[2];
				header("Location: .?action=all_products");
			} 
			else {
				$_SESSION['error'] = $result;
				header("Location: .?action=register");
			}
		}
		include('view/signup.php');
		break;

	case "all_products":

		if (isset($_GET['product_id'])) {
			$product_id = $output['product_id'];
			if (isset($_POST["product_quantity"])) {
				
				$result = addToCart($conn,$_POST["product_quantity"]);
				$product = productDetails($conn,$product_id);
				$_SESSION["result"] = $result;
			}
			
			$product = productDetails($conn,$product_id);
			// $productDetail = array("productName" => "Tumbler", "description" => "A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'", "price" => "35.00", "productId" => "1321");
			include('view/productDetail.php');
			break;
		}
		
		$products = getAllProducts($conn);
		include('view/allProducts.php');
		break;
	case "my_cart":
		if($_SESSION['loggedIn'] == true){
			include('view/myCart.php');
		}
		else header("Location: .?action=login");
		
		break;
	case "user_profile":
		include('view/profile.php');
		break;
	case "user_orders":
		include('view/myOrderHistory.php');
		break;

	case "logout":

		session_destroy();
		include('view/signin.php');
		break;
	default: {
			include('view/404.php');
			break;
		}
}
?>