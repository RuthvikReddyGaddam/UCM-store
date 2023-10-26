<?php
    // require_once "model/pdo.php";
    function registerUser($email,$password,$firstName,$lastName,$contactNo,$address,$city,$state,$zipCode){
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      // register user to user table
    }
?>