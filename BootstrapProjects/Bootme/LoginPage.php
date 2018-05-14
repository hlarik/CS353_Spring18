<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS CSSlerden önce koy-->
    <link rel="stylesheet" href="css/bootstrap.css">
      
      <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

    
  </head>
  <body>

  	<?php

  		session_start();

  		//create connection
  		$url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
		$username = "ayse.sunar";
		$password = "rzmr3c1fn";
		$dbname = "ayse_sunar";

		$conn = mysqli_connect($url, $username, $password, $dbname);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//Check logn button click
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(isset($_POST['login'])){
				$user_username = $_POST['username'];
				$user_password = $_POST['password'];

				if($user_username != '' && $user_password != ''){
					$result = $conn->query("SELECT * FROM subscriber WHERE username = '$user_username' AND password = '$user_password'");

					//correct username and password
					if(mysqli_num_rows($result) > 0){
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$togo = substr($actual_link, 0, strpos($actual_link, '/LoginPage.php'));
						$togo = $togo . "/SearchPage.php";
						//echo $togo;
						$_POST['user_username'] = $user_username;
						$_SESSION['usernm'] = $user_username;
						header("Location: $togo?username=".$user_username);
					}
					else{
					}
					
				}
			}
			if(isset($_POST['signup'])){
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$togo = substr($actual_link, 0, strpos($actual_link, '/LoginPage.php'));
				$togo = $togo . "/signupPage.php";
				//echo $togo;
				header("Location: $togo");
			}
		}
  	?>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
		<div class="container">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#nvbCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand">Pure Digital Library</a>
			<div class="collapse navbar-collapse" id="nvbCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="About.php">About</a>
					</li>
				</ul>        
			</div>
        </div>
    </nav> 
	
    <!-- Header -->
	<header id="headerSection">
		<div class="overlay">
			<div class="container">
				<div class="row text-center">
					<div class="col-6 mx-auto">
						<h1 style="color: black; margin-top: 200px; " class="text-light bg-dark"> <span>Pure Digital Library</span></h1>
						<form action="LoginPage.php" method="POST">
							<div class="form-group pt-5">
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password1" placeholder="Enter Password">
							</div>
							<div class="form-group">
								<input type="submit" name="login" class="btn btn-primary" value="login"/>
							</div>
							<div class="form-group">
								<input type="submit" name="signup" class="btn btn-primary" value="signup"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script type= "text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>