<?php session_start(); ?>
<?php
	$page_name="mon_compte.php";
	require ('entete.php');
	require('database_auth.php');
?>

	<div class="col-lg-12 col-md-12 col-sm-12">
		<h1 >Mes reservations</h1>
		<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2">  
			<table class="table table-striped table-bordered">
	        	<thead>
	          	<tr>
	            	<th>idLogement</th>
	            	<th>nbVoyageur</th>
	            	<th>dateArr</th>
	            	<th>dateDep</th>
	          	</tr>
	        	</thead>
	       		<tbody>

			<?php
				$req=$bd->prepare('select idLogement, nbVoyageur, dateArr, dateDep from RESERVATIONS where idUser=:id');
				$req->bindvalue(':id', $_SESSION['idUser']);
				$req->execute();
			    while($tab = $req->fetch(PDO::FETCH_ASSOC)){
					echo "<tr>";
					echo "<td>" . $tab['idLogement'] . "</td>";
					echo "<td>" . $tab['nbVoyageur'] . "</td>";
					echo "<td>" . $tab['dateArr'] . "</td>";
					echo "<td>" . $tab['dateDep'] . "</td>";
					echo "</tr>";
			    }
			?>
				</tbody>
			</table>
		</div>

	</div>