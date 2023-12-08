<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store Ordered Successfully</title>
		<link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid mb-5">
			<?php 
				require_once('view/header.php');
			?>
			<main>
				<div class="order-container">
					<div class="mb-3">
						<div class="d-flex justify-content-center">
							<h2 class="text-danger">Order Placed!</h2>
						</div>
						<div class="d-flex justify-content-center mt-5">
							<p><b>Congratulations! Your order was placed successfully.</b></p>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<p>Order will be soon delivered at:</p>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<?php
								echo $userDetails['address'].', '.$userDetails['city'].', '.$userDetails['state'].' - '.$userDetails['zipcode'];
							?>
						</div>
						<div class="d-flex justify-content-center mt-5">
							<p>
								<a href="index.php?action=all_products" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
									<h3>Visit Home!</h3>
								</a>
							</p>
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