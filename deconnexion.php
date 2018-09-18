<?php
	session_start();
	session_unset();
	session_destroy();
	$page_name="deconnexion.php";
    require ('entete.php');
?>

	<div class="div_redirection">
	<?php
		echo "<div class='redirection_div'> Déconnexion! </div>";
		echo "<p>Vous êtes déconnecté.</p> <p>Vous allez maintenant être redirigé vers la page de connexion.</p>";
		echo "<p><a href='home.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		echo("<script>setTimeout('RedirectionVersHome()', 2000)</script>");

		/*unset($_SESSION['login']);
		unset($_SESSION['connecte']);
		unset($_SESSION['owner']);*/

		//$_SESSION = array();
		

		
	?>
	</div>
</body>
</html>