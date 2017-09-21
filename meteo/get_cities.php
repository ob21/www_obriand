<?php				  				 
include 'database.php';

$pdo = Database::connect();
$sql = 'SELECT * FROM cities';

foreach ($pdo->query($sql) as $row) {										
	echo $row['name'].",";				
}
	
Database::disconnect();
?>