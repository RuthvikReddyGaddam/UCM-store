<?php
  require_once "model/pdo.php";
  require_once "model/updateProduct_model.php";
  

  function addProductToCart($productQuantity,$userID,$productID){
    // echo $productQuantity." ".$userID." ".$productID;
    // return false;
    $row = checkProductInCart($userID,$productID); //check if product isalready added to cart by user
    if($row){
      return updateCartProduct($productQuantity,$row['cartID']);  //update quantity if already added in cart
    }else{   // product not present in cart then add to cart
      $sql = "INSERT INTO cart (productID, userID, productQuantity) 
                VALUES(:productID, :userID, :productQuantity)";
      $stmt = Database::getDB()->prepare($sql);
      try{
        $stmt->execute(
          array(
            ':productID' => $productID,
            ':userID' => $userID,
            ':productQuantity' => $productQuantity
          )
        );
        return true; // if data insertion is sucessfull else return false
      }
      catch(PDOException $e){
          // print_r($e);
          return false;
      }
    }
    
  }

  function checkProductInCart($userID,$productID){
    $sql = "SELECT * FROM cart where productID=:productID AND userID=:userID";
    $stmt = Database::getDB()->prepare($sql);
    $stmt->execute(array(':productID'=>$productID,'userID'=>$userID));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  function updateCartProduct($productQuantity,$cartID){
    // echo $productName.' '.$productDescription.' '.$price.' '.$imageName;
    $sql = "UPDATE cart SET productQuantity=:productQuantity
              WHERE cartID=:cartID";
      $stmt = Database::getDB()->prepare($sql);
      try{
        $stmt->execute(
          array(
            ':productQuantity' => $productQuantity,
            ':cartID' => $cartID
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