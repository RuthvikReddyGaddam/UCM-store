<?php
  require_once "model/pdo.php";
  require_once "model/myCart_model.php";

  function placeOrder($userID){
    $cartProducts = getCartDetails($userID);
    foreach($cartProducts as $row){
      moveFromCart($userID,$row['productID'],$row['productQuantity'],date("Y-m-d"));
      removeFromCart($row['cartID']);
    }
  }

  function moveFromCart($userID,$productID,$productQuantity,$orderDate){
    $sql = "INSERT INTO orders (userID, productID, productQuantity, orderDate) 
            VALUES(:userID,:productID,:productQuantity,:orderDate)";
    $stmt = Database::getDB()->prepare($sql);
    try{
      $stmt->execute(
        array(
          ':userID' => $userID,
          ':productID' => $productID,
          ':productQuantity' => $productQuantity,
          ':orderDate' => $orderDate
        )
      );
      return true;
    }
    catch(PDOException $e){
        print_r($e);
        return false;
    }
  }

?>