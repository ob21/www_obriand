<?php

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
     
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
	 
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $error = null;
         
        // keep track post values
        $city = $_POST['city'];
		$main = $_POST['main'];
		$code = $_POST['code'];
		$icon = $_POST['icon'];
		$description = $_POST['description'];
		$temp = $_POST['temp'];
		$pressure = $_POST['pressure'];
		$humidity = $_POST['humidity'];
		$temp_min = $_POST['temp_min'];
		$temp_max = $_POST['temp_max'];
		$wind_speed = $_POST['wind_speed'];
         
        // validate input
        $valid = true;
         
        if (empty($city)) {
            $error = 'city is empty';
            $valid = false;
        }
		
		if (empty($main)) {
            $error = 'main is empty';
            $valid = false;
        }
		
		if (empty($description)) {
            $error = 'description is empty';
            $valid = false;
        }
		
		if (empty($temp)) {
            $error = 'temp is empty';
            $valid = false;
        }
		
		if (empty($pressure)) {
            $error = 'pressure is empty';
            $valid = false;
        }
		
		if (empty($humidity)) {
            $error = 'humidity is empty';
            $valid = false;
        }
		 
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO meteo (city,code,icon,main,description,temp,pressure,humidity,temp_min,temp_max,wind_speed) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($city, $code, $icon, $main, $description, $temp, $pressure, $humidity, $temp_min, $temp_max, $wind_speed)); 
            Database::disconnect();
        }
    } else {
		$valid = false;
		$error = 'no values in POST';
	}

	echo $valid ? 'true' : 'false';
	if (!$valid):
		echo ":".$error;
	endif; 

?>