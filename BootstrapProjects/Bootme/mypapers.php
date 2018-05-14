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
					<a class="nav-link" href="#">Our Team</a>
				</li>
               <li class="nav-item">
					<a class="nav-link" href="#">Contact Us</a>
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
             
             <h1 class="text-center">My Papers</h1>
               
          </div>
      </header>
        
      
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

        $username = "HaruChan";
          

          
            $sql = $conn->query("SELECT * FROM scientific_research_paper NATURAL  JOIN (SELECT COUNT(isLiked), COUNT(isViewed),COUNT(isDownloaded), paperID FROM subscriber_likes_downloads_views_paper NATURAL JOIN author_has_paper where username = '$username' GROUP BY paperID) ");
        
            $sql2 = $conn->query("SELECT COUNT(isLiked), COUNT(isViewed),COUNT(isDownloaded), paperID FROM subscriber_likes_downloads_views_paper NATURAL JOIN author_has_paper where username = '$username' GROUP BY paperID");
    

    
    
       /*     $result = $conn->query("SELECT * FROM (SELECT DISTINCT * FROM 
                                        (SELECT DISTINCT * FROM scientific_research_paper S NATURAL JOIN author_has_paper A
                                        WHERE username = '$username'
                                        LEFT OUTER JOIN 
                                        (SELECT paperID, SUM(isViewed) AS tot_view, SUM(isLiked) AS tot_like, SUM(isDownloaded) AS tot_download FROM subscriber_likes_downloads_views_paper GROUP BY paperID) R 
                                        ON (R.paperID = T.paperID)) X 
                                        LEFT OUTER JOIN
                                        (SELECT paper_to_be_cited, COUNT(*) AS cite_no FROM paper_citation GROUP BY paper_to_be_cited) Y
                                        ON (Y.paper_to_be_cited = X.paperID)");


         echo "<div class='container'  id='search_container'>";
                    echo "<form>";
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<div class='row-fluid'>";
                                     echo "<div class='col-10'>";
                                        echo "<p>" . "Title: " . $row["title"] . '<br>'. "Author: " . $row["username"] . "<br>" . "View: " . $row["tot_view"] . 
                                            "       " . "Like: " . $row["tot_like"] . 
                                            "       " . "Download: " . $row["tot_download"] . 
                                            "       " . "Cited: " . $row["cite_no"] . "</p>";
                                    echo "</div>";
                                   
                                    echo "</div>"
                            
                            }
                        }
                 echo "</form>";
		      echo "</div>";*/

          /*  while($data = mysql_fetch_array($sql))
            {
               echo "<div class='container'>";	
				echo "<div class='form-row pt-5'>";   
                    echo "<p>" . "Title: ". $data['title'] . "Status" . $data['status'] ;
            	echo"</div>";
			   echo"</div>";
                
            }*/
            //echo "<br></br>";
  
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
                                                echo "<p>" . "Title: ". $data['title'] ." " . " Language: " . $data['language'] . " ". " Page Number: " . $data['page_number'] . " " . " Like: " . $data['COUNT(isLiked)'] . " Download: " . $data['COUNT(isDownloaded)'] . " " . "Viewed: " . $data['COUNT(isViewed)']."</p>" ;
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

    
    
    
    
    
    
    
    