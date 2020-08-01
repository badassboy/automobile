<?php 
include("functions.php");
// determine if the button is not empty
if (isset($_POST['signupBtn'])) {

	// assigning variable to user input
	$name =  trim($_POST['username']);
	$email = trim($_POST['email']);
	$mobile = trim($_POST['tel']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['cpwd']);
		
// 	display error for empty fields
	$validate = 0;

// username validation
	if ((isEmpty($name, "name"))) {

		

		if(check_alphabetic_characters($name)){
			$validate=$validate+1;
		}else {
			echo "only characters allowed";
		}

		if (usernameExist($name, "name")) {
			$validate=$validate+1;
		}else {
			echo "username taken,try again";
		}
}else {
	echo "username required";
}

		
	
	
	// email validation
	if ((isEmpty($email, "email"))) {
		
	if (validate_email($email, "email")) {
		$validate = $validate+1;
	}else {
		echo "email not correct";
		
	}

	if (emailExist($email, "email")) {
		$validate = $validate+1;
	}else{
		echo "email already taken,try again";


	}
	
	}else{ 
			echo "email required";
	}

	if (isEmpty($mobile, "telephone")) {
		//using regular expression to check for  13 digit number
		$length = preg_match('/^\d{13}$/', $mobile);
		if (!$length) {
		  	$validate = $validate+1;
		} else {
		  echo "invalid number";
		}
	}else {
		echo "phone number required";
	}


	// password validations
	if ((isEmpty($password, "password"))) {
		
		$password = password_hash(trim($password), PASSWORD_DEFAULT);
		if ($password != $confirm_password) {
			$validate = $validate+1;	
		}else {
			echo "password does not match";
		}
			

	}else{
			echo "password required";
}





if ($validate == 4) {
	echo "registration successful";

}

	
	if ($validate >= 6) {

		$test = insert_data($name, $email, $mobile, $password);
		if ($test) {
			header("Location:homepage.php");
			exit;
		}

		
	}else {
		echo " Registration unsuccessful!";
	}

} 


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

	<style type="text/css">

		.register {

				background-color:#f2f2f2;
				height: 750px;
				display: flex;
			   flex-direction: row;
			   flex-wrap: wrap;
			   justify-content: center;
			   align-items: center;
		}


		.registration {
				height: 700px;
			   background-color:hsl(0, 0%, 100%);
			   width: 50%; 
		}

		.registration h3 {
			text-align: center;
			padding-top: 10%;
			font-weight: bolder;
		}

		 input[type=text],input[type=password],input[type=email],input[type=tel] {
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



				





	</style>
</head>
<body>

	

	<div class="container-fluid register">

		<div class="registration">
			
			<h3>SIGNUP</h3>
			<form method="post" action="">

			  <div class="form-group">
			    <label for="usernameInput">Username</label>
			    <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Enter username" required="required">
			  </div>

			  <div class="form-group">
			      <label for="exampleFormControlInput1">Email address</label>
			      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email" required="required">
			    </div>

			   

	    <div class="form-group">
	      <label for="usernameInput">Telephone</label>
	      <input class="form-control" name="tel" type="tel" id="example-tel-input" placeholder="Eg:+233545804166" required="required">
	    </div>
			    

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
			  </div>

			   <div class="form-group">
			    <label for="exampleInputPassword1">Confirm Password</label>
			    <input type="password" name="cpwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
			  </div>


  <input type="submit" name="signupBtn" class="btn btn-secondary" value="Register" style="background-color:#00e673;">

			 

			
			</form>
		</div>
		
	</div>
	



	<script type="text/javascript" src="jquery-3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>


</body>
</html>