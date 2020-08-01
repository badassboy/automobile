<?php

// turn on output buffering
ob_start();
// start a session
session_start();

?>

 

 


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HomePage</title>
  <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>
<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="logo2.png" style="width:200px; height: 50px;" alt="logo2">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
         
          
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

    </div>
      
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <span>
                  <?php 

                  if (isset($_SESSION["image"])){
                    $src = "/startupfailures/images/".$_SESSION["image"];
                  }else {
                    $src = "";
                  }
                    
                    
                    echo '<img class="card-img-top"
                    
                     src="'.$src.'" alt="Card image cap"
                      style="width:15%; height:50px; border-radius:5%; margin-left:85%; ">';
                  
                ?>

                   


                </span>
                 
              </li>

                
                 

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                    <a class="dropdown-item" href="profile.php">Profile</a>
                  </div>
                </li>
            </ul>
        </div>
  </nav>

  <script type="text/javascript" src="jquery-3.1.1.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>

<!-- send the output buffer and turn off output buffering -->
<?php ob_end_flush(); ?>
</body>
</html>

    

     
         


     
