<?php
function addToCart($conn, $quantity)
{
$stmt = $conn->prepare("INSERT INTO cart () VALUES ()");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $stmt = $conn->prepare("");reduce product quantity in products
// return $rows;
return array(array("ProdName" => "Tumbler","Description"=>"A viking brand 40oz handle tumbler with printed UCM logo","UnitPrice"=>"35.00","ProdId"=>1321 ),
    array("ProdName" => "Tumbler","Description"=>"A viking brand 40oz handle tumbler with printed UCM logo","UnitPrice"=>"35.00","ProdId"=>1321 )
);
}
?>