<?php
require("database_auth.php");
//var_dump($_POST);

//2018-09-27" ["date_fin_client"]=> string(10) "2018-09-28

//2018-09-20 	2018-09-22
//2018-09-24 	2018-09-26

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
				 $_POST["date_fin_client"]   <= $tab['dateDep'])
				){
				echo "Logement indisponible";
				$verif_dispo = false;
			}
		}
	}
	if($verif_dispo == true){
		echo "<pre>Le logement choisi est disponible du {$_POST["date_debut_client"]} au {$_POST["date_fin_client"]} pour {$_POST["nbr_voyageur"]} personnes.</pre>";

		echo "Souhaitez-vous le reserver?";
	}
}
/*
 idProprio
 ville
 dateArr
 dateDep
 capacite
 longitude
 latitude
 typeLogement
 prix
 description
 nomLogement
 idUser
 idLogement
 nbrVoyageur
 dateArr
 dateDep
 idLogement
*/

 ?>

