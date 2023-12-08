<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store My Orders</title>
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
          <h2 class="text-danger">Previous Orders</h2>
        </div>
				<div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center footer-container p-2">
              <h5 class="text-white">Items</h5>
            </div>
            <div class="border border-danger">
            <?php foreach($myOrders as $key=>$productDetail): ?>
              <div class="row p-2">
                <div class="col-2 d-flex justify-content-center">
                  <img alt="productImage" height="100px" src= <?="images/". $productDetail['productImage']; ?>>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div><?= $productDetail['productName']; ?></div>
                </div>
                <div class="col-1 d-flex align-items-center">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" min="1" disabled value=<?= $productDetail['productQuantity']; ?>>
                    <label for="floatingInput">Quantity</label>
                  </div>
                </div>
                <div class="col-1 d-flex align-items-center">
									<div class="form-floating">
                    <input type="number" class="form-control" id="unitPrice" min="1" disabled value=<?= $productDetail['productPrice']; ?>>
                    <label for="unitPrice">Unit Price ($)</label>
                  </div>
                </div>
                <div class="col-1 d-flex align-items-center">
									<div class="form-floating">
                    <input type="number" class="form-control" id="totalPrice" min="1" disabled value=<?= $productDetail['productQuantity']*$productDetail['productPrice']; ?>>
                    <label for="totalPrice">Total Price ($)</label>
                  </div>
                </div>
                <div class="col-2 d-flex align-items-center" style="width: auto">
									<div class="form-floating">
                    <input type="date" class="form-control" id="dateOrdered" disabled  value=<?= $productDetail['orderDate']; ?>>
                    <label for="dateOrdered">Date ordered</label>
                  </div>
                </div>
                <div class="col-2 d-flex align-items-center">
									<div class="form-floating">
                    <input type="text" class="form-control" id="orderStatus" disabled value=<?= $productDetail['orderStatus']; ?>>
                    <label for="totalPrice">Order Status</label>
                  </div>
                </div>
              </div>
              <?php 
                if($key != (count($myOrders)-1)){
                  echo "<hr>";
                }
              ?>
            <?php endforeach; ?>
						<?php 
              if(empty($myOrders)){
                echo'<div class="d-flex justify-content-center">';
                echo '<p class="text-danger mt-3 mb-3">No Orders Placed</p>';
                echo '</div>';
              }
            ?>
            </div>
          </div>
        </div>
			</main>
		</div>
    <?php 
      if(count($myOrders)>2){
				require_once('view/footer.php');
      }
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>