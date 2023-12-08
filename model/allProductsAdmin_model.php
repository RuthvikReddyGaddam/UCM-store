<?php
    // require_once "model/pdo.php";

    function getAllProducts(){
      // get all products
      $sql = "SELECT * FROM products";
      $stmt = Database::getDB()->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }


    function deleteProduct($productID){
      $query = "DELETE from products WHERE productID = :productID";  // change table name and key
      $stmt = Database::getDB()->prepare($query);
      $row=$stmt->execute(array(":productID"=>$productID));
      return $row;

    }
?>