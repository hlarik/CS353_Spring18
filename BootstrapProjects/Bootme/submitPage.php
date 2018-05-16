<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.css">
   
     
  </head>
  <body>
      
    <?php
     
		//create connection
		$url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
		$username = "kaan.akturk";
		$password = "12t5e5ntu";
		$dbname = "kaan_akturk";
     /*   $url = "dijkstra.ug.bcc.bilkent.edu.tr" ;
		$username = "ayse.sunar";
		$password = "rzmr3c1fn";
		$dbname = "ayse_sunar";*/


		$conn = mysqli_connect($url, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

        $status = 1; ////////?????????
        $paperID = 1; //////////////////?????
      
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(isset($_POST['button1'])){
				$title = $_POST["title"];
				$language = $_POST["language"];
				$page = $_POST["page"];
				$date = $_POST["date"];
				$conference = $_POST["conference"]; ///?????
        
				if($title != '' && $language != '' && $page != '' && $date != '' && $conferenceName != ''){
					$result = $conn->query("INSERT INTO scientific_research_paper (paperID, title, status, page_number, language, release_date) 
										VALUES ($paperID, '$title', $status, $page, '$language', $date)");
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
      
	<div class=container> 
		<br><br>  
		<header id="headerSection">
			<div class="overlay">
				<h1>SUBMIT PAPER</h1>
			</div>
		</header>
		<br><br>  
	</div>
      
	<div class=container>
		<form action="submitPage.php" method="POST">   
			<div class="form-group row">
				<label for="title" class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title"> 
				</div>
			</div>
			<div class="form-group row">
				<label for="page" class="col-sm-2 col-form-label">Page Number</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="page" name="page" >
				</div>
			</div>
			<div class="form-group row">
				<label for="language" class="col-sm-2 col-form-label">Language</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="language" name="language" >
				</div>
			</div>
			<div class="form-group row">
				<label for="date" class="col-sm-2 col-form-label">Release Date</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="date" name="date">
				</div>
			</div>

			<div class="form-group">
				<select class="custom-select" name="conference" required>
					<option value="">Conference Name</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
				<div class="invalid-feedback">Example invalid custom select feedback</div>
			</div>
	
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
			</div> 
			<input type="submit" class="btn-lg btn-primary my-2" value="submit" name="button1" >
		</form>
	</div>
      

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

    
    
    
    
    
    
    
    