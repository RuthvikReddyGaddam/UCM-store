<?php
    require_once "model/pdo.php";

    function updateProduct($productName,$productDescription,$price,$imageName,$productID){
      // echo $productName.' '.$productDescription.' '.$price.' '.$imageName;
      $sql = "UPDATE products SET productName=:productName, productDescription=:productDescription, productPrice=:productPrice, productImage=:productImage
                WHERE productID=:productID";
        $stmt = Database::getDB()->prepare($sql);
        try{
          $stmt->execute(
            array(
              ':productName' => $productName,
              ':productDescription' => $productDescription,
              ':productPrice' => $price,
              ':productImage' => $imageName,
              ':productID' => $productID
            )
          );
          return true;
        }
        catch(PDOException $e){
            print_r($e);
            return false;
        }
    }

    function getProductByID($productID){
      $sql = "SELECT * FROM products where productID=:productID";
      $stmt = Database::getDB()->prepare($sql);
      $stmt->execute(array(':productID'=>$productID));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
    }

?>