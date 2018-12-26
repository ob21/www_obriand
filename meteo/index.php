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
		   foreach ($pdo->query($sql1) as $row) {
		   }
		   
		   $max_date = substr_replace($row[0],'%',-6);
		   //echo "<font color='#FFFFFF'>max date = ".$max_date."</font>";
		   
		   $sql2 = 'SELECT city,temp,icon,date FROM meteo WHERE date LIKE \''.$max_date.'\'';
		   //echo "<font color='#FFFFFF'>sql2 = ".$sql2 ."</font>";
		   
		   echo "<b><a href='add_city.php'><font color='#FFFFFF'>Ajouter</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<b><a href='delete_city.php'><font color='#FFFFFF'>Supprimer</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<b><a href='test_city.php'><font color='#FFFFFF'>Tester</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='get_cities.php'><font color='#333333'>Lister</font></a>";
		   
		   echo "<div class='row'>";	
		   
		   foreach ($pdo->query($sql2) as $row) {		
				echo "<div class='col-md-4' style='background-color:grey;'>";	
				//echo "<font color='#FFFFFF'>icon = ".$row['icon']."</font>";	
				//echo "<font color='#FFFFFF'>date = ".$row['date']."</font><br/>";						
				echo "<a href='city.php?city=".$row['city']."'>";
				echo "<b><font size='4' color='#FFFFFF'>".$row['city']."</font></b>";				
				echo "&nbsp;<img src='http://openweathermap.org/img/w/".$row['icon'].".png'/>";
				echo "&nbsp;<font color='#FFFFFF'>".$row['temp']."°C</font>";
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
