<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store My Profile</title>
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
              <h2>Profile Details</h2>
            </div>
            <form action=".?action=user_profile" method="post">
              <div class="mt-5">
                <label for="userEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control border-danger" id="userEmail" placeholder="Enter your email" required value=<?= $userDetails['email'] ?> >
              </div>
              <div class="mt-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control border-danger" placeholder="Enter your password" aria-describedby="passwordHelpBlock" required>
              </div>
              <div class="mt-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control border-danger" id="firstName" placeholder="Enter your first name" required value=<?= $userDetails['firstName'] ?>>
              </div>
              <div class="mt-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" class="form-control border-danger" id="lastName" placeholder="Enter your last name" required value=<?= $userDetails['lastName'] ?>>
              </div>
              <div class="mt-3">
                <label for="contactNo" class="form-label">Contact Number</label>
                <input type="text" name="contactNo" class="form-control border-danger" id="contactNo" placeholder="Enter your contact number" maxlength="10" required value=<?= $userDetails['phone'] ?>>
              </div>
              <div class="mt-3">
                <label for="address" class="form-label">Address</label>
                <?php 
                  echo '<input type="text" name="address" class="form-control border-danger" id="address" placeholder="Enter your address ex. street name, apartment number" required value="' . $userDetails['address'] . '" >';
                ?>
              </div>
              <div class="mt-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control border-danger" id="city" placeholder="Enter your city" required value=<?= $userDetails['city'] ?>>
              </div>
              <div class="mt-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" class="form-control border-danger" id="state" placeholder="Enter your state" required value=<?= $userDetails['state'] ?>>
              </div>
              <div class="mt-3">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" name="zipCode" class="form-control border-danger" id="zipCode" placeholder="Enter zip code" maxlength="5" required value=<?= $userDetails['zipcode'] ?>>
              </div>
              <?php 
								if(isset($_SESSION['profile_message'])){
									echo '<div class="mt-2" ><p class="text-danger">';
									echo $_SESSION["profile_message"];
									echo '</p></div>';
									// unset($_SESSION['profile_message']);
								}
							?>
              <div class="d-flex flex-column align-items-center">
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button type="submit" class="btn btn-danger mt-5">Update Profile</button>
                </div>
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