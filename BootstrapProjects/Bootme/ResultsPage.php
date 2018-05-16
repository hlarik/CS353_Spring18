<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/custom.css"> -->

    <title>PURE Digital Library</title>
  </head>
  <body> 
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  
  	<?php
		//create connection
		$url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
		$username = "ayse.sunar";
		$password = "rzmr3c1fn";
		$dbname = "ayse_sunar";

		$conn = mysqli_connect($url, $username, $password, $dbname);

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		
		$get_usernme = $_SESSION['usernme'];
			
		echo "<form action='SearchPage.php' method='POST'>";
			echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>";
				echo "<nav class='navbar navbar-light bg-dark'>";
					echo "<span class='navbar-brand mb-0 h1'>PURE Digital Library</span>";
				echo "</nav>";
				echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
					echo "<span class='navbar-toggler-icon'></span>";
				echo "</button>";
				echo "<div class='collapse navbar-collapse' id='navbarNav'>";
					echo "<ul class='nav navbar-nav right'>";
						echo "<li class='nav-item'>";
							echo "<a class='nav-link active' href='#'>Home</a>";
						echo "</li>";
						echo "<li class='nav-item'>";
							echo "<a class='nav-link' href='About.php'>About</a>";
						echo "</li>";
						echo "<li class='nav-item'>";
							echo "<a class='nav-link' href='LoginPage.php'>Sign out</a>";
						echo "</li>";
						echo "<li>";
							echo "<input class='btn btn-default navbar-btn' type='submit' name='FormBtn' value='My Profile'>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</nav>";
		echo "</form>";	
		
		echo "<div class='jumbotron text-center'>";
			echo "<div class='container'>";
				echo "<h1>PURE Digital Library</h1>";
			echo "</div>";
		echo "</div>";
		//echo "<p> get" . $get_usernme . "</p>";
		
		//get info from searc page
		$user_username = $_GET['username'];
		$search_input = $_GET['search_input'];
		$search_by = $_GET['gridRadios'];
		$sort = $_GET['sortRadios'];
		$language = $_GET['language'];
		$status_input = $_GET['status'];
		$year_input = $_GET['year'];
		
		//echo "<p> user " . $user_username . "</p>";

		//$search_input = 'How to';

		//search by 
		// 1 --> title		2 --> author		3 --> journal		4 --> inst. 	5 --> conference
		//$search_by = 1;

		//sort according to 
		// 1 --> views		2 --> Likes		3 --> Downloads		4 --> Pages
		//$sort = 1;

		//staus according to 
		// 2 --> submitted		3 --> on review 	4 --> accepted 		5 --> rejected
		//$status = 2;
		if($status_input == 1){//strcmp(trim($status_input),"Accepted") == 0){//$status_input  == "Accepted"){
			$status = 1;
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$togo = substr($actual_link, 0, strpos($actual_link, '/ResultsPage.php'));
			$togo = $togo . "/LoginPage.php";
			//echo $togo;
			header("Location: $togo");
		}
		else if($status_input == 2){//strcmp(trim($status_input),"On review (Pending)") == 0){//$status_input  == "On review (Pending)"){
			$status = 2;
		}
		else if($status_input == 3){//strcmp(trim($status_input),"Submitted") == 0){//$status_input  == "Submitted"){
			$status = 3;
		}
		else if($status_input == 4){//strcmp(trim($status_input),"Rejected") == 0){//$status_input  == "Rejected"){
			$status = 4;
		}
		$status = 2;

		//language according to 
		// 2 --> English		3 --> Turkish

		$language = 'Turkish';
		

		if($year_input == "2010-2020"){
			$year = 2015;
		}
		else if($year_input == "2000-2010"){
			$year = 2005;
		}
		else if($year_input == "1990-2000"){
			$year = 1995;
		}

		//year according to 
		$year = 2000;

		switch($search_by){
			case 1:
				switch($sort){
					case 1:
						$result = $conn->query("SELECT DISTINCT * FROM 
						(SELECT DISTINCT * FROM scientific_research_paper S NATURAL JOIN author_has_paper A
						WHERE S.title LIKE '%$search_input%' AND S.language = '$language' AND S.release_date BETWEEN $year-5 AND $year+5 AND S.status = $status) T
						LEFT OUTER JOIN 
						(SELECT paperID, SUM(isViewed) AS tot_view, SUM(isLiked) AS tot_like, SUM(isDownloaded) AS tot_download FROM subscriber_likes_downloads_views_paper GROUP BY paperID) R 
						ON (R.paperID = T.paperID) ORDER BY T.isLiked DESC");

					break;

					case 2:
						$result = $conn->query("SELECT DISTINCT * FROM 
						(SELECT DISTINCT * FROM scientific_research_paper S NATURAL JOIN author_has_paper A
						WHERE S.title LIKE '%$search_input%' AND S.language = '$language' AND S.release_date BETWEEN $year-5 AND $year+5 AND S.status = $status) T
						LEFT OUTER JOIN 
						(SELECT paperID, SUM(isViewed) AS tot_view, SUM(isLiked) AS tot_like, SUM(isDownloaded) AS tot_download FROM subscriber_likes_downloads_views_paper GROUP BY paperID) R 
						ON (R.paperID = T.paperID) ORDER T.tot_like BY DESC");
					break;

					case 3:
						$result = $conn->query("SELECT DISTINCT * FROM 
						(SELECT DISTINCT * FROM scientific_research_paper S NATURAL JOIN author_has_paper A
						WHERE S.title LIKE '%$search_input%' AND S.language = '$language' AND S.release_date BETWEEN $year-5 AND $year+5 AND S.status = $status) T
						LEFT OUTER JOIN 
						(SELECT paperID, SUM(isViewed) AS tot_view, SUM(isLiked) AS tot_like, SUM(isDownloaded) AS tot_download FROM subscriber_likes_downloads_views_paper GROUP BY paperID) R 
						ON (R.paperID = T.paperID) ORDER T.tot_download BY DESC");
					break;

					default:
				}

			break;

			case 2:
				switch($sort){
					case 1:

					break;

					case 2:

					break;

					case 3:

					break;

					case 4:

					break;

					default:
				}
			break;

			case 3:
				switch($sort){
					case 1:

					break;

					case 2:

					break;

					case 3:

					break;

					case 4:

					break;

					default:
				}
			break;

			case 4:
				switch($sort){
					case 1:

					break;

					case 2:

					break;

					case 3:

					break;

					case 4:

					break;

					default:
				}
			break;

			case 5:
				switch($sort){
					case 1:

					break;

					case 2:

					break;

					case 3:

					break;

					case 4:

					break;

					default:
				}
			break;

			default:
		}

		//$temp = $conn->query("SELECT * FROM scientific_research_paper");



		/*$result = $conn->query("SELECT DISTINCT * FROM 
								(SELECT DISTINCT * FROM scientific_research_paper S NATURAL JOIN author_has_paper A
								WHERE S.title LIKE '%$search_input%' AND S.language = '$language' AND S.release_date BETWEEN $year-5 AND $year+5 AND S.status = $status) T
								LEFT OUTER JOIN 
								(SELECT paperID, SUM(isViewed) AS tot_view, SUM(isLiked) AS tot_like, SUM(isDownloaded) AS tot_download FROM subscriber_likes_downloads_views_paper GROUP BY paperID) R 
								ON (R.paperID = T.paperID)");*/


		echo "<br><br>";
		echo "<div class='container'>";
			echo "<form>";
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<div class='row-fluid'>";
							echo "<div class='col-10'>";
							/*	echo "<p>" . "Title: " . $row["title"] . '<br>'. "Author: " . $row["username"] . "<br>" . "View: " . $row["tot_view"] . 
									"       " . "Like: " . $row["tot_like"] . 
									"       " . "Download: " . $row["tot_download"] . 
									"       " . "Cited: " . $row["cite_no"] . "</p>";
							echo "</div>";
							echo "<div class='col-12'>";
								echo "<input type='submit' name='view' class='btn btn-primary' value='view'/>";
							echo "</div>";
						echo "</div>";*/

						echo "<br>";
						echo "<div class='card border-primary mb-3' >";
							echo "<div class='card-body'>";
								echo "<h4 class='card-title'>" . $row["title"] . "</h4>";
								echo "<h5 class='card-subtitle mb-2 text-muted'>" . $row["username"] . "</h5>";
								echo "<h6>" . "View: " . $row["tot_view"] . "     Like: " . $row["tot_like"] . "</h6>";
								echo "<h6>" . "Download: " . $row["tot_download"] . "     Cited: " . $row["cite_no"] . "</h6>";
								//echo "<input class='btn btn-primary' type='submit' name='view' value='view'/>";
								$_POST['user_username'] = $user_username;
								$_POST['user_username'] = $row["paperID"];
								echo "<a href=./ViewPaperPage.php?paperID=" . $row["paperID"] . "&username=" . $user_username . ">View</a>";
							echo "</div>";
						echo "</div>";
					}
				}
			echo "</form>";
		echo "</div>";
		
		if(isset($_POST['FormBtn'])){
			$result = $conn->query("SELECT * FROM subscriber WHERE username = '$get_usernme'");
			$row = $result->fetch_assoc();
			$_SESSION['username'] = $get_usernme;
			
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$togo = substr($actual_link, 0, strpos($actual_link, '/ResultsPage.php'));
			
			if(  $row["privilegeID"] == 1 ){
				$togo = $togo . "/AuthorProfilePage.php";
				header("Location: $togo?username=".$user_username);
			}
			elseif ( $row["privilegeID"] == 2) {
				$togo = $togo . "/EditorProfilePage.php";
				header("Location: $togo?username=".$user_username);	
			}
			elseif ( $row["privilegeID"] == 3 ) {
				$togo = $togo . "/ReviewerProfilePage.php";
				header("Location: $togo?username=".$user_username);
			}
			elseif ( $row["privilegeID"] == 4 ) {
				$togo = $togo . "/RegularUserProfilePage.php";
				header("Location: $togo?username=".$user_username);
			}
		}
		/*if(isset($_POST['view'])){
			$result = $conn->query("SELECT * FROM scientific_research_paper WHERE paperID = 1000");
			$row = $result->fetch_assoc();
			$_SESSION['username'] = $user_username;
			
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$togo = substr($actual_link, 0, strpos($actual_link, '/ResultsPage.php'));
			$togo = $togo . "/ViewPaperPage.php";
			header("Location: $togo?paperID=".$row["paperID"]."&username=".$user_username);
		}*/
  	?>
  </body>
</html>