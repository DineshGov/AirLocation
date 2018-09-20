<?php

require("database_auth.php");
if (isset($_POST['destination']) && isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['voyageurs'])){

	$destination=$_POST['destination'];
	$voyageurs=$_POST['voyageurs'];
	$date_debut=$_POST['date_debut'];
	$date_fin=$_POST['date_fin'];

	$req=$bd->prepare('SELECT count(*) as nbr_logement_correspondant FROM LOGEMENTS WHERE ville = :destination 
											   and capacite >= :voyageurs 
											   and dateArr <= :date_debut
											   and dateDep >= :date_fin');

	$req->bindValue(':destination',$destination);
	$req->bindValue(':voyageurs',$voyageurs);
	$req->bindValue(':date_debut',$date_debut);
	$req->bindValue(':date_fin',$date_fin);
	$req->execute();
	$res= $req->fetch(PDO::FETCH_ASSOC);

	if($res['nbr_logement_correspondant'] == 0){
		echo "<div class='alert alert-danger alert-dismissible'  role='alert'>Aucun logement n'est disponible pour ce <strong>nombre de voyageurs</strong>. Veuillez saisir un autre <strong>nombre de voyageurs</strong>.<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
	}
}


if (isset($_POST['destination']) && isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['voyageurs'])){
	$destination=$_POST['destination'];
	$voyageurs=$_POST['voyageurs'];
	$date_debut=$_POST['date_debut'];
	$date_fin=$_POST['date_fin'];

	$req=$bd->prepare('SELECT * FROM LOGEMENTS WHERE ville = :destination 
											   and capacite >= :voyageurs 
											   and dateArr <= :date_debut
											   and dateDep >= :date_fin');

	$req->bindValue(':destination',$destination);
	$req->bindValue(':voyageurs',$voyageurs);
	$req->bindValue(':date_debut',$date_debut);
	$req->bindValue(':date_fin',$date_fin);
	$req->execute();
	$res= $req->fetch(PDO::FETCH_ASSOC);

	$tab=[];

	if($res){

		$resultats="<div class='row'><div class='col-md-11'><table class='table table-bordered' style='margin-left:20px;margin-top:20px'>
						<thead>
							<tr>
								<th scope=col>Résultats</th>
								<th scope=col>Ville</th>
								<th scope=col>Nom</th>
								<th scope=col>Arrivée</th>
								<th scope=col>Départ</th>
								<th scope=col>Capacité</th>
								<th scope=col>Type</th>
								<th scope=col  class='text-center'>Description</th>
								<th style='width:50px'>Prix</th>
								<th scope=col>Actions</th>
							</tr>
						</thead>";
		$resultats=$resultats."<tbody>";

		$compteur=1;

		do{
			//On affiche chaque ligne de résultat
			$resultats=$resultats."<tr>"."
							    <td id='markId' class='text-center'>{$res['idLogement']}</td>
								<td>".$res['ville']."</td>
				 				<td class='text-center'>".$res['nomLogement']."</td>
				 				<td>".$res['dateArr']."</td>
				 				<td>".$res['dateDep']."</td>
				 				<td class='text-center'>".$res['capacite']."</td>
				 				<td>".$res['typeLogement']."</td>
				 				<td>".$res['description']."</td>
				 				<td class='text-center'>".$res['prix']."<i class='glyphicon glyphicon-euro'></i></td>
				 				<td><button type='submit' class='btn btn-success' form='form_{$res['idLogement']}' >Disponibilités</button>" . 
								"<form method='POST' action='recapitulatif.php' id='form_" . $res['idLogement'] . "'>" .
								"<input type='hidden' name='idLogement' value='{$res['idLogement']}'>
								<input type='hidden' name='date_debut_client' value='{$_POST['date_debut']}'>
								<input type='hidden' name='date_fin_client' value='{$_POST['date_fin']}'> </form></td>
								</tr>";


					
					$compteur ++;
		}while($res = $req->fetch(PDO::FETCH_ASSOC));
				$resultats=$resultats."</tbody>"."</table></div></div>";

		echo $resultats;		
				

	}


	//echo "reussite";
}
else{
	echo "<div class='alert alert-danger alert-dismissible'  role='alert'>Veuillez saisir <strong>une ville</strong>,<strong>une date </strong>et <strong>un nombre de voyageurs</strong> correctes.<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}

?>
