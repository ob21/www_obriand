<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé

    require 'database.php';
    $id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
		$label = $_REQUEST['label'];
		$valid = true;
	}
     
    if ( !empty($_POST)) {
        // keep track post values
		$passError = null;
		
        $id = $_POST['id'];		
		$label =  $_POST['label'];		
		$pass = $_POST['pass'];
		
		$valid = true;	

		if ($pass!='2103') {
            $passError = 'Please enter a valid pass';
            $valid = false;
        }		
         
		if ($valid) {
			// delete data
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM links  WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			Database::disconnect();
			header("Location: index.php");
		}
         
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
							<h3>Delete a link</h3>
						</div>
                    </div>
                     
					<div class="row">
						<div class="col-md-4">
					 
							<form class="form-horizontal" action="delete.php" method="post">
							  <input type="hidden" name="id" value="<?php echo $id;?>"/>
							  <input type="hidden" name="label" value="<?php echo $label;?>"/>
							  <p class="alert alert-error">Are you sure to delete <?php echo "<b>'".$label."'</b>";?>?</p>
							  <div class="control-group <?php echo !empty($passError)?'error':'';?>">
								<label class="control-label">pass</label>
								<div class="controls">
									<input name="pass" type="text" placeholder="pass" value="<?php echo !empty($pass)?$pass:'';?>">
									<?php if (!empty($passError)): ?>
										<span class="help-inline"><?php echo $passError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  <div class="form-actions">
								  <button type="submit" class="btn btn-danger">Yes</button>
								  <a class="btn btn-default" href="index.php">No</a>
								</div>
							</form>
				
						</div>
                    </div>	
				</div>
                 
    </div> <!-- /container -->
  </body>
</html>