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
	do{
		array_push($tab, $res);


	}while($res=$req->fetch(PDO::FETCH_ASSOC));
	//echo $html_retour;
	echo $tab[0]['nomLogement'].$tab[1]['nomLogement'];

	//echo "reussite";
}
else{
	echo "slimane";
}

?>