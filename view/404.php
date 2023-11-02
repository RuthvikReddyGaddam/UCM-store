<!DOCTYPE html>
<html>
	<head>
		<title>404 Error!</title>
		<link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid">
      <header>
				<div class="d-flex justify-content-between">
				<a href="index.php?action=all_products" title="Home">
					<img src="images/UCMlogo.jpg" class="img-thumbnail" alt="logo" width="200" height="70">
				</a>	
				</div>
			</header>
			<main>
        <div class="d-flex flex-column align-items-center">
          <img src="images/404.png" class="img-fluid" alt="404 Error Image">
        </div>
			</main>
		</div>
    <?php 
				require_once('view/footer.php');
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>

</html>