<?php
	// session_start();

	ini_set('display_errors', 1);  
	error_reporting(E_ALL);

	include("functions.php");
	
	
			
	?>

<html lang="en">

<title>HomePage</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/homepage.css">

<body>

	

    <!-- IT start from here -->
	    
<div class="container-fluid wrapper">

	<div class="row">
		<!-- left -->
	    <?php include("left.php");?>


	    <!-- user ads -->
	    <div class="col-8 middle">

	    

	    		<div class="row">

	    			<?php 
	    			$test = [];
	    			
	    			$test = displayUserAds();
	    				foreach ($test as $data) {
	    					
	    					
	    				echo '



	    		 <div class="col-sm">
	    		 		<a href="details.php?prod_id='.$data['ad_id'].'">
	    		 		<div class="card">
	    		 		  <img src="ad_pics/'.$data['product_image'].'" class="card-img-top" alt="">
	    		 		  <div class="card-body">
	    		 		    <h5 class="card-title"> '.$data["product_name"].'</h5>
	    		 		    <p class="card-text">GH&#8373;  '.$data["price"].'</p>
	    		 		  </div>
	    		 		</div>
	    		 	</a>
	    		 </div>

	    	';
	    		

	    		}


	    		
	    	 ?>

	    		 

	    		</div>

	    		
	    
	    </div>
	    	<!-- user ads -->
	    	

	  </div>
	  <!-- end of row -->
	   

</div>
	<!-- end of wrapper -->

	<!-- footer -->
	
	<!-- footer -->

	<script type="text/javascript" src="jquery-3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>

<!-- javascript -->
<!-- <script type="text/javascript" src="script.js"></script> -->
</body>
</html>

	    		

	    		
	    	
	    	
	    	


	    	

	    	

	    			

	    					
	    					

	    	
	    	




	

		

					
				

				 
				


		
		

							

							
						


