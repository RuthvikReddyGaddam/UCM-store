<?php
require_once "pdo.php";
header('Content-Type: application/json; charset=utf-8');
if ( !isset($_POST['email']) ) return;
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$sql = "SELECT email from users WHERE email = :email";
$stmt = Database::getDB()->prepare($sql);
$stmt->execute(array(":email" => $email));
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($rows, JSON_PRETTY_PRINT);