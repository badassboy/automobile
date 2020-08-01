






<style type="text/css">

	/*
	 * Globals
	 */

	/* Links */
	a,
	a:focus,
	a:hover {
	  color: #fff;
	}

	/* Custom default button */
	.btn-secondary,
	.btn-secondary:hover,
	.btn-secondary:focus {
	  color: #333;
	  text-shadow: none; /* Prevent inheritance from `body` */
	  background-color: #fff;
	  border: .05rem solid #fff;
	}


	/*
	 * Base structure
	 */

	html,
	body {
	  height: 100%;
	 
	  background-image: url("images/parts.jpg");
	  background-repeat: no-repeat;
	  background-position: center;
	  background-size: cover;
	}

	body {
	  display: -ms-flexbox;
	  display: flex;
	  color: #fff;
	  text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
	  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
	}

	.cover-container {
	  max-width: 42em;
	  /*background-color: red;*/
	  /*width: 100%;*/
	  /*height: 500px;*/

	}


	/*
	 * Header
	 */
	.masthead {
	  margin-bottom: 2rem;
	}

	.masthead-brand {
	  margin-bottom: 0;
	}

	.nav-masthead .nav-link {
	  padding: .25rem 0;
	  font-weight: 700;
	  color:rgb(255, 255, 255);
	  background-color: transparent;
	  border-bottom: .25rem solid transparent;
	  font-size: 20px;
	}

	.nav-masthead .nav-link:hover,
	.nav-masthead .nav-link:focus {
	  border-bottom-color: rgb(255, 255, 255);

	}

	.nav-masthead .nav-link + .nav-link {
	  margin-left: 1rem;
	}

	.nav-masthead .active {
	  color: #fff;
	  border-bottom-color: #fff;
	}

	@media (min-width: 48em) {
	  .masthead-brand {
	    float: left;
	  }
	  .nav-masthead {
	    float: right;
	  }
	}


	/*
	 * Cover
	 */
	.cover {
	  padding: 0 1.5rem;
	}

	.cover-heading {
		color:rgb(255, 255, 255);
		font-weight: bold;
	}

	.lead {
		color:rgb(255, 255, 255);
		font-weight: normal;
		font-size: 25px;
	}

	.cover .btn-lg {
	  padding: .75rem 1.25rem;
	  font-weight: 700;
	}


	/*
	 * Footer
	 */
	.mastfoot {
	  color: rgba(255, 255, 255, .5);
	}



	
	
</style>


<html>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<body class="text-center">

		 <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		  <header class="masthead mb-auto">
		    <div class="inner">
		      <h3 class="masthead-brand">Cover</h3>
		      <nav class="nav nav-masthead justify-content-center">
		        <a class="nav-link" href="login.php">Login</a>
		        <a class="nav-link" href="signup.php">SignUp</a>
		      </nav>
		    </div>
		  </header>

		  <main role="main" class="inner cover">
		    <h1 class="cover-heading">TRUSTED MARKET PLACE FOR GENUINE CAR SPARE PARTS</h1>
		    <p class="lead">Buy or sell your genuine car spare  parts easily</p>
		    <p class="lead">
		      <a href="#" class="btn btn-lg btn-secondary">SIGN UP NOW</a>
		    </p>
		  </main>

		  <footer class="mastfoot mt-auto">
		    <div class="inner">
		      <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
		    </div>
		  </footer>
		</div>
		
		
	
		<script type="text/javascript" src="jquery-3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap.min.js"></script>

		 
	</body>
</html>