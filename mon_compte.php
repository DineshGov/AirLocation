<?php session_start(); ?>
<?php
	$page_name="mon_compte.php";
	require ('entete.php');
?>

	<div class="col-lg-12 col-md-12 col-sm-12">
		<h1 >Mes reservations</h1>
		<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2">
			<?php
				$req=$bd->prepare('select idLogement, nbrVoyageur, dateArr, dateDep from Users where idUser=:id');
				$req->bindvalue(':id', $_SESSION['idUser']);
				$req->execute();
				$tab = $req->fetch(PDO::FETCH_ASSOC);


			?>
		</div>

	</div>