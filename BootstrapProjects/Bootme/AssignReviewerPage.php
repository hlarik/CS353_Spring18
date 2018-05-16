<<<<<<< HEAD
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
					<a class="nav-link" href="Login.php">Sign out</a>
				</li>
			</ul>
		</div>
	</nav>

	<br><br>
	<div class="container">
		<header id="headerSection">
			<div class="overlay">
				<h1>Assign Reviewer</h1>
			</div>
		</header>
    </div>
	<br><br>
	
	<div class="container">	
		<form>
			<div class="form-group">
				<select class="custom-select" name="conference" required>
					<option value="">Conference Name</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
				<div class="invalid-feedback">Example invalid custom select feedback</div>
			
				<select class="custom-select" name="reviewer" required>
					<option value="">Reviewer Name</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
				<div class="invalid-feedback">Example invalid custom select feedback</div>
			</div>
               
                  

			<div class="col-10">
				<input class="btn-lg btn-outline-success my-2 my-sm-0" type="submit" name="assignppr" value="Assign Paper">
			</div>
        </form>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
=======

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
				<!-- <li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
				</li> -->
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
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				if(isset($_POST['search'])){
					$conference_name  = $_POST["$conference_name "];
					$result = $conn->query("SELECT username FROM conference_reviewer WHERE conference_name = '$conference_name'");
                    $name1=$result["name"];
                    
						}

				}
			
		?>
    
    
    
	<div class="jumbotron text-center">
		<div class="container">
			<h5> Assign Reviewer </h5>
		</div>
	</div>
	
	<div class="container">	
		<form>
			<div class="form-row">
				<div class="col-10">
					<input class="form-control form-control-lg" type="text" placeholder="Enter conference name ">
				</div>
				<div class="col-2">
					<button class="btn-lg btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</div>
                
                 <div class="form-group row">
                  </fieldset>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          
                        </label>
                      </div>
                    </div>
      
      
      
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                        </label>
                      </div>
                    </div>
                      
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                        </label>
                      </div>
                    </div>
                  </div>


                    <div class="col-10">
                        <button class="btn-lg btn-outline-success my-2 my-sm-0" type="submit">Assign Paper</button>
                    </div>
                </div>
            </form>

	</div>

	
	<!-- <div class="container-fluid text-center text-md-left">
		<div class="container">
			<div class="navbar-text pull-left">
				<p>copyright PURE Digital Library 2018</p>
			</div>
		</div>
	</div> -->
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
>>>>>>> 7e99a2162bb1298affda6291d203d98862c9e7ab
</html>