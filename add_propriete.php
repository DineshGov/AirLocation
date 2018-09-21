<?php
$page_name = "redirection_connexion.php"; 
require('entete.php');
require('database_auth.php');?>



	<?php
	if(isset($_POST['inputVille']) && isset($_POST['dateArr']) && isset($_POST['dateDep']) && isset($_POST['capacite']) && isset($_POST['inputType']) && isset($_POST['inputPrix']) && isset($_POST['inputNom']) && isset($_POST['inputDescription']) && trim($_POST['inputVille']) !== "" && trim($_POST['dateArr']) !== "" && trim($_POST['dateDep']) !== "" && trim($_POST['capacite']) !== "" && trim($_POST['inputType']) !== "" && trim($_POST['inputPrix']) !== "" && trim($_POST['inputNom']) !== "" && trim($_POST['inputDescription']) !== ""){

		$req=$bd->prepare('INSERT INTO logements (ville, dateArr, dateDep, capacite, typeLogement, prix, nomLogement, description, latitude, longitude, idProprio) VALUES (:ville, :arr, :dep, :cap, :type, :prix, :nom, :descr, :lat, :long, :idP);');
			$req->bindvalue(':ville', $_POST['inputVille']);
			$req->bindvalue(':arr', $_POST['dateArr']);
			$req->bindvalue(':dep', $_POST['dateDep']);
			$req->bindvalue(':cap', $_POST['capacite']);
			$req->bindvalue(':type', $_POST['inputType']);
			$req->bindvalue(':prix', $_POST['inputPrix']);
			$req->bindvalue(':nom', $_POST['inputNom']);
			$req->bindvalue(':descr', $_POST['inputDescription']);
			$req->bindvalue(':lat', $_POST['lat']);
			$req->bindvalue(':long', $_POST['long']);
			$req->bindvalue(':idP', $_POST['idProprio']);
            $req->execute();
//dateArr	dateDep	capacite	idProprio	longitude	latitude	typeLogement	prix	description	nomLogement	idLogement
        echo '<div class="redirection_div"> Logement ajouté. </div>';
		echo "<p>Votre logement a bien été ajouté.</p> <p>Vous allez maintenant être redirigé vers votre espace propriétaire.</p>" . "\n<a href='espace_proprio.php'> Cliquez ici si l'attente est trop longue. </a>";
		echo("<script>setTimeout('RedirectionVersEspaceProprio()', 3000)</script>");

	}
	else{
		echo '<div class="redirection_div"> Erreur. </div>';
		echo "<p>Le formulaire n'a pas été correctement rempli.</p> <p>Vous allez maintenant être redirigé vers le formulaire d'ajout de propriété.</p>" . "\n<a href='espace_proprio.php'> Cliquez ici si l'attente est trop longue. </a>";
		echo("<script>setTimeout('RedirectionVersEspaceProprio()', 3000)</script>");
	}

	?>