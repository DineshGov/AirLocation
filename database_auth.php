<?php
try{
	$bd = new PDO('mysql:host=localhost;dbname=AirLocation', 'root', 'root');
	$bd->query('SET NAMES utf8');
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	die('<p> La connexion à échoué. Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
}
?>
