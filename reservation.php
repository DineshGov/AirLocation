<?php session_start(); ?>
<?php
$page_name="reservation.php";
require ('entete.php');
require("database_auth.php");

if( isset($_POST['idLogement']) && isset($_POST['date_debut_resa']) && isset($_POST['date_fin_resa']) && isset($_POST['nbr_voyageur']) && isset($_POST['idUser']) ){

	$req = $bd->prepare("insert into reservations(idUser,idLogement,nbrVoyageur,dateArr,dateDep) values (:id, :idL, :nbr, :arr, :dep)");
	$req->bindvalue(':id'  , $_POST['idUser']);
	$req->bindvalue(':idL' , $_POST['idLogement']);
	$req->bindvalue(':nbr' , $_POST['nbr_voyageur']);
	$req->bindvalue(':arr' , $_POST['date_debut_resa']);
	$req->bindvalue(':dep' , $_POST['date_fin_resa']);
	$req->execute();

	$count = $req->rowCount();

	if($count){
		echo "<div class='redirection_div'>
			Votre réservation a <strong>été prise en compte!</strong>
			</div>";
		echo "<p>Nous vous souhaitons un agréable voyage.</p>
		<p>Vous allez maintenant être redirigé vers votre espace personnel.</p>";
		echo "<p><a href='home.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		echo("<script>setTimeout('RedirectionVersMonCompte()', 5000)</script>");
	}
	else{
		echo "<div class='redirection_div'>
			Votre réservation a <strong>échoué...</strong>
			</div>";
		echo "<p>Il y a eu un problème lors de votre réservation.</p>
		<p>Vous allez maintenant être redirigé vers votre espace personnel, n'hésitez pas à nous contacter en cas de difficultés prolongées.</p>";
		echo "<p><a href='home.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		echo("<script>setTimeout('RedirectionVersMonCompte()', 7000)</script>");
	}

}
else{
	echo "<div class='redirection_div'>
		Votre réservation a <strong>échoué...</strong>
		</div>";
	echo "<p>Il y a eu un problème lors de votre réservation.</p>
	<p>Vous allez maintenant être redirigé vers votre espace personnel, n'hésitez pas à nous contacter en cas de difficultés prolongées.</p>";
	echo "<p><a href='home.php'> Cliquez ici si l'attente est trop longue. </a></p>";
	echo("<script>setTimeout('RedirectionVersMonCompte()', 7000)</script>");
}

?>



	




