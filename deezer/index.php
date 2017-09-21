<?php
	
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé

    $code = null;
    if ( !empty($_GET['code'])) {
        $code = $_REQUEST['code'];
		echo $code;
    }
	
	if ( !empty($_POST)) {
        $code = $_POST['code'];		
		echo $code;
	}
?>