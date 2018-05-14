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
        if(isset($_POST['signup'])){
          $user_username = $_POST["username"];
          $user_password = $_POST["password"];
          $email = $_POST["email"];
          $name = $_POST["name"];
          $priviligeID = $_POST["gridRadios"];
          $country = $_POST["country"];
          $city = $_POST["city"];
          $street = $_POST["street"];
          $zipcode = $_POST["zipcode"];

          if($priviligeID == "option1"){
            $usertype = 1;
          }
          elseif ($priviligeID == "option2") {
            $usertype = 2;
          }
          elseif ($priviligeID == "option3") {
            $usertype = 3;
          }
          elseif ($priviligeID == "option4") {
            $usertype = 4;
          }

          if($user_username != '' && $user_password != '' && $email != '' && $name != '' && $priviligeID != ''){
            //$result = $conn->query("INSERT INTO subscriber (username, password, privilegeID, email, name, country, city, street, zipcode) VALUES ('$user_username', '$user_password', '$privilegeID', '$email', '$name', '$country', '$city', '$street', '$zipcode')");
            $result = $conn->query("INSERT INTO subscriber (username, password, privilegeID, email, name, country, city, street, zipcode) 
                                  VALUES ('$user_username', '$user_password', $usertype, '$email', '$name', '$country', '$city', '$street', $zipcode)");
            if($result){
              $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              $togo = substr($actual_link, 0, strpos($actual_link, '/signupPage.php'));
              $togo = $togo . "/LoginPage.php";
              //echo $togo;
              header("Location: $togo");
            }
            else{
              /*$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              $togo = substr($actual_link, 0, strpos($actual_link, '/signupPage.php'));
              $togo = $togo . "/LoginPage.php";
              //echo $togo;
              header("Location: $togo");*/
            }
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
				<li class="nav-item">
					<a class="nav-link" href="About.php">About</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<img class="img-responsive" src="photo11.png" alt="">
	</div>
      

	<form action="signupPage.php" method="POST">
		<div class="container">    
			<div class="form-group row ">
				<label for="inputUserName" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="inputUserName" class="form-control" id="inputUserName" name="username" placeholder="max 20 character" required data-bv-notempty-message="Please fill the blank">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="inputPassword" name="password" placeholder="max 20 character" required data-bv-notempty-message="Please fill the blank">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputEmail" class="col-sm-2 col-form-label">e-mail</label>
				<div class="col-sm-6">
					<input type="inputEmail" class="form-control" id="inputEmail" name="email" placeholder="" required data-bv-notempty-message="Please fill the blank">
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="inputName" class="form-control" id="inputName" name="name" placeholder="max 40 character" required data-bv-notempty-message="Please fill the blank">
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
				<div class="col-sm-6">
					<input type="inputCountry" class="form-control" id="inputCountry" name="country" placeholder="">
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="inputCity" class="col-sm-2 col-form-label">City</label>
				<div class="col-sm-6">
					<input type="inputCity" class="form-control" id="inputCity" name="city" placeholder="">
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="inputStreet" class="col-sm-2 col-form-label">Street</label>
				<div class="col-sm-6">
					<input type="inputStreet" class="form-control" id="inputStreet" name="street" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputZip" class="col-sm-2 col-form-label">Zip-code</label>
				<div class="col-sm-6">
					<input type="inputZip" class="form-control" id="inputZip" name="zipcode" placeholder="">
				</div>
			</div>
			
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Choose User Type</legend>
					<div class="col-sm-6">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
							<label class="form-check-label" for="gridRadios1">Author</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
							<label class="form-check-label" for="gridRadios2">Editor</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" >
							<label class="form-check-label" for="gridRadios3">Reviewer</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4" checked>
							<label class="form-check-label" for="gridRadios4">Regular User</label>
						</div>         
					</div>
				</div>
			</fieldset>
		  
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="submit" class="btn btn-primary" name="signup"/>
				</div>
			</div>
		</div>
	</form>	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#notEmptyForm').bootstrapValidator();
        });
    </script>
  </body>
</html>