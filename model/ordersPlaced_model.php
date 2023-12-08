<?php
    require_once "model/pdo.php";

    function getAllPlacedOrders(){
      $sql="SELECT products.productImage,products.productName,orders.productQuantity,products.productPrice,users.email,orders.orderDate,orders.orderID,orders.orderStatus FROM orders JOIN products JOIN users ON orders.productID=products.productID AND orders.userID=users.userID ORDER BY orders.orderDate DESC;";
      // $ordersList = array("productImage"=>"tumbler.png","productName"=>"Tumbler","quantity"=>5,"unitPrice"=>11,"orderedBy"=>"customerEmail@ucmstore.com","dateOrdered"=>"2022-11-02");
      $stmt = Database::getDB()->prepare($sql);
      $stmt->execute();
      $ordersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // print_r($ordersList);
      return $ordersList;
    }

    function updateOrderStatus($orderID,$orderStatus){
      $sql = "UPDATE orders SET orderStatus=:orderStatus WHERE orderID=:orderID";
      $stmt = Database::getDB()->prepare($sql);
      try{
        $stmt->execute(
          array(
            ':orderStatus' => $orderStatus,
            ':orderID' => $orderID
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