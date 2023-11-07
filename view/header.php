<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
			<header>
				<div class="d-flex justify-content-between align-items-center">
				<a href="index.php?action=all_products">
					<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
				</a>	
					<div class="d-flex justify-content-end align-items-center mt-3">
						<a href="index.php?action=login" class="btn btn-danger me-2" tabindex="-1" role="button" aria-disabled="true">Login</a>
						<button type="button" class="btn btn-danger me-2">Logout</button>
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
					</div>
				</div>
			</header>
	</body>
</html>