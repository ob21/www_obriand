<?php
     
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
 
    if ( !empty($_POST)) {
        // keep track validation errors
		$passError = null;
        $nameError = null;
         
        // keep track post values
		$pass = $_POST['pass'];
        $name = $_POST['name'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Entrer un nom valide, non vide';
            $valid = false;
        }
		
		if ($pass!='2103') {
            $passError = 'Entrer un mot de passe valide';
            $valid = false;
        }
         
        // test city
        if ($valid) {
            $url = "http://api.openweathermap.org/data/2.5/weather?q=".$name."&lang=fr&units=metric&APPID=56be7192b69f7116538006ce67cd4e3c";
            $response = file_get_contents($url);
            //echo "<font color='#FFFFFF'>response=".$url."</font>";
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
                        <h3><font color='#FFFFFF'>Tester la meteo d'une ville</font></h3>
                    </div>
					</div>
					
					<div class="row">
					<div class="col-md-4">
                        <h3><?php
                            if(!empty($response)) {
                                $content = json_decode($response, true);
                                //echo "<font color='#FFFFFF'>";
                                //echo $response;
                                //echo "</font><br/>";
                                echo "<font color='#FFFFFF'>";
                                echo "lon=".$content['coord']['lon'].","." lat=".$content['coord']['lat'];
                                echo "</font><br/>";
                                echo "<font color='#FFFFFF'>";
                                echo "weather=".$content['weather'][0]['description'];
                                echo "</font><br/>";
                                echo "<font color='#FFFFFF'>";
                                echo "temp=".$content['main']['temp'];
                                echo "</font><br/>";
                                echo "<font color='#FFFFFF'>";
                                echo "country=".$content['sys']['country'];
                                echo "</font><br/>";                                
                            }
                         ?></font></h3>
                    </div>
					</div>
             
					<div class="row">
					<div class="col-md-4">
			 
						<form class="form-horizontal" action="test_city.php" method="post">
						  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
							<label class="control-label"><font color='#FFFFFF'>nom</font></label>
							<div class="controls">
								<input name="name" type="text"  placeholder="nom" value="<?php echo !empty($name)?$name:'';?>" autofocus>
								<?php if (!empty($nameError)): ?>
									<span class="help-inline"><font color='#FFD700'><?php echo $nameError;?></font></span>
								<?php endif; ?>
							</div>
						  </div>						 
						  <div class="control-group <?php echo !empty($passError)?'error':'';?>">
							<label class="control-label"><font color='#FFFFFF'>pass</font></label>
							<div class="controls">
								<input name="pass" type="text" placeholder="pass" value="<?php echo !empty($pass)?$pass:'';?>">
								<?php if (!empty($passError)): ?>
									<span class="help-inline"><font color='#FFD700'><?php echo $passError;?></font></span>
								<?php endif;?>
							</div>
						  </div>
						  <div class="form-actions">
							  <button type="submit" class="btn btn-success">Tester</button>
							  <a class="btn btn-default" href="index.php">Annuler</a>
							</div>
						</form>
					</div>
				</div>
				</div>
                 
    </div> <!-- /container -->
  </body>
</html>
