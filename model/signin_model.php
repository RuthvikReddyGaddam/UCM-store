<?php

function checkLogin($email, $password, $isAdmin, $conn)
{
  $sql = "SELECT * FROM users WHERE email=:em;";
  $stmt = $conn->prepare($sql);
  $stmt->execute(
    array(
      ':em' => $email
    )
  );
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($isAdmin) {
    // check in admins table and verify credentials 
    if (!empty($row) && password_verify($password, $row["password"]) && ($row["IsAdmin"] == "yes")) {
      return array(true, $row["UserId"], true);
    } else
      return false;

  } else {
    // check in users/customers table and verify credentials 
    if (!empty($row) && password_verify($password, $row["password"]) && ($row["IsAdmin"] == "no")) {
      return array(true, $row["UserId"], false);
    } else
      return false;
  }
}
?>