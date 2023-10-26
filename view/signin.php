<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store SignIn</title>
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
				<div class="form-container">
					<div class="mb-3">
						<div class="d-flex justify-content-center">
							<h2>Login</h2>
						</div>
						<form action="." method="post">
							<div class="mt-5">
								<label for="exampleFormControlInput1" class="form-label">Email address</label>
								<input type="email" name="email" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter your email" required>
							</div>
							<div class="mt-3">
								<label for="inputPassword5" class="form-label">Password</label>
								<input type="password" name="password" id="inputPassword5" class="form-control border-danger" placeholder="Enter your password" aria-describedby="passwordHelpBlock" required>
							</div>
							<div class="d-flex mt-3">
								<input type="checkbox" id="danger-outlined" name="isAdmin" value="true" class="mt-1" autocomplete="off">
								<label for="danger-outlined" class="ms-2">I am an admin</label><br>
							</div>
							<div class="d-flex flex-column align-items-center">
								<div class="d-grid gap-2 col-6 mx-auto">
									<button type="submit" class="btn btn-danger mt-5">Login</button>
								</div>
								<p class="mt-2">
								<a href="index.php?action=register" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">
									Not Registered ? Go to registration page
								</a>	
								</p>
							</div>
						</form>
					</div>
				</div>
			</main>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>