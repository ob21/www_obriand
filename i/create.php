<?php
     
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le pass�
	 
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
		$passError = null;
        $nameError = null;
        $urlError = null;
         
        // keep track post values
		$pass = $_POST['pass'];
        $label = $_POST['label'];
        $url = $_POST['url'];
		$tags = $_POST['tags'];
         
        // validate input
        $valid = true;
        if (empty($label)) {
            $labelError = 'Entrez un label';
            $valid = false;
        }
		
		if ($pass!='2103') {
            $passError = 'Entrez un mot de passe valide';
            $valid = false;
        }
         
        if (empty($url)) {
            $urlError = 'Entrez une url';
            $valid = false;
        } else if ( !filter_var($url,FILTER_VALIDATE_URL) ) {
            $urlError = 'Entrez une url valide';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO links (label,url,tags) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($label,$url,strtolower($tags)));
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
                        <h3>Creer un lien</h3>
                    </div>
					</div>
             
					<div class="row">
					<div class="col-md-4">
			 
						<form class="form-horizontal" action="create.php" method="post">
						  <div class="control-group <?php echo !empty($labelError)?'error':'';?>">
							<label class="control-label">label</label>
							<div class="controls">
								<input name="label" type="text"  placeholder="label" value="<?php echo !empty($label)?$label:'';?>" autofocus>
								<?php if (!empty($labelError)): ?>
									<span class="help-inline"><?php echo $labelError;?></span>
								<?php endif; ?>
							</div>
						  </div>
						  <div class="control-group <?php echo !empty($urlError)?'error':'';?>">
							<label class="control-label">url</label>
							<div class="controls">
								<input name="url" type="text" placeholder="url" value="<?php echo !empty($url)?$url:'https://obriand.fr/wiki/doku.php?id=';?>">
								<?php if (!empty($urlError)): ?>
									<span class="help-inline"><?php echo $urlError;?></span>
								<?php endif;?>
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label">tags (separes par virgule)</label>
							<div class="controls">
								<input name="tags" type="text" placeholder="tags" value="<?php echo !empty($tags)?$tags:'';?>">
							</div>
						  </div>
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
							  <button type="submit" class="btn btn-success">Creer</button>
							  <a class="btn btn-default" href="index.php">Annuler</a>
							</div>
						</form>
					</div>
				</div>
				</div>
                 
    </div> <!-- /container -->
  </body>
</html>