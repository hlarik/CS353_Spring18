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

			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				if(isset($_POST['search'])){
					$search_input = $_POST["search_input"];
					$search_by = $_POST["gridRadios"];
					$sort_by = $_POST["sortRadios"];
					$language = $_POST["language"];
					$status = $_POST["status"];
					$year = $_POST["year"];
					
					if($search_by == "option1"){
						$searchtype = 1;
					}
					elseif ($search_by == "option2") {
						$searchtype = 2;
					}
					elseif ($search_by == "option3") {
						$searchtype = 3;
					}
					elseif ($search_by == "option4") {
						$searchtype = 4;
					}
					elseif ($search_by == "option5") {
						$searchtype = 5;
					}
					
					if($sort_by == "option6"){
						$sorttype = 1;
					}
					elseif ($sort_by == "option7") {
						$sorttype = 2;
					}
					elseif ($sort_by == "option8") {
						$sorttype = 3;
					}

					if( $search_input != '' ){
						//$result = $conn->query("SELECT * FROM scientific_research_paper WHERE username = '$user_username' AND password = '$user_password'");
						
						//if(mysqli_num_rows($result) > 0){
							$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							$togo = substr($actual_link, 0, strpos($actual_link, '/SearchPage.php'));
							$togo = $togo . "/ResultsPage.php";
							//echo $togo;
							$_POST['user_username'] = $user_username;
							$_POST['search_input'] = $search_input;
							$_POST['gridRadios'] = $searchtype;
							$_POST['sortRadios'] = $sorttype;
							$_POST['language'] = $language;
							$_POST['status'] = $status;
							$_POST['year'] = $year;
							header("Location: $togo?search_input=".$search_input);
						//}
						//else{
						//}
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
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#AuthorProfilePage.php">My Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Our Team</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sign out</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="jumbotron text-center">
			<div class="container">
				<h1>PURE Digital Library</h1>
			</div>
		</div>
		
		<div class="container">	
			<form action="SearchPage.php" method="POST">
				<div class="form-row">
					<div class="col-10">
						<input class="form-control form-control-lg" type="text" name="search_input" placeholder="Search for articles">
					</div>
					<div class="col-2">
						<input class="btn-lg btn-outline-success my-2 my-sm-0" type="submit" name="search" value="search">
					</div>
				</div>
		
				<fieldset class="form-group pt-5">
					<div class="row">
						<legend class="col-form-label col-sm-2 pt-0">Search by:</legend>
						<div class="col-sm-3">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
								<label class="form-check-label" for="gridRadios1">
								Title
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
								<label class="form-check-label" for="gridRadios2">
								Author
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
								<label class="form-check-label" for="gridRadios3">
								Journal
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
								<label class="form-check-label" for="gridRadios4">
								Institution
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios5" value="option5">
								<label class="form-check-label" for="gridRadios5">
								Conference
								</label>
							</div>
						</div>
					  
						<div class="col-sm-2">
							<div class="row">
							<label for="StatusSelect" class="col-sm-2 col-form-label">Status </label>
							</div>
							<div class="row">
							<label for="LangSelect" class="col-sm-2 col-form-label">Language </label>
							</div>
							<div class="row">
							<label for="YearSelect" class="col-sm-2 col-form-label">Year </label>
							</div>		
						</div>
						<div class="col-3">	
							<div class="row">
								<select class="form-control form-control-sm" id="StatusSelect" name="status">
									<option>Accepted</option>
									<option>On review (Pending)</option>
									<option>Submitted</option>
									<option>Rejected</option>
								</select>
							</div>		
							<div class="row pt-2">
								<select class="form-control form-control-sm" id="LangSelect" name="language">
									<option>English</option>
									<option>Turkish</option>
								</select>
							</div>		
		
							<div class="row pt-2">	
								<select class="form-control form-control-sm" id="YearSelect" name="year">
									<option>2010-2020</option>
									<option>2000-2010</option>
									<option>1990-2000</option>
								</select>
							</div>		
						</div>
					</div>
					<div class="row pt-5">
						<legend class="col-form-label col-sm-2 pt-0">Sort by:</legend>
						<div class="col-sm-3">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sortRadios" id="sortRadios1" value="option6" checked>
								<label class="form-check-label" for="sortRadios1">
								Views
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sortRadios" id="sortRadios2" value="option7">
								<label class="form-check-label" for="sortRadios2">
								Likes
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sortRadios" id="sortRadios3" value="option8">
								<label class="form-check-label" for="sortRadios3">
								Downloads
								</label>
							</div>
						</div>
					</div>
				</fieldset>
			</form>

		</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>