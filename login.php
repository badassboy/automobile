<?php
// start a session
// session_start();

// free all session
// session_unset();

// $_SESSION['id'] = "";
include "functions.php";




		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			
			$email = trim($_POST['email']);
			$password = trim($_POST['pwd']);
			


			// checking for empty fields
			if(!isset($email) && !isset($password)){
				$errors = "fields  required";
			}else {

					
					

					$user = user_loggedin($email,$password);


					if ($user) {
						$_SESSION['id'] = $user["id"];
						header("Location:homepage.php");
						exit;
						// write session data and end session
						// session_write_close();
					}else {
						echo "<div class='alert alert-danger' role='alert'>Login failed</div>";
					}

					

					

				}

}
				



?>

<html>
	<head>
		<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">



		<style type="text/css">

			

			.login_page {

				background-color:#f2f2f2;
				height: 600px;
				display: flex;
			   flex-direction: row;
			   flex-wrap: wrap;
			   justify-content: center;
			   align-items: center;

			}

			.myForm {
				background-color: hsl(0, 0%, 100%);
				height: 500px;
				width: 50%;
			}



			.myForm h3 {
				text-align: center;
				padding-top: 10%;
				font-weight: bolder;
			}

			 input[type=email],input[type=password] {
				width: 40%;
				margin-left: 30%;
			}

			form label {
				padding-left: 30%;
			}


			.btn-secondary {
				width: 40%;
				height: 45px;
				margin-left: 30%;
				border: 2px solid #00e673;
				font-weight: bolder;
				font-size: 20px;
			}

			.next_action {

				padding-left: 30%;
				padding-top: 2%;
				font-size: 20px;
			}

			.next_action a {
				color: #52527a;
			}
			
			



		</style>

	</head>

	<body>


			<div class="container-fluid login_page">
				
				<div class="myForm">
				
					<h3>LOGIN</h3>
					<form method="post" action="">

					 <div class="form-group">
				     <label for="exampleInputEmail1">Email address</label>
				     <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
				     placeholder="Email address">
					 </div>
					    
					    

					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
					  </div>

					 
					  <button type="submit" name="loginBtn" class="btn btn-secondary" style="background-color:#00e673;">Login</button>

					  <p class="next_action">Dont have an account ?<a href="signup.php">Register</a></p>

					</form>
				</div>

			</div>


		
			<script type="text/javascript" src="jquery-3.1.1.js"></script>
			<script type="text/javascript" src="bootstrap.min.js"></script>



	</body>
</html>