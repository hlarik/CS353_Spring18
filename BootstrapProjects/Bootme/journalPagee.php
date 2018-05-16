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
					<a class="nav-link" href="#">My Profile</a>
				</li>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
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
             
             <h1 class="text-center">Journals</h1>
               
          </div>
      </header>
        
      
    <?php
     
		//create connection
		$url = "dijkstra.ug.bcc.bilkent.edu.tr" ; /////////DİKKATT///////
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

        $username = "HaruChan";
          

          
            $sql = $conn->query("SELECT * FROM subscriber_follows_journal NATURAL JOIN journal WHERE username ='$username'");
        
        
  
             echo "<div class='container'  id='search_container'>";
                    echo "<form>";
                       
                            while($data = $sql->fetch_assoc() )
                            {
                            //    while($data2 = $sql2->fetch_assoc())
                              //  {
                                //    if($data['paperID']= $data2['paperID'] )
                                  //  {
                                        echo "<div class='row-fluid'>";
                                            echo "<div class='col-10'>";
                                                echo "<p>" . "Journal Name: ". $data['journal_name'] ." " . " Topic: " . $data['topic'] . " ". " Release Date: " . $data['release_date'] . " " . " Start Date: " . $data['startDate'] . " End Date: " . $data['endDate'] . " " . "Duration: " . $data['duration']."</p>" ;
                                            echo "</div>";
                                        echo "</div>";
                                 //   }
                                //}

                            }
                        
                    echo "</form>";
		      echo "</div>";
              
              
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
          
        
      

       

		

		
  	?>
     
      
      

      

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

    
    
    
    
    
    
    
    