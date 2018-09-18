<?php
	$page_name="deconnexion.php";
    require ('entete.php');
?>

	<div class="div_redirection">
	<?php
		echo "<div class='redirection_div'> Déconnexion! </div>";
		echo "<p>Vous êtes déconnecté.</p> <p>Vous allez maintenant être redirigé vers la page de connexion.</p>";
		echo "<p><a href='../index.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		echo("<script>setTimeout('RedirectionVersConnexionFromMain()', 1000)</script>");

		session_destroy();
	?>
	</div>
</body>
</html>