<?php
  require_once "model/pdo.php";

  function getCartDetails($userID){
    $sql = "SELECT * FROM cart JOIN products ON cart.productID=products.productID WHERE cart.userID=:userID;";
    $stmt = Database::getDB()->prepare($sql);
    $stmt->execute(
      array(
        ':userID' => $userID
      )
    );
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  function removeFromCart($cartID){
    $query = "DELETE from cart WHERE cartID = :cartID";  // change table name and key
    $stmt = Database::getDB()->prepare($query);
    $row=$stmt->execute(array(":cartID"=>$cartID));
    return $row;
  }
?>