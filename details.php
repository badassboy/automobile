<?php

include_once("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/details.css">


</head>
<body>

	<div class="container-fluid details-page">
		<div class="row">

			
				<?php include("left.php"); ?>
			

		   <div class="col-8 my-content">

		   	<?php
		   

		   	if (isset($_GET['prod_id'])) {

		   		$id = $_GET['prod_id'];
		   		$details =  productDetails($id);
		   		

		   		
		   		foreach ($details as $row) {

		   			echo '
		   				   	<div class="card mb-3">
		   				   	  <img src="ad_pics/'.$row['product_image'].'" class="card-img-top" alt="...">
		   				   	  <div class="card-body">
		   				   	    <h5 class="card-title"> '.$row['product_name'].' </h5>
		   				   	    <p class="card-text">&#8373; '.$row['price'].' </p>
		   				   	    <p class="card-text"><strong class="text-muted"> '.$row['description'].'</strong></p>
		   				   	  </div>
		   				   	</div>';
		   		}
		   		
		   		
		   		
		   	}else {
		   		echo "id not set";
		   	}

		   	?>


		   <!-- 	<div class="card mb-3">
		   	  <img src="..." class="card-img-top" alt="...">
		   	  <div class="card-body">
		   	    <h5 class="card-title">Card title</h5>
		   	    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		   	    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		   	  </div>
		   	</div> -->


		   	
		   </div>
		   <!-- end of second div -->

		  

		 </div>
	</div>






<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>