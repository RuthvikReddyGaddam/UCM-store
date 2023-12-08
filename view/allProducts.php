<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store All Products</title>
		<link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid">
			<?php 
				require_once('view/header.php');
			?>
			<main>
				<div class="products_container mt-5 mb-3">
					<div class="row row-cols-1 row-cols-md-6 g-4">
          <?php
            // $allProducts = array("productName" => "Tumbler","description"=>"A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'","price"=>"35.00","productId"=>"1321" );
            $i=0;
            foreach($allProducts as $row){
              echo('<a class="link-offset-2 link-underline link-underline-opacity-0" href=index.php?action=all_products&&product_id=');
              echo($row['productID'].">");
              echo('<div class="col" title="View Product Description">');
              echo('<div class="card border border-danger border-2">');
              // echo('<img src="images/tumbler.png" class="card-img-top" alt="...">');  
              echo '<img class="card-img-top" alt="product-image" id="productImage" src=';
              echo 'images/'.$row['productImage'];
              echo '>';
              echo('<div class="card-body">');
              echo('<h5 class="card-title" style="width: 207px;overflow: hidden;text-wrap: nowrap;">');
              echo($row['productName']);
              echo('</h5>');
              // echo('<a href="#" class="btn btn-danger">');
              // echo('View Details');
              // echo('</a>');
              // echo('<p class="card-text">');
              // echo($allProducts['description']);
              // echo('</p>');
              echo('<h6> $');
              echo($row['productPrice']);
              echo('</h6>');
              echo('</div>');
              echo('</div>');
              echo('</div>');
              echo("</a>");
            }
          ?>
        </div>
			</main>
		</div>
    <?php 
				require_once('view/footer.php');
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>