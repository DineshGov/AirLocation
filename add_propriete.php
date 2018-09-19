<?php
$page_name = "redirection_connexion.php"; 
require('entete.php');
require('database_auth.php');?>



	<?php
	var_dump($_POST);
	if(isset($_POST['inputVille']) && isset($_POST['dateArr']) && isset($_POST['dateDep']) && isset($_POST['capacite']) && isset($_POST['inputType']) && isset($_POST['inputPrix']) && isset($_POST['inputNom']) && isset($_POST['inputDescription']) && trim($_POST['inputVille']) !== "" && trim($_POST['dateArr']) !== "" && trim($_POST['dateDep']) !== "" && trim($_POST['capacite']) !== "" && trim($_POST['inputType']) !== "" && trim($_POST['inputPrix']) !== "" && trim($_POST['inputNom']) !== "" && trim($_POST['inputDescription']) !== ""){

		echo "ok";
	}
	else{
		echo '<div class="redirection_div"> Erreur. </div>';
		echo "<p>Le formulaire n'a pas été correctement rempli.</p> <p>Vous allez maintenant être redirigé vers le formulaire d'ajout de propriété.</p>" . "\n<a href='espace_proprio.php'> Cliquez ici si l'attente est trop longue. </a>";
		echo("<script>setTimeout('RedirectionVersEspaceProprio()', 4000)</script>");
	}

	?>