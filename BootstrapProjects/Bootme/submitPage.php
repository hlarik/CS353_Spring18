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
          
       /*   $conferenceName ="";
            
          if($conference == "One"){
            $conferenceName = "One";
          }
          elseif ($conference == "Two") {
            $usertype = "Two";
          }
          elseif ($conference == "Three") {
            $usertype = "Three";
          }*/

       //   if($title != '' && $language != '' && $page != '' && $date != '' && $conferenceName != ''){
            //$result = $conn->query("INSERT INTO subscriber (username, password, privilegeID, email, name, country, city, street, zipcode) VALUES ('$user_username', '$user_password', '$privilegeID', '$email', '$name', '$country', '$city', '$street', '$zipcode')");
            $result = $conn->query("INSERT INTO scientific_research_paper (paperID, title, status, page_number, language, release_date) 
                                  VALUES ($paperID, '$title', $status, $page, '$language', $date)");
          /*  if($result){
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
             
        //    }
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
 
      
      <!--<div class="container">
          <img class="img-responensive" src="aaaaa.png" alt="">
      </div>-->
          
      
      <header id="headerSection">
          <div class="overlay">
             
                      <h1 class="text-center">SUBMIT PAPER</h1>
               
          </div>
      </header>
      
      
      
      
  
    
    
         <div class=container>
          <form action="submitPage.php" method="POST">   
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                      <input type="title" class="form-control" id="title" name="title"> 
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-2 col-form-label">Page Number</label>
                  <div class="col-sm-10">
                      <input type="page" class="form-control" id="page" name="page">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
                      <input type="language" class="form-control" id="language" name="language" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-2 col-form-label">Release Date</label>
                  <div class="col-sm-10">
                      <input type="date" class="form-control" id="date" name="date">
                  </div>
              </div>
              
              
              <div class="form-group row">
                  <select class="custom-select" name="conference" required>
                      <option value="">Conference Name</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                  </select>
                  <div class="invalid-feedback">Example invalid custom select feedback</div>
              </div>
              
              <input type="submit" class="btn btn-outline-primary" name="button1" value ="Upload File">  
            </form>
          </div>
      

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

    
    
    
    
    
    
    
    