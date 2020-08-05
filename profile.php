<?php
session_start();
include("database.php");

$username = "";
$email = "";
$_SESSION['image'] = "";

	
			if (isset($_SESSION['id'])) {

				
				$id = $_SESSION['id'];
				$sql = $dbh->prepare("SELECT * FROM users WHERE id =:uid");
				$sql->execute(['uid'=> $id]);
				while ($data = $sql->fetch(PDO::FETCH_ASSOC)){
					$username = $data['username'];
					$email = $data['email'];
					$_SESSION['image'] = "images/".$data['image'];
				}
					
			}else {
				header("Location:login.php");
				exit;
			}
					
				
?>
			
<html>
<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/profile.css">

	<body>
		<div class="container-fluid profile-page">

			<div class="row">

			   
			   	<?php include("left.php"); ?>
			   

			   <div class="col-6 profile">


			 
			   		<!-- <h3>My Profile</h3><br> -->

			   		<div class="card">
			   			<?php 
			   	

			   			echo '<img src ="'.$_SESSION['image'].'" alt="Card image cap" class="card-img-top" />';
			   		  ?>



			   		  <div class="card-body">

			   		    
			   		  <ul class="list-group list-group-flush">
			   		    <li class="list-group-item"><?php echo $username;?></li>
			   		  </ul>

			   		  <ul class="list-group list-group-flush">
			   		    <li class="list-group-item"><?php echo $email;?></li>
			   		  </ul>

			   		

			   		  <div class="card-body">
			   		    <a href="edit-profile.php" class="card-link">Edit Profile</a>
			   		  </div>
			   		   
			   		</div>

			   	</div> 
			   	<!-- end of card -->
			   				

			
			   	
			   </div>

			 </div>


		
			
		</div>
		<!-- end of profile page -->

		<script type="text/javascript" src="jquery-3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap.min.js"></script>

	</body>
</html>