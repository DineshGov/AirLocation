<?php

require("database_auth.php");

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

	//$html_retour = "<div>" . $res['nomLogement']."</div>";
	$tab=[];
	/*do{
		array_push($tab, $res);


	}while($res=$req->fetch(PDO::FETCH_ASSOC));
	//echo $html_retour;
	echo $tab[0]['nomLogement'].$tab[1]['nomLogement']; */

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
								<th sope=col>Actions</th>
							</tr>
						</thead>";
		$resultats=$resultats."<tbody>";

		$compteur=1;

		do{
			//On affiche chaque ligne de résultat
			$resultats=$resultats."<tr>"."
							    <th class='text-center'>".$res['idLogement']."</th>
								<td>".$res['ville']."</td>
				 				<td class='text-center'>".$res['nomLogement']."</td>
				 				<td>".$res['dateArr']."</td>
				 				<td>".$res['dateDep']."</td>
				 				<td class='text-center'>".$res['capacite']."</td>
				 				<td>".$res['typeLogement']."</td>
				 				<td>".$res['description']."</td>
				 				<td class='text-center'>".$res['prix']."<i class='glyphicon glyphicon-euro'></i></td>
				 				<td><button class='btn btn-success'>Réservez</button></td>
								</tr>";
					
					$compteur ++;
		}while($res = $req->fetch(PDO::FETCH_ASSOC));
				$resultats=$resultats."</tbody>"."</table></div></div></div>";

		echo $resultats;		
				

	}


	//echo "reussite";
}
else{
	echo "slimane";
}

?>