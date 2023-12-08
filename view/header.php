<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
			<header>
				<div class="d-flex justify-content-between align-items-center">
				<!-- <a href="index.php?action=all_products">
					<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
				</a> -->
				<?php if(isset($_SESSION['loggedIn']) && $_SESSION["isAdmin"]=='yes') : ?>
					<a href="index.php?action=admin_all_products">
						<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
					</a>
				<?php elseif(isset($_SESSION['loggedIn']) && $_SESSION["isAdmin"]=='no') : ?>
					<a href="index.php?action=all_products">
						<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
					</a>
				<?php else : ?>
					<a href="index.php?action=all_products">
						<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
					</a>
				<?php endif; ?>
					<div class="d-flex justify-content-end align-items-center mt-3">
						<?php if(isset($_SESSION['loggedIn']) && $_SESSION["isAdmin"]=='yes') : ?>
							<a href="index.php?action=admin_add_product" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">Add Product</a>
							<a href="index.php?action=admin_all_orders" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">All Orders</a>
							<!-- <div class="btn-group me-2" role="group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									Admin Views
								</button>
								<ul class="dropdown-menu border border-danger">
									<li><a class="dropdown-item" href="index.php?action=admin_all_products">All Products</a></li>
									<li><a class="dropdown-item" href="index.php?action=admin_all_orders">All Orders</a></li>
									<li><a class="dropdown-item" href="index.php?action=admin_add_product">Add Product</a></li>
								</ul>
							</div> -->
						<?php endif; ?>
						<?php if(isset($_SESSION['loggedIn'])) : ?>
							<a href="index.php?action=logout" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">Logout</a>
						<?php else : ?>
							<a href="index.php?action=login" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">Login</a>
						<?php endif; ?>
						<?php if(isset($_SESSION['loggedIn']) && $_SESSION["isAdmin"]=='no') : ?>
							<a href="index.php?action=my_cart" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">My Cart</a>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									Account
								</button>
								<ul class="dropdown-menu border border-danger">
									<li><a class="dropdown-item" href="index.php?action=user_orders">My Orders</a></li>
									<li><a class="dropdown-item" href="index.php?action=user_profile">Profile</a></li>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</header>
	</body>
</html>