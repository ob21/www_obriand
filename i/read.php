<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé

    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM links where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" href="grid.css">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
						<div class="col-md-4">
							<h3>Lire un lien</h3>
						</div>
                    </div>
					
					<div class="row">
						<div class="col-md-4">
							 
								<div class="form-horizontal" >
								  <div class="control-group">
									<label><?php echo $data['label'];?></label>
								  </div>
								  <div class="control-group">
									<label><?php echo $data['url'];?></label>
								  </div>
								  <div class="control-group">
									<label><?php echo $data['tags'];?></label>
								  </div>
								  <div class="form-actions">
									  <a class="btn btn-default" href="index.php">Retour</a>
								  </div>							 
								</div>

						</div>
					</div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>