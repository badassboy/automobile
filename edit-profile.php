<?php

include("functions.php");




if (isset($_POST['btn_update'])) {


if (isset($_FILES['photo']['name'])) {
// print_r($_FILES)
	$file_name = $_FILES['photo']['name'];

	$updated = update_profile($file_name);
	if ($updated) {
		echo "<script type='text/javascript'>alert('update successful');</script>";

	
	}else {
		echo "<script type='text/javascript'>alert('update failed');</script>";

	}
	
	
}else {
	echo "Please select image";
}
		

	

	
	

}


?>


<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="edit-profile.css">
	
</head>
	<body>
		<div class="profile-page">

			


			<div class="profile">

				<img
				<?php  

				$src = "/autodokta/".$_SESSION["image"];
				 echo '<img class="card-img-top"
			
				  src="'.$src.'" alt="Card image cap">'

				 ?>>
				 


				<form method="post" id="edit-form" action="" enctype="multipart/form-data" class="myForm">

				  <div class="form-group">
				    <input type="file" class="form-control-file" name="photo"
				     id="exampleFormControlFile1" required="required">
				  </div>

				
				  <input type="submit" name="btn_update" class="btn btn-primary" value="Update profile">
				
				</form>

			</div>
				
			<!-- end of profile -->

				 

				 


		
			
		</div>
		<script type="text/javascript" src="jquery-3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap.min.js"></script>

</body>
</html>
		<!-- end of profile page -->
