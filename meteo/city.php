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
		   if ( !empty($_GET['city'])) {
		     $city = $_REQUEST['city'];
		   }
		   
		   $pdo = Database::connect();
		   
		   $sql = 'SELECT * FROM meteo WHERE city="'.$city.'" ORDER BY id DESC';
		   
		   echo "<b><font color='#FFFFFF'>".$city."</font></b>";
		   
		   echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		   echo "<a href='city_details.php?param=max_ete_2017&city=".$city."'><font color='#FFFFFF'>max jour été 2017</font></a>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='city_details.php?param=min_ete_2017&city=".$city."'><font color='#FFFFFF'>min jour été 2017</font></a>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='city_details.php?param=max_ete_2018&city=".$city."'><font color='#FFFFFF'>max jour été 2018</font></a>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   echo "<a href='city_details.php?param=min_ete_2018&city=".$city."'><font color='#FFFFFF'>min jour été 2018</font></a>";
		   echo "<b>&nbsp;&nbsp;</b>";
		   
		   echo "<div class='row'>";	
		   
		   foreach ($pdo->query($sql) as $row) {			
				$backcolor = "background-color:grey;";
				if(strpos($row['date'], '6:')) {
					$backcolor = "background-color:#696969;";
				}
				if(strpos($row['date'], '10:')) {
					$backcolor = "background-color:#808080;";
				}
				if(strpos($row['date'], '13:')) {
					$backcolor = "background-color:#A9A9A9;";
				}
				if(strpos($row['date'], '18:')) {
					$backcolor = "background-color:#C0C0C0;";
				}
				echo "<div class='col-md-12' style='".$backcolor."'>";	
				echo "<table>";
				echo "<tr>";
				echo "<td>";				
				echo "<font color='#FFFFFF'>".$row['date']."</font>";
				echo "</td>";
				echo "<td>";
				echo "&nbsp;&nbsp;&nbsp;<img src='http://openweathermap.org/img/w/".$row['icon'].".png'/>";
				echo "</td>";
				echo "<td>";
				echo "&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['description']."</font>";
				echo "<br/>&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['temp']." °C"."</font>";
				echo "</td>";
				echo "<td>";
				echo "&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['pressure']." hpa"."</font>";
				echo "</td>";
				echo "<td>";
				echo "&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['humidity']."%"."</font>";
				echo "</td>";
				echo "<td>";
				echo "&nbsp;&nbsp;&nbsp;<font color='#FFFFFF'>".$row['wind_speed']."m/s"."</font>";
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
