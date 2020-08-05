<?php

ini_set('display_errors', 1);  
error_reporting(E_ALL);

include("functions.php");

if (isset($_POST['upload'])) {
	
	$product  = trim($_POST['product_name']);
	echo $product;
	$price = trim($_POST['price']);
	echo $price;
	$file = $_FILES['prd_image']['name'];
	echo $file;
	$description = trim($_POST['description']);
	echo $description;

	if (isset($product)|| isset($price)|| isset($file)|| isset($description)) {

		$uploaded =  uploadUserAd($product,$price,$file,$description);
		if ($uploaded) {
			$msg =  "<div class='alert alert-success' role='alert'>Upload successful</div>";
			
		}else {
			$msg =  "<div class='alert alert-success' role='alert'>Upload failed</div>";

		}
		
	}else {
		echo "<div class='alert alert-danger' role='alert'>Field failed</div>";
	}
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title></title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/sell.css" rel="stylesheet">





</head>
<body>


	<div class="container-fluid register">

		<div class="registration">

			<?php

			if (isset($msg)) {
				echo $msg;
			}


			?>
			
			<h3>Post Ad</h3>
			<form method="post" action="" enctype="multipart/form-data">

				<div class="form-group">
				<input type="text" name="product_name" class="form-control"  placeholder="Product Name" required="required">	
				</div>
							
				
				<div class="form-group">
					

					  <input type="number" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price" min="1" step="any" required="required">
					
				</div>

					
					<div class="form-group">
					 <input type="file" class="form-control-file" name="prd_image" required="required">
					</div>
					


			  	<div class="form-group">
			  	   <textarea class="form-control" name="description" rows="3" placeholder="Product detailed description" required="required"></textarea>
			  	 </div>

			  <input type="submit" name="upload" class="btn btn-secondary" value="Upload" style="background-color:#52527a;">
			
			</form>
		</div>
		
	</div>

	 <script src="jquery-3.1.1.js"></script>
  <script src="bootstrap.min.js"></script>

</body>
</html>
					
					
					
					 

					
					
					
			


				

					
					





					

				
					
						



					




					
						
					
					
					
					
	
			  	
					


			 


			  	  

			  	

			  		

			  	

			  

			 




			
			   

			  

			

			 



			 



