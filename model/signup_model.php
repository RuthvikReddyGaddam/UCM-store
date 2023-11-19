<?php
// require_once "model/pdo.php";
function registerUser($conn)
{
  $email = trim(htmlentities(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
  $password = $_POST["password"];
  $fn = trim(htmlentities(filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING)));
  $ln = trim(htmlentities(filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING)));
  $cn = trim(htmlentities(filter_input(INPUT_POST, "contactNo", FILTER_SANITIZE_STRING)));
  $add = trim(htmlentities(filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING)));
  $city = trim(htmlentities(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
  $state = trim(htmlentities(filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING)));
  $zipCode = trim(htmlentities(filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_NUMBER_INT)));
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
    try {
      $sql = "SELECT * FROM USERS WHERE Email=:em";
      $stmt = $conn->prepare($sql);
      $stmt->execute(
        array(
          ':em' => $email
        )
      );
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return "Error occured! Try again";
    }
    if (empty($row)) {
      $sql = "INSERT INTO USERS (LastName, FirstName, Email, Phone, Address, City, State, pincode, isAdmin, Password) VALUES(:ln, :fn, :em, :cn, :ad, :ct, :st, :pn, :admin, :pwd)";

      try {

        $stmt = $conn->prepare($sql);
        $stmt->execute(
          array(
            ':ln' => $ln,
            ':fn' => $fn,
            ':em' => $email,
            ':cn' => $cn,
            ':ad' => $add,
            ':ct' => $city,
            ':st' => $state,
            ':pn' => $zipCode,
            ':admin' => "no",
            ':pwd' => $hashedPassword
          )
        );
      } catch (PDOException $e) {
        return false;
      }
      return array(true, $conn->lastInsertId(), false);
    } else
      return "User Already Exists! Please Try again";
  } else {
    return "Data entered is wrong. Try again";
  }

}
?>