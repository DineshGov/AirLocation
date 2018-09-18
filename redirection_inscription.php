<?php
$page_name = "redirection_inscription.php"; 
require('entete.php');
require('database_auth.php');
?>

	<div class="div_redirection">
	<?php

		if( isset($_POST['inputPassword']) && isset($_POST['inputPasswordConfirm']) && ($_POST['inputPassword'] !== $_POST['inputPasswordConfirm'])){
			echo '<div class="redirection_div"> Erreur. </div>';
			echo "<p>Les mots de passe ne correspondent pas</p> <p>Vous allez maintenant être redirigé vers le formulaire d'inscription.</p>" . "\n<a href='inscription.php'> Cliquez ici si l'attente est trop longue. </a>";
			echo("<script>setTimeout('RedirectionVersInscription()', 5000)</script>");
		}
	//Si lors de l'inscription le mdp n'est pas correctement saisi deux fois alors echec de l'inscription.
	//Normalement impossible car envoi du formulaire bloqué par jquery.
		elseif ( isset($_POST['inputUsername']) && isset($_POST['inputPassword']) && isset($_POST['inputPasswordConfirm']) && isset($_POST['inputPrenom']) && isset($_POST['inputNom']) && trim($_POST['inputUsername']) !== "" && trim($_POST['inputPassword']) !== "" && trim($_POST['inputPasswordConfirm']) !== "" && trim($_POST['inputPrenom']) !== "" && trim($_POST['inputNom']) !== "" && ( $_POST['inputPassword'] === $_POST['inputPasswordConfirm'] ) && isset($_POST['choiceOwner']) ){

			$choice;
			if($_POST['choiceOwner']=='oui')
				$choice = 1;
			else
				$choice = 0;

			$req=$bd->prepare('select count(*) as resultat from Users where login=:log');
			$req->bindvalue(':log', $_POST['inputUsername']);
			$req->execute();
			$tab = $req->fetch(PDO::FETCH_ASSOC);
			if($tab['resultat']==0){
				$req = $bd->prepare("insert into Users(login,password,nom,prenom,is_owner) values (:log, :pass, :lastName, :firstName, :own)");
				$req->bindvalue(':log' , $_POST['inputUsername']);
				$req->bindvalue(':pass', md5($_POST['inputPassword']));
				$req->bindvalue(':lastName' , $_POST['inputNom']);
				$req->bindvalue(':firstName', $_POST['inputPrenom']);
				$req->bindvalue(':own', $choice);
				$req->execute();

				echo "<div class='redirection_div'> Bienvenue " . htmlspecialchars($_POST['inputUsername'], ENT_QUOTES) . "! </div>";
				echo "<p>Votre compte a bien été crée.</p> <p>Vous allez maintenant être redirigé vers le formulaire de connexion.</p>";
				echo "<p><a href='index.php'> Cliquez ici si l'attente est trop longue. </a></p>";
				echo("<script>setTimeout('RedirectionVersConnexion()', 3000)</script>");
			}
			else{
				echo '<div class="redirection_div"> Erreur. </div>';
				echo "<p>Nom d'utilisateur déjà utilisé. Merci d'en saisir un nouveau.</p> <p>Vous allez maintenant être redirigé vers le formulaire d'inscription.</p>";
				echo "<p><a href='inscription.php'> Cliquez ici si l'attente est trop longue. </a></p>";
				echo("<script>setTimeout('RedirectionVersInscription()', 3000)</script>");
				//Ce cas est normalement impossible car controlé lors du remplissage du formulaire par un script ajax
			}

		}
		else{
			echo '<div class="redirection_div"> Erreur. </div>';
			echo "<p>Erreur lors de l'inscription. Attention à ne pas un mot de passe constitué uniquement d'espace.</p> <p>Veuillez contacter l'administrateur si le problème persiste.</p>" . "\n<a href='inscription.php'> Retour à la page d'inscription </a>";
			echo("<script>setTimeout('RedirectionVersInscription()', 3000)</script>");
		}
	?>
	</div>
</body>
</html>