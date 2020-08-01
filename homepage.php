<?php
	session_start();

	ini_set('display_errors', 1);  
	error_reporting(E_ALL);
	
	include("database.php");
	
	if(!empty($_POST['message'])){
	$sql = $dbh->prepare("INSERT INTO user_post(message,category) VALUES(:message, :category)");
	$sql->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
	$sql->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
	$sql->execute();
	$data = $sql->rowCount();
	if($data == 0){
		// your code here
		echo "error";

	}else {
		// return the id of the last post
		$postId = $dbh->lastInsertId();
		echo $postId;
	}
	// closing database
	$dbh = null;
	exit();
}

	
	

	

	
	
		
	

			
		

		
		

		// retrieve post from database
		$test = $dbh->prepare("SELECT * FROM users_ads ORDER BY ad_id DESC LIMIT 1");
		$test->execute();
		
	?>


	<style type="text/css">
		
				.wrapper {
					height: 600px;
					width: 100%;
					background-color: #66ff66;
				}
				

				.input-group textarea {
					height: 100px;
					font-size: 17px;
				}

				.input-group textarea[placeholder] {
					padding-top: 5%;
					padding-left: 5%;
				}

				.btn-primary {
					font-size: 14px;
					height: 40px;
					width: 15%;
					text-align: center;
					margin-left: 84%;
					margin-top: -8%;
				}

				.btn-success {
					float: left;
					margin-left: 1%;
					margin-top: -10px;
					width: 15%;
				}



				#exampleFormControlSelect1 {
					 width: 140px;
					 margin-left: 50%;
					 margin-top: 5px;
					 float: left;
				}
					 

				.activities {
					width: 100%;
					height: 60px;
					background: #f2f2f2;
				}



				.nav-item button {
					width: 9%;
					font-size: 17px;
					height: 35px;
				}

				.nav-item .card-img-top {
					height: 20%;
					width: 50%;
				}

				.nav-item a {
					margin:2px;
				}


				.navbar-nav {
					margin-right: 5%;
				}

				.dropdown-menu {
					min-width: 65px !important;
				}

				.dropdown-menu>a{
					padding: 2px 7px;
				}

				

				.error {
					color: red;
				}


				.user-post {
					width: 100%;
					background: white;
					height: 150px;
					border: 1px solid #bfbfbf;
				}

				.post-interaction {
					width: 100%;
					height: 70px;
					background: #d9d9d9;
					text-align: center;
				}

				.first {

					list-style: none;
					text-align: center;
					line-height: 50px;
					float: left;
					width: 130px;
					margin-left: 17%;
					margin-top: 1.5%;
					height: 50px;
					padding:0px 10px;
					background-color: yellow;
				}
					


				.second {

					list-style: none;
					text-align: center;
					line-height: 50px;
					float: left;
					width: 130px;
					margin-left: 5%;
					margin-top: 1.5%;
					height: 50px;
					padding:0px 10px;
				}
				

				#comment-two {
					display: none;
				}

				.share {
					height: 50px;
					font-size: 16px;
				}


				#single-comment {
					background-color:#99ff99;
					width: 100%;
					margin-top: 5%;
					border-radius: 5%;
					height: 50px;
					overflow-y: auto;
					border: 1px solid #bfbfbf;

				}

				#post_comment {
					height: 60px;
					width: 80%;
					padding: 0px;
				}

				#exampleTextarea {
					padding: 0px;
					border: 1px solid #737373;
				}

				#comment_button {
					height: 55px;
					width: 100%;
					margin-left: -1%;
					margin-top: 2%;
				}

				.hide {
					display: none;
				}

				.like,.unlike,.likes_count {
					color: yellow;
				}

				.display {
					display: none;
				}

			
				.categories {
					height: 400px;
					background-color: #ffffff;
					float: left;
					width: 22%;
					margin-right: 1%;
					margin-left: 5%;
				}

				.list-group {
					text-align: center;
					font-size: 17px;
					color: #1aff1a;
				}

				.content {
					
						float: left;
						width: 45%;
						background-color:blue;
						height: 500px;
						margin-right: 1%;
					}

				.friends_online {
					width: 22%;
					height: 400px;
					background-color: #ffffff;

				}
				
				.form-check img {
					margin-right: 20px;
				}

				.form-check-input {
					margin-left: 20px;
				}

	</style>
			
			
			

<html lang="en">

<title>HomePage</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<body>

	

    
	    
<div class="wrapper ">
	<div class="row">

		<div class="categories">
			<ul class="list-group">
			  <li class="list-group-item">Home</li>
			  <li class="list-group-item">Notifications</li>
			  <li class="list-group-item">Messages</li>
			  <li class="list-group-item"><a href="profile.php">Profile</a></li>
			  <li class="list-group-item"><a href="logout.php">Logout</a></li>
			  <li class="list-group-item">List</li>
			</ul>
		</div>

		<div class="content">


				<form name="myForm" method="post" id="myForm"  action="index.php">

					<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text" style="width: 100px;">
					    	<?php 
					    	
					    	$src = "../autodokta/".$_SESSION["image"];
					    	
					    	echo '<img class="card-img-top"
					    	
					    	 src="'.$src.'" alt="Card image cap" 
					    	 style="width:100%;  border-radius:5%;">'

					    	 ?>
					    </span>
					 </div>

				<!-- <textarea class="form-control textarea1" id="exampleTextarea"  name="message" aria-label="With textarea" placeholder="Share your failure" required="required"></textarea> -->
				



				<div class="activities">

					
					
				<button type="button" name="submit" class="btn btn-success" id="shareBtn">SHARE</button>
				</div>

					</div>
			</form>

						
								 
						<!-- display post gotten from database -->
						  <?php 

						  
						  $data = $test->fetch(PDO::FETCH_ASSOC);
						  if ($data === false) {
						  	$data['postid'] = 0;
						  	$data['message'] = "";
						  	$data['category'] = "";
						  	$data['likes'] = 0;
						  }


						   ?>


						<div class="user-post" id="receivingPost">

							<?php echo $data['message']; ?>

						</div>

						

							
						


						


						
						
						
							
							
		</div>
			
  

		
	</div>

	
</div>
	<!-- end of wrapper -->

	<!-- footer -->
	<?php include("footer.php");?>
	<!-- footer -->

	<script type="text/javascript" src="jquery-3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>

<!-- javascript -->
<script type="text/javascript" src="script.js"></script>
</body>
</html>

		

					
				

				 
				


		
		

							

							
						


