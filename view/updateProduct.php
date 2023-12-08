<!DOCTYPE html>
<html>
	<head>
		<title>UCM e-Store Edit Product</title>
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
      <div class="row">
          <div class="col-5 d-flex justify-content-center align-items-center">
            <!-- <img src="images/noImagePlaceholder.png" class="card-img-top" alt="product-image" id="productImage" > -->
            <?php 
              echo '<img class="card-img-top" alt="product-image" id="productImage" src=';
              echo 'images/'.$productDetail['productImage'];
              echo '>'
            ?>
          </div>
          <div class="col-7">
            <div class="row mt-5"><h2 class="text-danger">Edit Product Details</h2></div>
            <div>
              <!-- <form method="post" enctype="multipart/form-data" action="index.php?action=admin_update_product"> -->
              <?php 
                echo '<form method="post" enctype="multipart/form-data" action=index.php?action=admin_update_product&&product_id='.$_GET['product_id'].">";
              ?>
                <div class="mt-3">
                  <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                  <!-- <input type="text" name="productName" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter product name" required> -->
                  <?php
                    echo '<input type="text" name="productName" class="form-control border-danger" id="exampleFormControlInput1" placeholder="Enter product name" required value="' . $productDetail['productName'] . '" >';
                  ?>
                </div>
                <div class="form-group mt-3">
                  <label for="exampleFormControlTextarea1">Production Description</label>
                  <textarea name="productDescription" placeholder="Enter production description" id="exampleFormControlTextarea1" required class="form-control border-danger mt-1" id="exampleFormControlTextarea1" rows="3">
                  <?php
                    echo $productDetail['productDescription'];
                  ?>
                  </textarea>
                </div>
                <label for="exampleFormControlInput1" class="form-label mt-3">Product Price</label>
                <div class="input-group ">
                  <span class="input-group-text border-danger">$</span>
                  <!-- <input type="number" name="price" class="form-control border-danger" id="exampleFormControlInput1" min="1" step=".01" required> -->
                  <?php
                    echo '<input type="number" name="price" class="form-control border-danger" id="exampleFormControlInput1" min="1" step=".01" required value=';
                    echo $productDetail['productPrice'];
                    echo '>'
                  ?>
                </div>
                <div class="mt-3">
                  <label for="formFile" class="form-label">Product Image</label>
                  <input class="form-control border-danger" name="productImage" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg" onchange="displayImage(this)">
                </div>
                <?php 
                  if(isset($_SESSION['message'])){
                    echo '<div class="mt-2" ><p class="text-danger">';
                    echo $_SESSION["message"];
                    echo '</p></div>';
                    unset($_SESSION['message']);
                  }
							  ?>
                <button type="submit" class="btn btn-danger mt-3">Update Product Details</button>
              </form>
            </div>
            </div>
          </div>
        </div>
			</main>
		</div>
		<?php 
				require_once('view/footer.php');
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      function displayImage(e){
        if(e.files[0]){
          let reader = new FileReader();
          reader.onload = function(e){
            let product = document.getElementById('productImage');
            product.setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }
      }

    </script>
	</body>

</html>