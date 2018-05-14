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

  	<?php
		//create connection
		$url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
		$username = "elbin.gunay";
        $password = "tkprf6jn";
        $dbname = "elbin_gunay";

		$conn = mysqli_connect($url, $username, $password, $dbname);

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		//$user_username = $_GET['user_username'];
		$user_username = "HaruChan";

		//give a predefined paperID for now
		//$paperID = $_GET['paperID'];
		$paperID = 1001;

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
                    $result = $conn->query("INSERT INTO subscriber_follows_journal (username, journal_name) 
                        VALUES ('$username', '$journal_name')");
            }
            
          if(isset($_POST['submit'])){
                   if($comment_input != '' ){
                        $result = $conn->query("INSERT INTO subscriber_comment_paper (date, text, username, paperID) 
                            VALUES ('$date', '$text', '$username', '$paperID')");
                   }   
          }
        }
  	?>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">PURE Digital Library</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="nav navbar-nav right">
				<li class="active">
					<a class="nav-link" href="SearchPage.html">Home</a>
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
	
	<div class="container">	

		

		
		<form action="ViewPaperPage.php" method="POST">
			<div class="row pt-5">
				<div class="col-10">
					<div class="embed-responsive embed-responsive-4by3">
					  <iframe class="embed-responsive-item" src="Content/Project Design Report.pdf" type="application/pdf"></iframe>
					</div>
				</div>
				<div class="col-2">
					<div class="btn-group-vertical">
						<input class="btn-md btn-primary my-2" type="submit" name="Like" value="Like" ng-click="levelOU()"/>
						<input class="btn-md btn-primary my-2" type="submit" name="Download" value="Download"/>
						<input class="btn-md btn-primary my-2" type="submit" name="Follow Journal" value="Follow Journal"/>
					</div>
				</div>
			</div>

			<div class="form-row pt-5">
				<div class="form-group col-8">
					<label for="commentArea">Write a comment:</label>
					<textarea class="form-control" id="commentArea" rows="3"></textarea>
					<button class="btn-sm btn-primary my-2" type="submit">submit</button>
				</div>
			</div>
		</form>
	</div>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>