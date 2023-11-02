<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store SignUp</title>
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
				<div class="form-container" style="height: 1050px;">
					<div class="mb-3">
						<div class="d-flex justify-content-center">
							<h2>Sign Up</h2>
						</div>
						<form action=".?action=register" method="post">
							<div class="mt-5">
								<label for="exampleFormControlInput1" class="form-label">Email address</label>
								<input type="email" name="email" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your email" required>
							</div>
							<div class="mt-3">
								<label for="inputPassword5" class="form-label">Password</label>
								<input type="password" name="password" id="inputPassword5" class="form-control border-danger" placeholder="Enter your password" aria-describedby="passwordHelpBlock" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">First Name</label>
								<input type="text" name="firstName" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your first name" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">Last Name</label>
								<input type="text" name="lastName" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your last name" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">Contact Number</label>
								<input type="text" name="contactNo" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your contact number" maxlength="10" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">Address</label>
								<input type="text" name="address" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your address ex. street name, apartment number" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">City</label>
								<input type="text" name="city" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your city" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">State</label>
								<input type="text" name="state" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your state" required>
							</div>
							<div class="mt-3">
								<label for="exampleFormControlInput1" class="form-label">Zip Code</label>
								<input type="text" name="zipCode" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter zip code" maxlength="5" required>
							</div>
							<div class="d-flex flex-column align-items-center">
								<div class="d-grid gap-2 col-6 mx-auto">
									<button type="submit" class="btn btn-danger mt-5">Register</button>
								</div>
								<p class="mt-2">
								<a href="index.php?action=login" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">
									Already Registered ? Go to login page
								</a>	
								</p>
							</div>
						</form>
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