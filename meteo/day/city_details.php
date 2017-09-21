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
		  <?php	ini_set('display_errors', 1);			  				 
		   include 'database.php';
		   
		   $city = null;
		   $param = null;
		   if ( !empty($_GET['city'])) {
		     $city = $_REQUEST['city'];
		   }
		   if ( !empty($_GET['param'])) {
		     $param = $_REQUEST['param'];
		   }
		   
		   $pdo = Database::connect();
		   
		   $sql = 'SELECT * FROM meteo WHERE city="'.$city.'"';		   
		   if($param=="max_ete") {
			   $sql = 'SELECT max(temp) FROM meteo WHERE city="'.$city.'"';
		   }		
		   echo $sql;		   
		   
		   echo "<b><font color='#FFFFFF'>".$city."</font></b>";
		   echo "&nbsp;&nbsp;&nbsp;".$param;
		   
		   echo "<div class='row'>";	
		   			
		   foreach ($pdo->query($sql) as $row) {		
		   
			echo "<div class='col-md-12' style='background-color:grey;'>";	
			echo "<table>";
			echo "<tr>";
			echo "<td>";				
			echo "<font color='#FFFFFF'>".$row['date']."</font>";
			echo "</td>";
			echo "<td>";
			echo "&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['temp']." °C"."</font>";
			echo "</td>";
			echo "<tr>";
			echo "</table>";
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