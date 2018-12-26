
<?php
	//echo "---AUTH---";
	
	$passes = array("go");
	
	function update($pass) {
	    return $pass.date("H");		    
	}
	$passes = array_map("update", $passes);

	
	if(!isset($_COOKIE['pass'])) {
		foreach(getallheaders() as $name => $value) {	
			if($name=='Pass') {
				$pass=$value;
				if (!in_array(strtolower($pass), $passes)) {	
					$error = '500 Forbidden';
					exit($error);
				} else {
					setcookie('pass', $pass, (time() + 1200));	
					header("Location: ".$_SERVER['PHP_SELF']);
				}
			}
		}
	}
	
	if ( !empty($_POST)) {
		$valid = true;	
		$pass = $_POST['pass'];
		
		if (empty($pass)) {
			$passError = 'Entrer un pass valide, non vide';
			$valid = false;
		}
		if (!in_array(strtolower($pass), $passes)) {
			$passError = 'Entrer un pass valide';
			$valid = false;
		}
		if ($valid) {
			setcookie('pass', $pass, (time() + 1200));	
			header("Location: ".$_SERVER['PHP_SELF']);
		}
	}	
	
	
	$cookie = $_COOKIE['pass'];
	if($cookie=="") {
		?>
		<div class="container">
			<div class="span10 offset1">
				<div class="row">
					<div class="col-md-4">
						<h3>Votre code ?</h3>
					</div>
				</div>				 
				<div class="row">
					<div class="col-md-4">				 
						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<div class="control-group <?php echo !empty($passError)?'error':'';?>">
								<label class="control-label"><font color='#FFFFFF'>pass</font></label>
								<div class="controls">
									<input name="pass" type="text" placeholder="pass" value="" autofocus>
								</div>
								<?php if (!empty($passError)): ?>
									<span class="help-inline"><font color='#FFD700'><?php echo $passError;?></font></span>
								<?php endif; ?>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success">Essayer</button>
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div></body></html>
		<?php		
		exit("");
	} 	
	//echo "---END AUTH---";
?> 

