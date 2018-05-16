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
		$user_username = $_GET['user_username'];
		$user_username = "KaanKuhn";
		//$user_username = $_SESSION['user_username'];
		//$user_username = "KaanKuhn";
		//give a predefined paperID for now
		//$paperID = $_GET['paperID'];
		//$user_username = $_SESSION['username'];
		$paperID = 1001;

		//insert ignore ignores if
		$insert = $conn->query("INSERT INTO subscriber_likes_downloads_views_paper (username, paperID, isDownloaded, isLiked, isViewed) VALUES
								('$user_username', $paperID, 0, 0, 1)");//" WHERE ($user_username, paperID) NOT IN (SELECT username, paperID FROM subscriber_likes_downloads_views_paper)");

		$comments =  $conn->query("SELECT text1, username FROM comment NATURAL JOIN subscriber_comment_paper"); //get texts assciated with this paper
		
		echo "<form action='ViewPaperPage.php' method='POST'>";
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
							echo "<a class='nav-link active' href='SearchPage.php'>Home</a>";
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
		
		
		echo "<div class='container'>";
		echo "<form action='ViewPaperPage.php' method='POST'>";
			echo "<div class='row pt-5'>";
				echo "<div class='col-10'>";
					echo "<div class='embed-responsive embed-responsive-4by3'>";
					  echo "<iframe class='embed-responsive-item' src='Content/Project Design Report.pdf' type='application/pdf'></iframe>";
					echo "</div>";
				echo "</div>";
				echo "<div class='col-2'>";
					echo "<div class='btn-group-vertical'>";
						echo "<input class='btn-md btn-primary my-2' type='submit' name='Like' value='Like' ng-click='levelOU()'/>";
						echo "<input class='btn-md btn-primary my-2' type='submit' name='Download' value='Download'/>";
						echo "<input class='btn-md btn-primary my-2' type='submit' name='Follow Journal' value='Follow Journal'/>";
					echo "</div>";
				echo "</div>";
			echo "</div>";

			echo "<div class='form-row pt-5'>";
				echo "<div class='form-group col-8'>";
					echo "<label for='commentArea'>Write a comment:</label>";
					echo "<textarea class='form-control' id='commentArea' rows='3' name='comment' placeholder='You may have to refresh to see your comment, sorry for the inconvenience '></textarea>";
					echo "<input class='btn-sm btn-primary my-2' type='submit' name='submit' value='submit'/>";
				echo "</div>";
			echo "</div>";
		echo "</form>";
	echo "</div>";
		
		
		echo "<br><br>";
		echo "<div class='container'  id='comment_container'>";
			echo "<form>";
				if($comments->num_rows > 0){
					while($row = $comments->fetch_assoc()){
						echo "<div class='row-fluid'>";
							echo "<div class='col-10'>";
							echo "<p>" . $row["text1"] . '<br>'. "User: " . $row["username"] . "</p>";
							echo "</div>";
							echo "<div class='col-12'>";
								echo "<input type='submit' name='reply' class='btn btn-primary' value='reply'/>";
							echo "</div>";
						echo "</div>";

						echo "<br><br>";
					}
				}
			echo "</form>";
		echo "</div>";

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(isset($_POST['Like'])){
				$resultş = $conn->query("UPDATE subscriber_likes_downloads_views_paper SET isLiked=1 WHERE paperID = $paperID AND username = '$user_username'");
				if(mysqli_affected_rows($result) > 0){
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
			}
            
			if(isset($_POST['Download'])){
                   $result1 = $conn->query("UPDATE subscriber_likes_downloads_views_paper SET isDownloaded=1 WHERE paperID = $paperID AND username = '$user_username'"); 
                    if (mysqli_query($conn, $result1) > 0) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
            }
			if(isset($_POST['Follow Journal'])){
                    /*$result = $conn->query("INSERT INTO subscriber_follows_journal (username, journal_name) 
                        VALUES ('$username', '$journal_name')");*/
            }
            
			if(isset($_POST['submit'])){
          		$comment_input = $_POST["comment"];
                if($comment_input != '' ){
               		$commentID = rand();
               		$result = $conn->query("SELECT commentID FROM comment WHERE commentID = $commentID");
               		while(mysqli_num_rows($result) > 0){
               			$commentID = rand();
               			$result = $conn->query("SELECT commentID FROM comment WHERE commentID = $commentID");
               		}

               		
                    $result = $conn->query("INSERT INTO comment (commentID, text1, date1) VALUES ($commentID, '$comment_input', date('Y-M-D'))");
                    $result2 = $conn->query("INSERT INTO subscriber_comment_paper (username, paperID, commentID) VALUES ('$user_username', $paperID, $commentID)");
				}
			}
			
			if(isset($_POST['FormBtn'])){
				$result = $conn->query("SELECT * FROM subscriber WHERE username = '$user_username'");
				$row = $result->fetch_assoc();
				$_SESSION['username'] = $user_username;
				
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$togo = substr($actual_link, 0, strpos($actual_link, '/ViewPaperPage.php'));
				
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
        }
  	?>

  </body>
</html>