<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="5" >
		<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
		<link rel="stylesheet" href="grid.css">
		<title>Meteo</title>    
	</head>
 
<body>
    <div class="container">
		  <?php				  				 
		   include 'database.php';
		   $pdo = Database::connect();
		   
		   $sql = "SELECT * FROM meteo WHERE city='Rennes' OR city='Ruoms' AND DATE(date)=CURDATE() ORDER BY id DESC LIMIT 2";
		   
		   echo "<div class='row'>";	
		   
		   // echo "<span>".$row['date']."</span>";
		   
		   echo "<div class='table-responsive'>";
		   echo "<table class='table borderless'>";
		   
		   echo "<tr>";
			   $date = date("d-m-Y");
			   $heure = date("H:i");
			   setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
			   $jour = strftime("%A %d");
			   $mois = strftime("%B %Y");
			   echo "<td>";
				echo "<h1> <font size='50pt' color='#FFA500'> ".$heure." <font> </h1>";
			   echo "</td>";
			   echo "<td>";
				echo "<h3><font color='#FFA500'>".$jour." ".$mois."<font></h3>";
			   echo"</td>";
		   echo "</tr>";
		   
		   echo "<tr>";
			   echo "<td>";		   
				   echo "<div class='table-responsive'>";
				   echo "<table class='table borderless'>";
					   echo "<tr>";		   
					   foreach ($pdo->query($sql) as $row) {													
							echo "<td>";
							$date_row = date_create($row['date']);
							echo "<font color='#FFA500'>".date_format($date_row, 'H:i:s')."</font>";
							echo "<br/><b><font color='#FFA500'>".$row['city']."</font></b>";
							// echo "<br/>".$row['main'];
							// echo "<br/>".$row['code'];
							echo "<br/><img src='http://openweathermap.org/img/w/".$row['icon'].".png'/>";
							echo "<font color='#FFA500'>".$row['temp']." °C</font>";
							echo "<br/><font color='#FFA500'>".$row['description'];				
							// echo "<br/>".$row['pressure']." hpa";
							// echo "<br/>".$row['humidity']."%";
							// echo "<br/>".$row['wind_speed']."m/s";
							echo "</font></td>";
												
					   }		   
					   echo "</tr>";
				   echo "</table>";
				   echo "</div><!--table-->";		   
			   echo "</td>";		   
			   echo "<td>";
				// echo "<h3>".$mois."</h4>";
			   echo "</td>";		   
		   echo "</tr>";
		   
		   echo "</table>";
		   echo "</div><!--table-->";
				
		   echo "</div><!--row-->";
		   echo "</div><!--container-->";
		   Database::disconnect();
		  ?>
    </div> <!-- /container -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>
  
</html>