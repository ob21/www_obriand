<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<-meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
		<link rel="stylesheet" href="grid.css">
		<title>Test chart</title>    
		<script src="../chart/Chart.js"></script>
	</head>
 
<body>
    <div class="container">
		  <?php				  				 
		   include 'database.php';
		   $pdo = Database::connect();
		   $sql = 'SELECT * FROM meteo WHERE city="Rennes"';
		   
		   
		   foreach ($pdo->query($sql) as $row) {
		    echo "<font color='grey'>".$row['temp']." , ".$row['date']."</font><br/>";
		   }
		   
		   echo "<br/>\n"; 
		  
		   echo "<div class='row'>\n";	
		      
		   echo "<canvas id='myChart' width='200' height='50'></canvas>\n";
		   
           echo "<script>\n";
          
           echo "var ctx = document.getElementById('myChart').getContext('2d');\n";
           echo "var myChart = new Chart(ctx, {\n";
           echo " type: 'line',\n";
           echo " data: {\n";
           echo "  labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],\n";
           echo "  datasets: [{\n";
           echo "   label: 'apples',\n";
           echo "   data: [12, 19, 3, 17, 6, 3, 7],\n";
           echo "   backgroundColor: 'rgba(153,255,51,0.4)'\n";
           echo "  }, {\n";
           echo "   label: 'oranges',\n";
           echo "   data: [2, 29, 5, 5, 2, 3, 10],\n";
           echo "   backgroundColor: 'rgba(255,153,0,0.4)'\n";
           echo "  }]\n";
           echo " }\n";
           echo "});\n";
           

           
           echo "</script>\n";
				
		   echo "</div><!--row-->\n";
		   Database::disconnect();
		  ?>
    </div> <!-- /container -->
	
</body>
  
</html>
