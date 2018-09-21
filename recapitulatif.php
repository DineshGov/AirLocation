<?php session_start(); ?>
<?php
$page_name="recapitulatif.php";
require ('entete.php');
require("database_auth.php");

if(isset($_POST["idLogement"]) && isset($_POST["date_debut_client"]) && isset($_POST["date_fin_client"])  && isset($_POST["nbr_voyageur"])){

	$req=$bd->prepare('SELECT * from logements JOIN reservations ON logements.idLogement = reservations.idLogement where reservations.idLogement = :id');
	$req->bindvalue(':id', $_POST["idLogement"]);
	$req->execute();

	$verif_dispo = true;

	while ($tab = $req->fetch(PDO::FETCH_ASSOC) ) {
		if($verif_dispo == true){
			if( ($_POST["date_debut_client"] >= $tab['dateArr'] && 
				 $_POST["date_debut_client"] <= $tab['dateDep']) || 
				($_POST["date_fin_client"]   >= $tab['dateArr'] && 
				 $_POST["date_fin_client"]   <= $tab['dateDep']) ||
				($_POST["date_debut_client"] <= $tab['dateArr'] && 
				 $_POST["date_fin_client"]   >= $tab['dateDep'])
				){
				echo "<pre><center>Le logement choisi est indisponible pour ces dates.\nVous pouvez essayer de réserver ce logement pour une autre date.</center></pre>";
				$verif_dispo = false;

				echo'<div>
        			<a href="home.php" class="return_links">
            		<span class="glyphicon glyphicon-step-backward"></span>
            		Retour à la page d\'accueil.
        			</a>
    			</div>';
			}
		}
	}
	if($verif_dispo == true){
		echo "<pre><center>Le logement choisi est disponible du {$_POST["date_debut_client"]} au {$_POST["date_fin_client"]} pour {$_POST["nbr_voyageur"]} personnes.</center></pre>";

		echo "<div class='jumbotron' style='margin-left: 30px;'>
				<p class='lead'>Vous pouvez réserver ce logement.</p>
				<hr class='my-4'>
				<p>Cliquez sur ce bouton pour procéder à la réservation.</p>
				<p class='lead'>
					<button class='btn btn-primary btn-lg' type='submit' form='form_to_redirect'>Réserver</button>
					<form method='POST' action='reservation.php' id='form_to_redirect'>
						<input type='hidden' name='idLogement' value='{$_POST["idLogement"]}'>
						<input type='hidden' name='date_debut_resa' value='{$_POST["date_debut_client"]}'>
						<input type='hidden' name='date_fin_resa' value='{$_POST["date_fin_client"]}'>
						<input type='hidden' name='nbr_voyageur' value='{$_POST["nbr_voyageur"]}'>
						<input type='hidden' name='idUser' value='{$_SESSION["idUser"]}'>
					</form>
				</p>
			</div>";
	}
}

?>

