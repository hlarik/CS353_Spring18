<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>PURE Digital Library</title>
  </head>
	<body> 
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">PURE Digital Library</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="nav navbar-nav right">
					<li class="active">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Our Team</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sign out</a>
					</li>
				</ul>
			</div>
		</nav>
	
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
			
			$user_username = $_POST['username'];
			$user_password = $_POST['password'];
			
			$result = $conn->query("SELECT * FROM subscriber WHERE username = '$user_username' AND password = '$user_password'");
			
			echo "<div class='container'>";	
				echo "<div class='form-row pt-5'>";
					echo "<h1>My Profile</h1>";
				echo "</div>";
				echo "<div class='form-row pt-5'>";
					echo "<div class='col-2'>";
                    echo "<button class='btn-lg btn-primary my-2' type='submit'>Pending Papers</button>";
				    echo "<button class='btn-lg btn-primary my-2' type='submit'>Journals</button>";
					echo "</div>";
					echo "<div class='col-3 pl-5'>";
						echo "<p>Name</p>";
						echo "<p>Username</p>";
						echo "<p>Password</p>";
						echo "<p>Email</p>";
						echo "<p>Country</p>";
						echo "<p>City</p>";
						echo "<p>Street</p>";
						echo "<p>Zipcode</p>";
					echo"</div>";
					echo "<div class='col-7'>";
                      $row = $result->fetch_assoc();
							if(  $row["username"] == HaruChan )
								//echo "<p>" . "hhhhhhhhhh" .  "</p>"; 
							echo "<p>" . $row["name"] .  "</p>"; 
							echo "<p>" . $row["username"] ."</p>"; 
							echo "<p>" . $row["password"] . "</p>"; 
							echo "<p>" . $row["email"] . "</p>";
							echo "<p>" . $row["country"] . "</p>";
							echo "<p>" . $row["city"] . "</p>";
							echo "<p>" . $row["street"] . "</p>";
							echo "<p>" . $row["zip-code"] . "</p>";
					/*<p class="text-left">Right aligned text on all viewport sizes.</p>
						<p class="text-left">Right aligned text on all viewport sizes.</p>
                        <p class="text-left">Right aligned text on all viewport sizes.</p>
                        <p class="text-left">Right aligned text on all viewport sizes.</p>
                        <p class="text-left">Right aligned text on all viewport sizes.</p>
                        <p class="text-left">Right aligned text on all viewport sizes.</p>
                        <p class="text-left">Right aligned text on all viewport sizes.</p>
						/*$row = $result->fetch_assoc();
						echo "<p>" $row["name"] "</p>"; 
						echo "<p>" $row["username"] "</p>"; 
						echo "<p>" $row["password"] "</p>"; 
						echo "<p>" $row["email"] "</p>";
						echo "<p>" $row["country"] "</p>";
						echo "<p>" $row["city"] "</p>";
						echo "<p>" $row["street"] "</p>";
						echo "<p>" $row["zip-code"] "</p>";*/
					echo"</div>";
				echo"</div>";
				echo"<div class='form-row pt-5'>";
					echo"<div class='col-2'>";
						echo"<button class='btn-lg btn-primary my-2' type='submit'>Delete Account</button";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		?>
	
		
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>