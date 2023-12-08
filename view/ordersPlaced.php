<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store All Orders</title>
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
          <h2 class="text-danger">All Orders</h2>
        </div>
				<div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center footer-container p-2">
              <h5 class="text-white">Items</h5>
            </div>
            <div class="border border-danger mb-3">
            <!-- while($row = $result ->fetch_assoc())  use this loop below while fetching from db -->
            <?php foreach($ordersList as $key=>$productDetail): ?>
              <div class="row p-2">
                <div class="col-1 d-flex justify-content-center">
                  <!-- <img src="images/tumbler.png" alt="..." height="100px"> -->
                  <?php 
                    echo '<img height="100px"';
                    echo 'alt='.$productDetail['productName'].' ';
                    echo 'src=images/'.$productDetail['productImage'];
                    echo '>';
                  ?>
                </div>
                <div class="col-2 d-flex align-items-center">
                  <div><?php echo $productDetail['productName']?></div>
                </div>
                <div class="col-1 d-flex align-items-center">
                  <div class="form-floating">
                    <?php 
                      echo '<input type="number" class="form-control" id="floatingInput"  disabled value='.$productDetail['productQuantity'].'>';
                    ?>
                    <label for="floatingInput">Quantity</label>
                  </div>
                </div>
                <div class="col-1 d-flex align-items-center">
									<div class="form-floating">
                    <?php 
                      echo '<input type="number" class="form-control" id="unitPrice"  disabled value='.$productDetail['productPrice'].'>';
                    ?>
                    <label for="unitPrice">Unit Price ($)</label>
                  </div>
                </div>
                <div class="col-1 d-flex align-items-center">
									<div class="form-floating">
                    <?php 
                      echo '<input type="number" class="form-control" id="totalPrice"  disabled value='.$productDetail['productQuantity']*$productDetail['productPrice'].'>';
                    ?>
                    <label for="totalPrice">Total Price ($)</label>
                  </div>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div class="form-floating" style="width: 100%">
                    <?php 
                      echo '<input type="text" class="form-control" id="orderedBy" disabled value='.$productDetail['email'].'>';
                    ?>
                    <label for="totalPrice">Ordered By</label>
                  </div>
                </div>
                <div class="col-2 d-flex align-items-center" style="width: auto">
									<div class="form-floating">
                    <input type="date" class="form-control" id="dateOrdered" disabled  value=<?= $productDetail['orderDate']; ?>>
                    <label for="dateOrdered">Date ordered</label>
                  </div>
                </div>
                <div class="col-1 d-flex align-items-center">
                  <div class="form-floating">
                    <form id="orderStatus" method="post" action=".?action=admin_all_orders">
                      <input type="hidden" name="orderID" value=<?= $productDetail['orderID']; ?>>
                      <label for="floatingSelect" class="text-danger">Order Status</label>
                      <select class="form-select" id="floatingSelect" name="order_status"  aria-label="Floating label select example" onchange="submitForm()">
                        <option value="pending" <?php if ($productDetail['orderStatus'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="shipped" <?php if ($productDetail['orderStatus'] == 'shipped') echo 'selected'; ?>>Shipped</option>
                        <option value="delivered" <?php if ($productDetail['orderStatus'] == 'delivered') echo 'selected'; ?>>Delivered</option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
              <?php 
                if($key != (count($ordersList)-1)){
                  echo "<hr>";
                }
              ?>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
			</main>
		</div>
    <?php 
      if(count($ordersList)>3){
				require_once('view/footer.php');
      }
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      function submitForm() {
          document.getElementById("orderStatus").submit();
      }
    </script>
	</body>

</html>