<?php
	require('database_auth.php');
	
	if( isset($_GET['login_2']) )
	{
		$log=$_GET['login_2'];
		$req=$bd->prepare('select login from Users where login=:log');
		$req->bindvalue(':log',$log);
		$req->execute();
		$tab=$req->fetch(PDO::FETCH_ASSOC);
		
		if( empty($tab['login']) )
			echo "ok";
		else
			echo "erreur";
	}
	
?>