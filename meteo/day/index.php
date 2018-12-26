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
		   $sql1 = 'SELECT MAX(date) FROM meteo';
		   
		   // $nbcities = 0;
		   foreach ($pdo->query($sql1) as $row) {
			   // $nbcities++;
			   echo "<font color='#FFFFFF'>max date = ".$row[0]."</font>";
		   }
		   
		   $date = date("Y-m-d");
		   $sql2 = 'SELECT city,temp,icon,date FROM meteo WHERE date >= \''.$date.' 00:00:00\' GROUP BY city ORDER by date';
		   echo "<font color='#FFFFFF'>nb cities = ".$row['nbcities']."</font>";
		   
		   echo "<b><a href='add_city.php'><font color='#FFFFFF'>Ajouter</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<b><a href='delete_city.php'><font color='#FFFFFF'>Supprimer</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='get_cities.php'><font color='#333333'>Lister</font></a>";
		   
		   echo "<div class='row'>";	
		   
		   foreach ($pdo->query($sql2) as $row) {		
				echo "<div class='col-md-4' style='background-color:grey;'>";	
				//echo "<font color='#FFFFFF'>icon = ".$row['icon']."</font>";	
				echo "<font color='#FFFFFF'>date = ".$row['date']."</font><br/>";						
				echo "<a href='city.php?city=".$row['city']."'>";
				echo "<b><font color='#FFFFFF'>".$row['city']."</font></b>";
				echo "&nbsp;<font color='#FFFFFF'>".$row['temp']."°C</font>";
				echo "&nbsp;<img src='http://openweathermap.org/img/w/".$row['icon'].".png'/>";
				echo "</a>";
				echo "</div><!--col-->";					
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