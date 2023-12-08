<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store Payment</title>
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
				<div class="form-container">
					<div class="mb-3">
						<div class="d-flex justify-content-center">
							<h2>Payment</h2>
						</div>
						<form action="index.php?action=payment" method="post">
              <div class="mt-3">
								<label for="cardNumber" class="form-label">Card Number</label>
								<input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="16" name="cardNumber" class="form-control border-danger" id="cardNumber" placeholder="Enter 16 digit card number" required autofocus>
							</div>
							<p id="cardMsg"></p>
              <div class="mt-3">
								<label for="cardHolder" class="form-label">Name on Card</label>
								<input type="text" name="cardHolder" class="form-control border-danger" id="cardHolder" placeholder="Enter card holder's name" required>
							</div>
              <div class="d-flex justify-content-between">
                <div class="mt-3" style="width: 45%;">
                  <label for="cvv" class="form-label">CVV/CVC/Security Code</label>
                  <input type="tel" name="cvv" class="form-control border-danger" id="cvv" placeholder="3 digit CVV" inputmode="numeric" pattern="[0-9\s]{3}" maxlength="3" required>
                </div>
                <div class="mt-3" style="width: 45%;">
                  <label for="valid_thru" class="form-label">Valid Thru</label>
                  <input type="month" name="valid_thru" min="2023-11" class="form-control border-danger" id="valid_thru" required>
                </div>
						  </div>
              <?php 
								if(isset($_SESSION['message'])){
									echo '<div class="mt-2" ><p class="text-danger">';
									echo $_SESSION["message"];
									echo '</p></div>';
									unset($_SESSION['message']);
								}
							?>
              <div class="d-flex flex-column align-items-center">
								<div class="d-grid gap-2 col-6 mx-auto">
									<button type="submit" class="btn btn-danger mt-4">Pay $<?=$_SESSION['totalPayment'] ?> </button>
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
		<script type="text/javascript" src="jquery-3.7.1.js">
		</script>
		<script>
			console.log("HEllo");
			$("#cardNumber").on("input",function(event){
				var textValue = $("#cardNumber").val();
				if(textValue.length < 16){
					$("#cardMsg").html("Card Number should be 16 digits").css({'color':"red","font-size":"12px"});
				}else{
					$("#cardMsg").html("Valid card number").css({'color':"green","font-size":"12px"});
				}
				console.log("Helloo",textValue);
			})
		</script>
	</body>

</html>