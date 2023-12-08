<?php
    require_once "model/pdo.php";
    function registerUser($email,$password,$firstName,$lastName,$phone,$address,$city,$state,$zipCode){
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      // register user to user table
      $row = checkIfUserExists($email);
      if(!$row){
        $sql = "INSERT INTO users (email, password, firstName, lastName, phone, address, city, state, zipcode) 
                VALUES(:email,:password,:firstName,:lastName,:phone,:address,:city,:state,:zipcode)";
        $stmt = Database::getDB()->prepare($sql);
        try{
          $stmt->execute(
            array(
              ':email' => $email,
              ':password' => $hashedPassword,
              ':firstName' => $firstName,
              ':lastName' => $lastName,
              ':phone' => $phone,
              ':address' => $address,
              ':city' => $city,
              ':state' => $state,
              ':zipcode' => $zipCode
            )
          );
          return "Sucessfully Registered ! Please Log In !";
        }
        catch(PDOException $e){
            print_r($e);
        }
      }else{
        return "Email Already Exists";
      }
    }

    function checkIfUserExists($email){
      $sql = "SELECT * FROM users WHERE email=:email";
      $stmt = Database::getDB()->prepare($sql);
      $stmt->execute(
        array(
          ':email' => $email
        )
      );
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
    }
    
    function updateUsersCount($userDetails){
      $visitCount = $userDetails['visitCount']+1;
      $sql = "UPDATE users SET visitCount=:visitCount WHERE userID=:userID";
      $stmt = Database::getDB()->prepare($sql);
      try{
        $stmt->execute(
          array(
            ':visitCount' => $visitCount,
            ':userID'=> $userDetails['userID']
          )
        );
        return true;
      }
      catch(PDOException $e){
          // print_r($e);
          return "Failed to Update Count. Please Try Again !";
      }
    }
?>