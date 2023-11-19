<?php
function productDetails($conn, $product_id)
{
$stmt = $conn->prepare("SELECT * FROM products WHERE ProdId = :pid;");
$stmt->execute(array(":pid" => $product_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// return $row;
return array("ProdName" => "Tumbler","Description"=>"A viking brand 40oz handle tumbler with printed UCM logo","UnitPrice"=>"35.00","ProdId"=>1321);
}
?>