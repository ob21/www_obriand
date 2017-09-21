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
		   $sql = 'SELECT DISTINCT city FROM meteo ORDER BY city';
		   
		   echo "<b><a href='add_city.php'><font color='#FFFFFF'>Ajouter</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<b><a href='delete_city.php'><font color='#FFFFFF'>Supprimer</font></a></b>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='get_cities.php'><font color='#333333'>Lister</font></a>";
		   
		   echo "<div class='row'>";	
		   
		   foreach ($pdo->query($sql) as $row) {									
				echo "<div class='col-md-4' style='background-color:grey;'>";				
				echo "<br/><a href='city.php?city=".$row['city']."'><b><font color='#FFFFFF'>".$row['city']."</font></b></a>";
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