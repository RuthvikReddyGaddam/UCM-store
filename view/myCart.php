<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store My Cart</title>
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
        <div class="d-flex justify-content-center mt-5" >
          <h2 class="text-danger">Order Summary</h2>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="d-flex justify-content-center footer-container p-2">
              <h5 class="text-white">Cart Items</h5>
            </div>
            <div class="border border-danger">
              <?php $cartTotal=0; ?>
              <?php foreach($myCartProducts as $key=>$productDetail): ?> 
                <div class="row p-2">
                  <div class="col-2 d-flex justify-content-center">
                    <a title="View product" href= <?="index.php?action=all_products&&product_id=". $productDetail['productID']; ?>>
                      <img alt="productImage" height="100px" src= <?="images/". $productDetail['productImage']; ?>>
                    </a>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <a title="View product" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href= <?="index.php?action=all_products&&product_id=". $productDetail['productID']; ?>>
                      <div><?= $productDetail['productName']; ?></div>
                    </a>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="floatingInput" min="1" disabled value=<?= $productDetail['productQuantity']; ?>>
                      <label for="floatingInput">Quantity</label>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="floatingInput" min="1" disabled value=<?= $productDetail['productPrice']; ?>>
                      <label for="floatingInput">Unit Price ($)</label>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <?php $cartTotal = $cartTotal + ($productDetail['productQuantity']*$productDetail['productPrice']); ?>
                    <div class="form-floating">
                      <input type="number" class="form-control" id="floatingInput" min="1" disabled value=<?= $productDetail['productQuantity']*$productDetail['productPrice']; ?>>
                      <label for="floatingInput">Total ($)</label>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-center">
                    <form method="post" action="index.php?action=my_cart">
                      <input type="hidden" name="removeFromCart" value=<?= $productDetail['cartID']; ?>>
                      <button type="submit" class="btn btn-dark">Remove</button>
                    </form>
                  </div>
                </div>
                <?php 
                  if($key != (count($myCartProducts)-1)){
                    echo "<hr>";
                  }
                ?>
              <?php endforeach; ?>
              <?php 
                if(empty($myCartProducts)){
                  echo'<div class="d-flex justify-content-center">';
                  echo '<p class="text-danger mt-3 mb-3">The Cart is Empty</p>';
                  echo '</div>';
                }
              ?>             
            </div>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center footer-container p-2">
              <h5 class="text-white">Cart Total</h5>
            </div>
            <div class="border border-danger">
              <div class="d-flex justify-content-between p-2">
                <h6 class="ms-3">Cart Total:</h6>
                <p class="me-3">$ <?= $cartTotal; ?></p>
              </div>
              <div class="d-flex justify-content-center mb-2">
                <form method="post" action="index.php?action=payment">
                  <?php $_SESSION['totalPayment']=$cartTotal; 
                    if($cartTotal > 0 ){
                      echo '<button type="submit" class="btn btn-danger me-2">Proceed To Payment</button>';
                    }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
			</main>
		</div>
    <?php 
      if(count($myCartProducts)>3){
				require_once('view/footer.php');
      }
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>