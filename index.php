<?php

if (session_status() == PHP_SESSION_NONE) {
	$lifetime = 24 * 60 * 60;
	session_set_cookie_params($lifetime);
	session_start();
}

require_once ('model/signin_model.php');
require_once ('model/signup_model.php');
require_once ('model/allProductsAdmin_model.php');
require_once ('model/addProduct_model.php');
require_once ('model/updateProduct_model.php');
require_once ('model/ordersPlaced_model.php');
require_once ('model/allProduct_model.php');
require_once ('model/myCart_model.php');
require_once ('model/orderedSuccessfully_model.php');
require_once ('model/myOrderHistory_model.php');
require_once ('model/profile_model.php');


$action = $_SERVER['QUERY_STRING'];
if(!$action){
    $action = "all_products";
		}else{
			parse_str($action, $output);
			$action = $output['action'];
}
// $action = "ordered_successfully";



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
								$userDetails = getUserDetails($email);
								$_SESSION["loggedIn"] = true;
								$_SESSION["userID"] = $userDetails['userID'];
								$_SESSION["isAdmin"] = $userDetails['isAdmin'];
								if($userDetails['isAdmin'] == 'yes'){
									header("Location: .?action=admin_all_products");
								}else{
									header("Location: .?action=all_products");
								}
                break;
            }else{
								// invalid credentials flow
								$message = "Invalid Credentials. Please try again!!";
								$_SESSION['message'] = $message;
								header("Location: index.php?action=login");
								break;
						}
				}
				else{
					include('view/signin.php');
					break;
				}
				


    case 'register':
        // header("Location: .?action=show_admin_menu");
				$email = $password = $firstName = $lastName = $contactNo = $address = $city = $state = $zipCode = '';
				if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["contactNo"]) && isset($_POST["address"]) &&  isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zipCode"])){
					$email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
					$password = $_POST["password"];
					$firstName = trim(htmlentities(filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING)));
					$lastName = trim(htmlentities(filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING)));
					$contactNo = trim(htmlentities(filter_input(INPUT_POST, "contactNo", FILTER_SANITIZE_STRING)));
					$address = trim(htmlentities(filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING)));
					$city = trim(htmlentities(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
					$state = trim(htmlentities(filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING)));
					$zipCode = trim(htmlentities(filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_STRING)));
					$message = registerUser($email,$password,$firstName,$lastName,$contactNo,$address,$city,$state,$zipCode);
					$_SESSION['message'] = $message;
				}
        include('view/signup.php');
        break;


    case "all_products":
			if (isset($_GET['product_id']) ) {
				if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
					header("Location: index.php?action=login");
					break;
				}
				$product_id = $output['product_id'];
				$productDetail = getProductByID($product_id);
				if(isset($_POST["product_quantity"])){
					// echo $_POST('product_quantity');
					$quantity = filter_input(INPUT_POST, "product_quantity", FILTER_VALIDATE_INT);
					if($quantity && $quantity>0){
						if(addProductToCart($quantity,$_SESSION["userID"],$product_id)){
							$_SESSION['cart_message'] = "Product Added. Please Go to cart!";
						}else{
							$_SESSION['cart_message'] = "Failed to add to cart.Please try again!";
						}
					}else{
						$_SESSION['cart_message'] = "Please enter number more than 0";
					}
					header("Location: index.php?action=all_products&&product_id=".$product_id);
					break;
				}
				// $productDetail = array("productName" => "Tumbler","description"=>"A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'","price"=>"35.00","productId"=>"1321" );
				else{
					include('view/productDetail.php');
					break;
				}
				
			}
			$allProducts = getAllProducts();
			include('view/allProducts.php');
			break;


    case "my_cart":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if(isset($_POST['removeFromCart'])){
				$cart_id = $_POST['removeFromCart'];
				removeFromCart($cart_id);
			}
			$myCartProducts = getCartDetails($_SESSION["userID"]);
			// $myCartProducts = getCartDetails(666);
			include('view/myCart.php');
			// echo "The count of array is--------".count($myCartProducts);
			break;


		case "user_profile":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			$userDetails = getUserDetailsFromID($_SESSION["userID"]);
			$email = $password = $firstName = $lastName = $contactNo = $address = $city = $state = $zipCode = '';
			if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["contactNo"]) && isset($_POST["address"]) &&  isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zipCode"])){
				$email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
				$password = $_POST["password"];
				$firstName = trim(htmlentities(filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING)));
				$lastName = trim(htmlentities(filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING)));
				$contactNo = trim(htmlentities(filter_input(INPUT_POST, "contactNo", FILTER_SANITIZE_STRING)));
				$address = trim(htmlentities(filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING)));
				$city = trim(htmlentities(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
				$state = trim(htmlentities(filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING)));
				$zipCode = trim(htmlentities(filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_STRING)));
				$message = updateUser($email,$password,$firstName,$lastName,$contactNo,$address,$city,$state,$zipCode,$_SESSION["userID"]);
				$_SESSION['profile_message'] = $message;
				header("Location: index.php?action=user_profile");
				break;
			}
			// $userDetails = getUserDetailsFromID($_SESSION["userID"]);
			include('view/profile.php');
			break;


		case "user_orders":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			$myOrders = getMyOrderDetails($_SESSION["userID"]);
			// $myOrders = getMyOrderDetails(666);
			include('view/myOrderHistory.php');
			break;
			
			
		case "admin_all_products":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if(isset($_POST['deleteProduct'])){
				$product_id = $_POST['deleteProduct'];
				$productDetail = getProductByID($product_id);
				if(deleteProduct($product_id)){
					$deleteDirectory = 'images/'.$productDetail['productImage'];  //get old image for deletion
					unlink($deleteDirectory);  // delete old image from repo
				}
			}
			$allProducts = getAllProducts();
			include('view/allProductsAdmin.php');
			break;
				
				
		case "admin_add_product":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if(isset($_POST['productName']) && isset($_POST['productDescription']) && is_numeric($_POST['price']) && isset($_POST['price']) && isset($_FILES['productImage']['name'])){
				$productName = trim(filter_input(INPUT_POST, "productName", FILTER_SANITIZE_STRING));
			$productDescription = trim(filter_input(INPUT_POST, "productDescription", FILTER_SANITIZE_STRING));
			$price = $_POST['price'];
			$imageName = time().'_'.$_FILES['productImage']['name'];
			$targetDir = 'images/'.$imageName;
			if(addProduct($productName,$productDescription,$price,$imageName)){
				move_uploaded_file($_FILES['productImage']['tmp_name'],$targetDir);  //copy locally uploaded file to UCM-store/images folder
				header("Location: .?action=admin_all_products");   // redirect if product is sucessfully inserted to Db
				break;
			}else{
				$_SESSION['message'] = "Error Adding Product ! Please Try Again !";
			}
		}
		include('view/addProduct.php');
		break;
		
		
		case "admin_update_product":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if (isset($_GET['product_id']) ) {
				$product_id = $output['product_id'];
				$productDetail = getProductByID($product_id);
				// $productDetail = array("productName" => "Tumbler","description"=>"A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'","price"=>"35.00","productId"=>"1321","productImage"=>"1700536486_Hostedwebsite.png" );
				if(isset($_POST['productName']) && isset($_POST['productDescription']) && is_numeric($_POST['price']) && isset($_POST['price'])){
					$productName = trim(filter_input(INPUT_POST, "productName", FILTER_SANITIZE_STRING));
					$productDescription = trim(filter_input(INPUT_POST, "productDescription", FILTER_SANITIZE_STRING));
					$price = $_POST['price'];
					$imageName = '';
					if(isset($_FILES['productImage']['name']) && $_FILES['productImage']['size']>0){
						$imageName = time().'_'.$_FILES['productImage']['name'];
					} else {
						$imageName = $productDetail['productImage'];
					}
					if(updateProduct($productName,$productDescription,$price,$imageName,$product_id)){  //trigger update method from model
						if(isset($_FILES['productImage']['name']) && $_FILES['productImage']['size']>0){
							$deleteDirectory = 'images/'.$productDetail['productImage'];  //get old image for deletion
							$targetDir = 'images/'.$imageName;
							unlink($deleteDirectory);  // delete old image from repo
							move_uploaded_file($_FILES['productImage']['tmp_name'],$targetDir);  //copy locally uploaded file to UCM-store/images folder
						}else{
							$_SESSION['message'] = "Error Updating Product ! Please Try Again !";
						}
						header("Location: .?action=admin_all_products");   // redirect if product is sucessfully inserted to Db
					}
				}
				include('view/updateProduct.php');
				break;
			}
			
			
		case "admin_all_orders":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if(isset($_POST['order_status']) && isset($_POST['orderID'])){
				if(updateOrderStatus($_POST['orderID'],$_POST['order_status'])){
					header("Location: index.php?action=admin_all_orders");
				}
			}
			$ordersList = getAllPlacedOrders();
			include('view/ordersPlaced.php');
			break;
		
		
		case "payment":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			if(isset($_POST['cardNumber']) && isset($_POST['cardHolder']) && isset($_POST['cvv']) && isset($_POST['valid_thru']) ){
				$creditCardNumber = $_POST['cardNumber'];
				$cvv = $_POST['cvv'];
				if(strlen($creditCardNumber) != 16 && !is_numeric($creditCardNumber)){
					$_SESSION['message'] = "Enter Valid 16 digit card Number !";
				}
				if(strlen($cvv) != 3 && !is_numeric($cvv)){
					$_SESSION['message'] = "Enter Valid CVV/CVC/Security Code!";
				}
				header("Location: .?action=ordered_successfully");
			}
			include('view/payment.php');
		break;
		

		case "ordered_successfully":
			if(!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userID"])){
				header("Location: index.php?action=login");
				break;
			}
			$userDetails = getUserDetailsFromID($_SESSION["userID"]);
			placeOrder($_SESSION["userID"]);
			include('view/orderedSuccessfully.php');
			break;

		case "logout":
			session_destroy();
			header("Location: index.php?action=login");

		default:{
			include('view/404.php');
        break;
    }
}
if($action != "user_profile"){
	unset($_SESSION['profile_message']);
}

if($action != "all_products" || !isset($_GET['product_id'])){
	unset($_SESSION['cart_message']);
}

?>