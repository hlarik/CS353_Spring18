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
						<a class="nav-link" href="SearchPage.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="About.php">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="LoginPage.php">Sign out</a>
					</li>
				</ul>
			</div>
		</nav>
	
		<?php
			session_start();

			$url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
			$username = "ayse.sunar";
			$password = "rzmr3c1fn";
			$dbname = "ayse_sunar";

			$conn = mysqli_connect($url, $username, $password, $dbname);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$user_username = $_SESSION['username'];
			$result = $conn->query("SELECT * FROM subscriber WHERE username = '$user_username'");
			$row = $result->fetch_assoc();
						
			echo "<div class='container'>";	
			echo "<div class='form-row pt-5'>";
				echo "<h1>My Profile</h1>";
			echo "</div>";
				echo "<form action='AuthorProfilePage.php' method='POST'>";
					echo "<div class='form-row pt-5'>";
						echo "<div class='col-2'>";
							echo "<input class='btn-lg btn-primary my-2' type='submit' name='mypaper' value='My Paper'>";
							echo "<input class='btn-lg btn-primary my-2' type='submit' name='journal' value='Journals'>";
							echo "<input class='btn-lg btn-primary my-2' type='submit' name='SubmitPaper' value='Submit Paper'>";
						echo "</div>";
						echo "<div class='col-2 pl-5'>";
							echo "<p>Name</p>";
							echo "<p>Username</p>";
							echo "<p>Password</p>";
							echo "<p>Email</p>";
							echo "<p>Country</p>";
							echo "<p>City</p>";
							echo "<p>Street</p>";
							echo "<p>Zipcode</p>";
						echo "</div>";
						echo "<div class='col-6 pl-5'>";
							echo "<p>". $row["name"] . "</p>";
							echo "<p>". $row["username"] . "</p>";
							echo "<p>". $row["password"] . "</p>";
							echo "<p>". $row["email"] . "</p>";
							echo "<p>". $row["country"] . "</p>";
							echo "<p>". $row["city"] . "</p>";
							echo "<p>". $row["street"] . "</p>";
							echo "<p>". $row["zipcode"] . "</p>";
						echo "</div>";
					echo "</div>";
					echo "<div class='form-row pt-5'>";
						echo "<div class='col-2'>";
							echo "<input class='btn-lg btn-primary my-2' type='submit' value='DeleteAccount' name='DeleteAccount'/>";
						echo "</div>";
					echo "</div>";
				echo "</form>";
			echo "</div>";

			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				if(isset($_POST['DeleteAccount'])){
					//Delte all possible tables the user may be occuring in
					$result1 = $conn->query("DELETE FROM subscriber_comment_paper WHERE username='$user_username'");
					$result2 = $conn->query("DELETE FROM subscriber_follows_journal WHERE username='$user_username'");
					$result3 = $conn->query("DELETE FROM subscriber_likes_downloads_views_paper WHERE username='$user_username'");
					$result4 = $conn->query("DELETE FROM author_has_paper WHERE username='$user_username'");
					$result5 = $conn->query("DELETE FROM author_institution WHERE username='$user_username'");						
					$result6 =  $conn->query("DELETE FROM subscriber WHERE username='$user_username'");
					if($result1 || $result2 || $result3 || $result4 || $result5 || $result6){
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$togo = substr($actual_link, 0, strpos($actual_link, '/AuthorProfilePage.php'));
						$togo = $togo . "/LoginPage.php";
						//echo $togo;
						header("Location: $togo");
					}
				}
				if(isset($_POST['SubmitPaper'])){
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$togo = substr($actual_link, 0, strpos($actual_link, '/AuthorProfilePage.php'));
					$togo = $togo . "/submitPage.php";
					header("Location: $togo?username=".$user_username);
				}
				if(isset($_POST['mypaper'])){
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$togo = substr($actual_link, 0, strpos($actual_link, '/AuthorProfilePage.php'));
					$togo = $togo . "/mypapers.php";
					header("Location: $togo?username=".$user_username);
				}
				if(isset($_POST['journal'])){
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$togo = substr($actual_link, 0, strpos($actual_link, '/AuthorProfilePage.php'));
					$togo = $togo . "/journalPage.php";
					header("Location: $togo?username=".$user_username);
				}
			}
		?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>