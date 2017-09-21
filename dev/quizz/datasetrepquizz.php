<?php
  
  echo(" <body onload=\"javascript:alert('datasetrepquizz');\"></body> ");
  
  // ID QUIZZ
  $sql="INSERT INTO quizz_rep (id_quizz, reponse_a, reponse_b, reponse_c, reponse_d) VALUES ('$_POST[idquizz]','$_POST[repa]','$_POST[repb]','$_POST[repc]','$_POST[repd]')";
  echo $sql;
  
  // CONNEXION BASE DE DONNEES
  mysql_connect("mysql5-2","obrianddata","uE3VkY0T");
  mysql_select_db("obrianddata");
  $sql_result = mysql_query($sql);
  echo $sql_result;
  mysql_close();
  
?>