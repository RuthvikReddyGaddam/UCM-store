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
              <div class="row p-2">
                <div class="col-2 d-flex justify-content-center">
                  <img src="images/tumbler.png" alt="..." height="100px">
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div>Tumbler</div>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" min="1">
                    <label for="floatingInput">Quantity</label>
                  </div>
                </div>
                <div class="col-2 d-flex align-items-center">
                  $33.33
                </div>
                <div class="col-2 d-flex align-items-center">
                  <button type="button" class="btn btn-dark">Remove</button>
                </div>
              </div>

              <hr>

              <div class="row p-2">
                <div class="col-2 d-flex justify-content-center">
                  <img src="images/tumbler.png" alt="..." height="100px">
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div>Tumbler</div>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" min="1">
                    <label for="floatingInput">Quantity</label>
                  </div>
                </div>
                <div class="col-2 d-flex align-items-center">
                  $33.33
                </div>
                <div class="col-2 d-flex align-items-center">
                  <button type="button" class="btn btn-dark">Remove</button>
                </div>
              </div>

              
            </div>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center footer-container p-2">
              <h5 class="text-white">Cart Total</h5>
            </div>
            <div class="border border-danger">
              <div class="d-flex justify-content-between p-2">
                <h6 class="ms-3">Cart Total:</h6>
                <p class="me-3">$33.00</p>
              </div>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-danger me-2">Proceed To Payment</button>
              </div>
            </div>
          </div>
        </div>
			</main>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>