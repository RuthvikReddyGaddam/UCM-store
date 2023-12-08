<?php
    // require_once "model/pdo.php";

    function addProduct($productName,$productDescription,$productPrice,$imageName){
      // return false;
      $sql = "INSERT INTO products (productName, productDescription, productPrice, productImage) 
                VALUES(:productName, :productDescription, :productPrice, :productImage)";
      $stmt = Database::getDB()->prepare($sql);
      try{
        $stmt->execute(
          array(
            ':productName' => $productName,
            ':productDescription' => $productDescription,
            ':productPrice' => $productPrice,
            ':productImage' => $imageName
          )
        );
        return true; // if data insertion is sucessfull else return false
      }
      catch(PDOException $e){
          print_r($e);
          return false;
      }
    }

?>