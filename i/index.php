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
	    ini_set("display_errors", 1);
	    error_reporting(E_ALL & ~E_NOTICE);	
		if($_SERVER['SERVER_NAME']!='localhost') {
		    include 'auth.php';
		}
	?>
    <div class="container">
		  <?php		

			$input_tag = null;
			if ( !empty($_GET['tag'])) {
				$input_tag = $_REQUEST['tag'];			
			}
		  
		   if($_SERVER['SERVER_NAME']=='localhost') {
		       echo "dev mode."."<p/>";
		       include 'database_dev.php';
		   } else {
		       include 'database.php';
		   }
		   
		   $pdo = Database::connect();
		   $sql = 'SELECT * FROM links ORDER BY id DESC';
		   
		   echo "<div class='row'>";	
		   
		   echo "<div class='col-md-12 with-background' align='center'>";
		   echo "<div style='background-color: #EEEEEE; '>";	

		   $alltags = "";
		   foreach ($pdo->query($sql) as $row) {
			   $rowtags = explode(",", $row['tags']);
			   foreach($rowtags as $rowtag) {
					if (!(strpos($alltags, trim($rowtag)) !== false)) {						
						if(!empty(trim($rowtag))) {
							$alltags.=trim($rowtag).",";
						}						
					}
			   }			   
		   }		   		   
		   if($alltags=="") {		   
				echo "<br/><span class='btn btn-danger outline'>no tags</span>";		   
		   } else {
				$tags = explode(",", $alltags);
				echo "<br/>";
				echo "<a href='index.php' class='btn btn-info outline'>tout</a>&nbsp;";
				asort($tags);
				foreach ($tags as $tag){
					if(!empty($tag)) {					
						echo "<a href='index.php?tag=".$tag."' class='btn btn-info outline'>".$tag."</a>&nbsp;";
					}
				}					
		   }	
	   
		   echo "<br/><a href='create.php' class='btn btn-success'>Creer un lien</a>";
		   echo "</div><!--background-->";
		   echo "</div><!--col-->";
		   echo "</div>";
		   
		   echo "<div class='row'>";
		   
		   foreach ($pdo->query($sql) as $row) {	
		   
				if(empty($input_tag) || (strpos($row['tags'], $input_tag) !== false)) {
		   
					echo "<div class='col-md-4 with-background'>";
					
					echo "<div style='background-color: #EEEEEE; height: 220px'>";
					
					echo "<div class='row'>";	
					
					echo "<div class='col-md-12' align='center'>";
					
					// echo "tags = ".$row['tags'];
					// echo " | input_tag = ".$input_tag;
					// if(strpos($row['tags'], $input_tag) !== false) {
						// echo " contain tag";
					// } else {
						// echo " doesnt contain tag";
					// }
					
					echo "<br/>"."<a target='_blank' href='".$row['url']."'><h3>".$row['label']."</h3></a>";
					if($row['tags']=="") {
						echo "<br/><h6>&nbsp;&nbsp;&nbsp;</h6>";					
					} else {
						$tags = explode(",", $row['tags']);
						echo "<br/>";
						foreach ($tags as $tag){
							echo "<span class='badge'>".$tag."</span>&nbsp;";
						}					
					}				
					echo "</div><!--col-->";
					
					echo "<div class='col-md-12' align='center'>";
					//echo "<a class='btn btn-default' href='read.php?id=".$row['id']."'>Consulter</a>";
					echo "<a class='btn btn-warning' href='update.php?id=".$row['id']."'>Mettre a jour</a>";
					echo "<a class='btn btn-danger' href='delete.php?id=".$row['id']."&label=".$row['label']."'>Supprimer</a>";
					echo "</div><!--col-->";
					
					echo "</div><!--row-->";	
					
					echo "</div><!--background-->";
					
					echo "</div><!--col-->";					
					
				}
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
