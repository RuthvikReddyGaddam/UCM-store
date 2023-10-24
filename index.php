<?php

$action = $_SERVER['QUERY_STRING'];
if(!$action){
    $action = "login";
}else{
    parse_str($action, $output);
    $action = $output['action'];
}


// Perform the specified action
switch($action) {
    case 'login':
				// header("Location: .?action=show_admin_menu");
				include('view/signin.php');
				break;
    case 'register':
        // header("Location: .?action=show_admin_menu");
        include('view/signup.php');
        break;
    default:{
        break;
    }
}
?>