<?php
function getAllProducts($conn)
{
$stmt = $conn->prepare("SELECT * FROM products;");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// return $rows;
return array(array("ProdName" => "Tumbler","Description"=>"A viking brand 40oz handle tumbler with printed UCM logo","UnitPrice"=>"35.00","ProdId"=>1321 ),
    array("ProdName" => "Tumbler","Description"=>"A viking brand 40oz handle tumbler with printed UCM logo","UnitPrice"=>"35.00","ProdId"=>1321 )
);
}
?>