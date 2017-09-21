<?php

function _getQuizz($date) {
	echo "<br>question:".$date;
	echo "<br>reponseA";
	echo "<br>reponseB";
	echo "<br>reponseC";
	echo "<br>reponseD";
	echo "<br>indice";
	echo "<br>bonus";
}

function getQuizz($date) {
	
	$xml = '<?xml version="1.0" encoding="UTF-8"?>';
   	$xml .= '<quizz date='.$date.'>';
   	$xml .= '<theme>mon theme</theme>';
   	$xml .= '<question>ma question '.$date.'</question>';
   	$xml .= '<reponseA img=>ma reponse A</reponseA>';
   	$xml .= '<reponseB img=>ma reponse B</reponseB>';
   	$xml .= '<reponseC img=>ma reponse C</reponseC>';
   	$xml .= '<reponseD img=>ma reponse D</reponseD>';
   	$xml .= '<indice>mon indice</indice>';
   	$xml .= '<bonusinfo url=>mon bonus info</bonusinfo>';
	$xml .= '</quizz>';   
   
    echo $xml;

}

?>