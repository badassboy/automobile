<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "database.php";






// checking for empty field
function isEmpty($field, $name){
	
	$trim_directory = trim($field);
	if (empty($trim_directory)) {
		return False;
	}else {
		return True;
	}
	
}


function checkStringLength($field){
	if (strlen($field) < 5) {
		return False;
	}else {
		return True;
	}
}

function validate_email($field, $email){
	if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
		return False;
	}else{
		return True;
	}
}

function check_alphabetic_characters($field){
	if (!ctype_alpha($field)) {
		return False;
	}else {
		return True;
	}
}



function emailExist($field, $email){
	global $dbh;
	$stmt = $dbh->prepare("SELECT email FROM users WHERE email =:field");
	$stmt->bindParam(':field', $field);
	$stmt->execute();
	$test = $stmt->rowCount();
	if ($test) {
		return False;
	}else {
		return True;
	}
	

}


function usernameExist($field, $name){
	global $dbh;
	$statement = $dbh->prepare("SELECT username FROM users WHERE username =:field");
	$statement->bindParam(':field', $field);
	$statement->execute();
	$affected_rows = $statement->rowCount();
	if ($affected_rows) {
		return False;
	}else {
		return True;
	}
}


function insert_data($username,$email,$mobile,$password){
	global $dbh;
	$result = null;

	try {

		$statement=$dbh->prepare("INSERT INTO users(username, email,telephone, password) VALUES(:name, :email, :mobile, :pwd)");
		$statement->execute(array(
			':name' => $username,
			':email' => $email,
			':mobile' => $mobile,
			':pwd'  => $password

		));

		$data = $statement->rowCount();
		if ($data > 0) {
			$result = "registration successful";
		}else {
			$result = "insertion failed";
		}
		
		return $result;
	} catch (PDOException $e) {
		$result = "error encountered".$e->getMessage();
		
	}
}

// here is the login code
function user_loggedin($email,$password){

	$success = "";
	$errors = array();

	global $dbh;


	$stmt = $dbh->prepare("SELECT * FROM users WHERE email =:uemail");
	$stmt->bindValue(':uemail', $email);

	$stmt->execute();

	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	// if user is false
	if($data === false){

		 $errors[] = "invalid email or password";
		header("Location:login.php");
		

	}else {
		// compare user password with database password
		// $valid_password = password_verify($password, $data['password']);
		// return $valid_password;
		if (password_verify($password, $data['password'])) {
			return $data;
		}else {
			return false;
		}

	}
}

		
			
			

	





// code is here
// start here
function update_profile($file_name){


	global $dbh;


	 $path = "../autodokta/images/";
	 $errors = array();
      $file_name = $_FILES["photo"]['name'];
      $file_size = $_FILES['photo']['size'];

      $file_tmp = $_FILES['photo']['tmp_name'];
      $file_type = $_FILES['photo']['type'];
      $_SESSION["name"] = $file_name;

      $test_file = $path.basename($_FILES["photo"]["name"]);
      $file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

      $extensions= array("jpeg","jpg","png","gif");

      if(in_array($file_ext,$extensions) === false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 4097152) {
         $errors[]='File size must be exactly 2MB';
      }



      if(empty($errors)==true) {

    if (move_uploaded_file($file_tmp, "../autodokta/images/".$file_name)) {
    // echo "upload successfully";

		// update user's profile details
     		try{

		        $sql = $dbh->prepare("UPDATE users SET image = :img WHERE id = :uid;");
		        
     			$id = $_SESSION['id'];

     		
     			$sql->bindParam(':img' , $file_name); 
     			$sql->bindParam(':uid' , $id,PDO::PARAM_INT); 

		        $sql->execute();
			 	$updated = $sql->rowCount();
			 	if ($updated > 0) {
			 		return true;
			 		
			 	}else {
			 		return false;
			 	}

     			

     		}catch(PDOException  $ex){
     			echo $ex->getMessage();
     		}
	       
     	
     	
     }else {
    	return false;
    }

     }


}

function submitUserPost($message){
	global $dbh;

	try {

		$stmt=$dbh->prepare("INSERT INTO users_ads(message) VALUES(:msg)");
		$stmt->execute(array(":msg" => $message));

		$data = $stmt->rowCount();
		if ($data > 0) {
			return true;
		}else {
			return false;
		}
		
	}catch (PDOException $e) {
		return $e->getMessage();
		
	}
}

function uploadUserAd($product,$price,$file_name,$description){

	global $dbh;
	// image uploading code
	 $path = "../autodokta/ad_pics/";
	 $errors = array();
	  $file_name = $_FILES['prd_image']['name'];
	  $file_size = $_FILES['prd_image']['size'];

	  $file_tmp = $_FILES['prd_image']['tmp_name'];
	  $file_type = $_FILES['prd_image']['type'];
	  $_SESSION["name"] = $file_name;

	  $test_file = $path.basename($_FILES["prd_image"]["name"]);
	  $file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

	  $extensions= array("jpeg","jpg","png","gif");

	  if(in_array($file_ext,$extensions) === false){
	     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	  }

	  if($file_size > 4097152) {
	     $errors[]='File size must be exactly 2MB';
	  }

	  if (empty($errors)==true) {
	  		move_uploaded_file($file_tmp, "../autodokta/ad_pics/".$file_name);
	  }

	  // inserting data into database table
	  try {

	  	$stmt=$dbh->prepare("INSERT INTO users_ads(product_name,price,product_image,description) 
	  		VALUES(:name,:price,:image,:descr)");
	  	$stmt->execute(array(

	  		":name" => $product,
	  		":price" => $price,
	  		":image" => $file_name,
	  		":descr" => $description

	  	));

	  	$data = $stmt->rowCount();
	  	if ($data > 0) {
	  		return true;
	  	}else {
	  		return false;
	  	}
	  	
	  }catch (PDOException $e) {
	  	return $e->getMessage();
	  	
	  }
}


function displayUserAds(){

	global $dbh;


	$stmt = $dbh->prepare("SELECT * FROM users_ads");
	$stmt->execute();
	$data = $stmt->fetchAll(); 
		return $data;
}

function productDetails($id){

	global $dbh;
	try{

		$stmt = $dbh->prepare("SELECT * FROM users_ads WHERE ad_id=:uid");
		$stmt->execute(array(":uid"=>$id));
		$row = $stmt->fetchAll();
			return  $row;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
	
}
	
	





	
			
		








      		

       
        
       
       
         	
         	
       

     	

        

        

         
		

         		
         		
         
         	
         	
         

         	

      
			
			

			

			
				


				
			
			
			
				


			




// function imageResize($width,$height,$img_name)
// {
// 	// get original file size
// 	list($w,$h) = getimagesize($_FILES['photo']['name']);

// 	// calculate new image size
// 	// finding the highest value
// 	$ratio = max($width/$w, $height/$h);
// 	$h = ceil($height/$ratio);
// 	$x = ($w - $width / $ratio) / 2;
// 	$w = ceil($width / $ratio);

// 	// set new file name
// 	$path = $img_name;

// 	// save image
// 	if ($_FILES['photo']['type'] == 'image/jpeg')
// 	 {
// 		// get binary data from images
// 		$imgString = file_get_contents($_FILES['photo']['name']);

// 		// create image from string
// 		$image = imagecreatefromstring($imgString);
// 		$tmp = imagecreatetruecolor($width, $height);
// 		imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
// 		// create a jpeg file from the given image
// 		imagejpeg($tmp,$path,100);
// 	}
// 	else if ($_FILES['photo']['type'] == 'image/png') 
// 	{
// 		$image = imagecreatefrompng($_FILES['photo']['tmp_name']);
// 		$tmp = imagecreatetruecolor($width, $height);
// 		// set the blending mode for na image
// 		imagealphablending($tmp, false);
// 		imagesavealpha($tmp, true);
// 		imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
// 		imagepng($tmp,$path,0);
// 	}
// 	else if ($_FILES['photo']['type'] == 'image/gif') 
// 	{
		
// 		$image = imagecreatefromgif($_FILES['photo']['tmp_name']);
// 		$tmp = imagecreatetruecolor($width, $height);
// 		$transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
// 		imagefill($tmp, 0, 0, $transparent);
// 		imagealphablending($tmp, true);
// 		imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
// 		imagegif($tmp,$path);
// 	}
// 	else {
// 		return false;
// 	}

// 	return true;
// 	imagedestroy($image);
// 	imagedestroy($tmp);

// }


?>


	
	






	



	




