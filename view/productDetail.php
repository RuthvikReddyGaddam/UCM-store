<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store Product Detail</title>
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
        <div class="row">
          <div class="col-5">
            <img src="images/tumbler.png" class="card-img-top" alt="...">
          </div>
          <div class="col-7">
            <div class="row mt-5"><h2 class="text-danger">Product Description</h2></div>
            <?php 
              echo '<div class="row mt-5"><h2>';
              echo $productDetail['productName'];
              echo '</h2></div>';
              echo '<div class="row mt-3"><h4>';
              echo $productDetail['description'];
              echo '</h4></div>';
              echo '<div class="row mt-3"><h5>$ ';
              echo $productDetail['price'];
              echo '</h5></div>';
            ?>
            <!-- <div class="row mt-5"><h2>Tumbler</h2></div>
            <div class="row mt-3"><h4>A viking brand 40oz handle tumbler with printed UCM logo 'Central Missouri'</h4></div>
            <div class="row mt-3"><h5>$10.00</h5></div> -->
            <div class="row">
            <form action="?action=all_products&&product_id=" method="post" class="row g-3">
              <div class="col-auto">
                <input type="number" class="form-control border-danger" id="product_quantity" placeholder="Enter Quantity"  min="1">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-danger mb-3">Add to Cart</button>
              </div>
            </form>
            <div class="mt-2" >
									<p class="text-danger">Product Added to Cart!</p>
						</div>
            </div>
          </div>
        </div>

			</main>
		</div>
    <?php 
				require_once('view/footer.php');
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>