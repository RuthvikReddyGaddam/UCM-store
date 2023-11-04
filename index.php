<?php
require_once ('model/signin_model.php');
require_once ('model/signup_model.php');

$action = $_SERVER['QUERY_STRING'];
if(!$action){
    $action = "login";
		}else{
			parse_str($action, $output);
			$action = $output['action'];
}
// $action = "all_products";



switch($action) {
    case 'login':
				if(isset($_POST["email"]) && isset($_POST["password"])){
					$email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
					$password = $_POST["password"];
					$isAdmin = false;
					if(isset($_POST["isAdmin"])){
						$isAdmin=true;
					}
					$isPassMatched = checkLogin($email,$password,$isAdmin);
            if($isPassMatched){
								// create session and route to other page
                break;
            }else{
								// invalid credentials flow
						}
				}
				include('view/signin.php');
				break;
    case 'register':
        // header("Location: .?action=show_admin_menu");
				if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["contactNo"]) && isset($_POST["address"]) &&  isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zipCode"])){
					$email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
					$password = $_POST["password"];
					$firstName = trim(filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING));
					$lastName = trim(filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING));
					$contactNo = trim(filter_input(INPUT_POST, "contactNo", FILTER_SANITIZE_STRING));
					$address = trim(filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING));
					$city = trim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING));
					$state = trim(filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING));
					$zipCode = trim(filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_STRING));
					registerUser($email,$password,$firstName,$lastName,$contactNo,$address,$city,$state,$zipCode);
				}
        include('view/signup.php');
        break;
    case "all_products":
			
			if (isset($_GET['product_id']) ) {
				$product_id = $output['product_id'];
				if(isset($_POST["product_quantity"])){
					echo $_POST('product_quantity');
				}
				$productDetail = array("productName" => "Tumbler","description"=>"A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'","price"=>"35.00","productId"=>"1321" );
				include('view/productDetail.php');
				break;
			}
        include('view/allProducts.php');
        break;
    default:{
			include('view/404.php');
        break;
    }
}
?>