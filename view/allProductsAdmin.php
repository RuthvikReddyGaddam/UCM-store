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
            foreach($allProducts as $row){
              echo('<div class="col">');
              echo('<div class="card border border-danger border-2">');
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
              // echo($row['productDescription']);
              // echo('</p>');
              echo('<h6> $');
              echo($row['productPrice']);
              echo('</h6>');
              echo('<div class="d-flex justify-content-between align-items-center">');
              echo('<a  href=index.php?action=admin_update_product&&product_id=');
              echo($row['productID'].">");
              echo('<button type="submit" class="btn btn-danger mb-1">Edit Details</button></a>');
              echo('<form method="post" action="index.php?action=admin_all_products">');
              echo('<input type="hidden" name="deleteProduct" value='.$row['productID'].'>');
              echo('<button type="submit" class="btn btn-dark mb-1">Delete</button></form>');
              echo('</div>');
              echo('</div>');
              echo('</div>');
              echo('</div>');
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