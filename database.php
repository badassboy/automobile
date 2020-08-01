<?php

// extend time limit
set_time_limit(300);


$host = "localhost";
$db = "car";
$username = "root";
$password = "";

// using PDOException
try{

	$dbh = new PDO("mysql:host=$host;dbname=$db", $username, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "connected to the database";

}catch(PDOException $ex){
	echo "connection failed".$ex->getMessage();
	
}

?>


