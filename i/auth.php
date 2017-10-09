<div class="container">
    <?php
        //echo "---AUTH---";
        
        $passes = array("delphine", "puce", "pass", "olivier", "briand", "go", "thierry");
        
        if ( !empty($_POST)) {
            $pass = $_POST['pass'];
            
            $valid = true;
            if (empty($pass)) {
                $passError = 'Entrer un pass valide, non vide';
                $valid = false;
            }
            if (!in_array(strtolower($pass), $passes)) {
                $passError = 'Entrer un pass valide';
                $valid = false;
            }
            echo $valid;
            if ($valid) {
                setcookie('pass', $pass, (time() + 1200));  
                header("Location: ".$_SERVER['PHP_SELF']);
            }
        }       
        
        $cookie = $_COOKIE['pass'];
        if($cookie=="") {
            ?>
            <div class="span10 offset1">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Votre pass ?</h3>
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
            <?php       
            exit("");
        }   
        //echo "---END AUTH---";
    ?> 
</div>