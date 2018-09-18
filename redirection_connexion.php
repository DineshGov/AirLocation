<?php session_start(); ?>
<?php
$page_name = "redirection_connexion.php"; 
require('entete.php');
require('database_auth.php');?>


	<div class="div_redirection">
	<?php

		if( isset($_POST['inputLogin']) && isset($_POST['inputPassword']) && trim($_POST['inputLogin']) !== "" && trim($_POST['inputPassword']) !== ""){
			$req=$bd->prepare('select count(*) as resultat from Users where login=:log and password=:pas');
			$req->bindvalue(':log', $_POST['inputLogin']);
			$req->bindvalue(':pas', md5($_POST['inputPassword']));
			$req->execute();
			$tab = $req->fetch(PDO::FETCH_ASSOC);
				if($tab['resultat']==1){ //Si le login et le password ont été trouvé dans la bdd alors connexion.
					echo "<div class='redirection_div'> Bienvenue " . htmlspecialchars($_POST['inputLogin'], ENT_QUOTES) . "! </div>";
					echo "<p>Vous êtes connecté.</p> <p>Vous allez maintenant être redirigé vers le menu principal.</p>";
					echo "<p><a href='home.php'> Cliquez ici si l'attente est trop longue. </a></p>";
					echo("<script>setTimeout('RedirectionVersHome()', 2000)</script>");

					$_SESSION['login'] = htmlspecialchars($_POST['inputLogin']);
					$_SESSION['connecte'] = true;

					$req2=$bd->prepare('select idUser, is_owner from Users where login=:log');
					$req2->bindvalue(':log', $_POST['inputLogin']);
					$req2->execute();
					$tab2 = $req2->fetch(PDO::FETCH_ASSOC);
					$_SESSION['idUser'] = $tab2['idUser'];
					if($tab2['is_owner'] == 1)
						$_SESSION['owner'] = true;
					else
						$_SESSION['owner'] = false;

				}
				else{
					echo '<div class="redirection_div"> Erreur. </div>';
					echo "<p>Echec lors de l'authentification, login ou mot de passe erroné.</p>";
					echo "<p>Vous allez maintenant être redirigé vers le formulaire de connexion.</p>";
					echo("<script>setTimeout('RedirectionVersConnexion()', 2000)</script>");
					echo "<p><a href='connexion.php'> Cliquez ici si l'attente est trop longue. </a></p>";
				}
		}
		else{
			echo '<div class="redirection_div"> Erreur. </div>';
			echo "<p>Echec lors de l'authentification, veuillez contacter l'administrateur si le problème persiste.</p>";
			echo "<p>Vous allez maintenant être redirigé vers le formulaire de connexion.</p>";
			echo("<script>setTimeout('RedirectionVersConnexion()', 2000)</script>");
			echo "<p><a href='index.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		}

	?>
	</div>
</body>
</html>