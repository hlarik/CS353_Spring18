<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sample PHP Database Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
</head>
<body>

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

		echo "<br>";
  
  
  $sql = "SELECT username, email, password FROM subscriber";
  $result = $conn->query($sql);
		
	echo "<div class='container'>";
		echo "<div class='row-fluid'>";
		
			echo "<div class='col-xs-6'>";
			//echo "<div class='table-responsive'>";
			
				echo "<table class='table table-hover table-inverse'>";
		  		$input = " hello";
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
							if(strcmp(trim($input), "hello")==0){
								echo "<p>" . "Meow" . "</p>";
							}
							else{
								echo "<p>" . "No meow" . "</p>";
							}
					}
				} else {
					echo "0 results";
				}

				echo "</table>";
			//echo "</div>";
			echo "</div>";
		echo "</div>";
		
	echo "</div>";
  // Close connection
  mysqli_close($link);
  ?>


</body>
</html>