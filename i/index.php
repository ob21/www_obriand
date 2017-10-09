<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css">
		<link rel="stylesheet" href="grid.css">
		<title>voilier brandi</title>    
	</head>
 
<body>
	<?php			
		include 'auth.php';	
	?>
    <div class="container">
		  <?php				   		   
		   include 'database.php';
		   $pdo = Database::connect();
		   $sql = 'SELECT * FROM links ORDER BY id DESC';
		   
		   echo "<div class='row'>";	
		   
		   echo "<div class='col-md-4 with-background' align='center'>";
		   echo "<div style='background-color: #EEEEEE; height:180px; line-height: 200px'>";
		   echo "<a href='create.php' class='btn btn-success'>Create</a>";
		   echo "</div><!--background-->";
		   echo "</div><!--col-->";
		   
		   foreach ($pdo->query($sql) as $row) {			
		   
				echo "<div class='col-md-4 with-background'>";
				
				echo "<div style='background-color: #EEEEEE; height: 180px'>";
				
				echo "<div class='row'>";	
				
				echo "<div class='col-md-12' align='center'>";
				echo "<br/>"."<a target='_blank' href='".$row['url']."'><h3>".$row['label']."</h3></a>";
				echo "</div><!--col-->";
				
				echo "<div class='col-md-12' align='center'>";
				echo "<a class='btn btn-default' href='read.php?id=".$row['id']."'>Read</a>";
				echo "<a class='btn btn-warning' href='update.php?id=".$row['id']."'>Update</a>";
				echo "<a class='btn btn-danger' href='delete.php?id=".$row['id']."&label=".$row['label']."'>Delete</a>";
				echo "</div><!--col-->";
				
				echo "</div><!--row-->";	
				
				echo "</div><!--background-->";
				
				echo "</div><!--col-->";					
		   }
				
		   echo "</div><!--row-->";
		   echo "</div><!--container-->";
		   Database::disconnect();
		  ?>
    </div> <!-- /container -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	
</body>
  
</html>