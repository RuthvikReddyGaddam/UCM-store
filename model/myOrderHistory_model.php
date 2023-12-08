<?php
  require_once "model/pdo.php";

  function getMyOrderDetails($userID){
    $sql = "SELECT * FROM orders JOIN products ON orders.productID=products.productID WHERE orders.userID=:userID ORDER BY orders.orderDate DESC;";
    $stmt = Database::getDB()->prepare($sql);
    $stmt->execute(
      array(
        ':userID' => $userID
      )
    );
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

?>