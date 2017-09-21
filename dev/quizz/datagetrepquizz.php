<?php

  header('Access-Control-Allow-Origin: *');

  // FONCTIONS JSON
  if ( !function_exists('json_decode') ){
	require_once (dirname(__FILE__).'/lib/JSON/JSON.php');
	    function json_decode($content, $assoc=false){
			if ( $assoc ){
				$json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
			} else {
				$json = new Services_JSON;
			}
			return $json->decode($content);
		}
	}
	 
	if ( !function_exists('json_encode') ){
		require_once (dirname(__FILE__).'/lib/JSON/JSON.php');
		function json_encode($content){
			$json = new Services_JSON;
			return $json->encode($content);
	    }
  }
  
  // CONNEXION BASE DE DONNEES
  mysql_connect("mysql5-2","obrianddata","uE3VkY0T");
  mysql_select_db("obrianddata");
  //$sql=mysql_query("SELECT * FROM quizz_rep");
  $sql=mysql_query("SELECT reponse_a,reponse_b,reponse_c,reponse_d,COUNT(*) FROM quizz_rep WHERE reponse_a=1 OR reponse_b=1 OR reponse_c=1 OR reponse_d=1 GROUP BY reponse_a, reponse_b, reponse_c, reponse_d");
  while($row=mysql_fetch_assoc($sql))
  $output[]=$row;
  //print_r($output);
  mysql_close();
  
  // ENCODAGE JSON
  echo "\r\n";
  print(str_replace("COUNT(*)","count",json_encode($output))); 
  
?>