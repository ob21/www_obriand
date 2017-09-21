<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
		<link rel="stylesheet" href="grid.css">
		<title>Meteo</title>    
	</head>
 
<body>
    <div class="container">
		  <?php				  				 
		   include 'database.php';
		   $pdo = Database::connect();
		   
		   $sql = 'SELECT * FROM meteo WHERE DATE(date) = CURDATE() ORDER BY id DESC';
		   
		   echo "<div class='row'>";	
		   
		   // i=0;
		   foreach ($pdo->query($sql) as $row) {			
			// if(i<10) {
				echo "<div class='col-md-4' style='background-color:grey;'>";
				
				echo "<font color='#FFFFFF'>".$row['date']."</font>";
				echo "<br/><b><font color='#FFFFFF'>".$row['city']."</font></b>";
				echo "<br/><font color='#FFFFFF'>".$row['main']."</font>";
				echo "<br/><font color='#FFFFFF'>".$row['code']."</font>";
				echo "<br/><img src='http://openweathermap.org/img/w/".$row['icon'].".png'/>";
				echo "<br/><font color='#FFFFFF'>".$row['description']."</font>";
				echo "<br/><font color='#FFFFFF'>".$row['temp']." °C"."</font>";
				echo "<br/><font color='#FFFFFF'>".$row['pressure']." hpa"."</font>";
				echo "<br/><font color='#FFFFFF'>".$row['humidity']."%"."</font>";
				echo "<br/><font color='#FFFFFF'>".$row['wind_speed']."m/s"."</font>";
				
				echo "</div><!--col-->";	
				// i++;
			// } else {
				// i=0
				// echo "<div class='col-md-4' style='background-color:grey;'>"; 
				// echo "</div><!--col-->";
			// }   
				
		   }
				
		   echo "</div><!--row-->";
		   echo "</div><!--container-->";
		   Database::disconnect();
		  ?>
    </div> <!-- /container -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>
  
</html>