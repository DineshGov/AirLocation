<?php session_start(); ?>
<?php
	$page_name="espace_proprio.php";
	require ('entete.php');
	require('database_auth.php');
	var_dump($_SESSION);
?>

	<div class="col-lg-12 col-md-12 col-sm-12">

        <div class="col-lg-12 col-md-12 col-sm-12"> 
        	<h1>Ajouter un logement</h1>

        	<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1" id="mapContainer">   
        	</div>
    	    
    	    <script type="text/javascript">
    
		        map = L.map('mapContainer').setView([48.858376, 2.294442], 6);
		        //La map est créée mais elle ne possède pas encore de tuiles.

		        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
		        {
		        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		        id: 'mapbox.streets',
		        accessToken: 'pk.eyJ1IjoiZGppbiIsImEiOiJjamZheWg1OWoxaHYzM3VtejB5OWZxcXVwIn0.i_GA2vSOytwgViYnIvlGGA'
		        }).addTo(map);

		        map.on('click', recuperation_coordonnees);

		    </script>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
        	<p>Situez votre logement sur la carte.</p>
        	<form action="add_propriete.php" method="POST">
        		<?php
        		echo '<input type="hidden" name="idProprio" id="idProprio" value="' . $_SESSION['idUser'] . '">';
        		?>
        		<label for="lat">Latitude:</label>
        		<input type="text" name="lat" id="lat" required>
        		<label for="long">Longitude:</label>
        		<input type="text" name="long" id="long" required>
        		</br>
        		<label for="inputVille">Ville:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
				    <input type="text" name="inputVille" id="inputVille" class="form-control" placeholder="Ville" required autofocus>
				</div>

				<label for="dateArr">Logement disponible le:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				    <input type="date" name="dateArr" id="dateArr" class="form-control" placeholder="Date d'arrivée" required>
				</div>

				<label for="dateDep">Fin de la disponibilité:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				    <input type="date" name="dateDep" id="dateDep" class="form-control" placeholder="Date de départ" required>
				</div>

				<label for="capacite">Capacité:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input type="number" min="1" max="10" name="capacite" id="capacite" class="form-control" value="1" required>
				</div>

				<label for="inputType">Type de logement (pavillon/appartement...):</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				    <select class="form-control" name="inputType" id="inputType" value="Appartement">
					    <option>Appartement</option>
					    <option>Pavillon</option>
					    <option>Villa</option>
					    <option>Studio</option>
					    <option>Cabane</option>
					    <option>Tente</option>
					    <option>Cage d'escalier</option>
					</select>
				</div>

				<label for="inputPrix">Prix:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
				    <input type="number" name="inputPrix" id="inputPrix" class="form-control" placeholder="Prix" min="0" required>
				</div>

				<label for="inputNom">Titre de l'annonce:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
				    <input type="text" name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required>
				</div>

				<label for="inputDescription">Description:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
				    <input type="text" name="inputDescription" id="inputDescription" class="form-control" placeholder="Description" required>
				</div>

				</br>
				<button type="submit" class="btn btn-info">Ajout</button>
        	</form>
		</div>

    	<div class="col-lg-12 col-md-12 col-sm-12">
			<br>
			<h1>Mes Propriétés</h1>
			<div>  
				<table class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Logement</th>
						<th>Ville</th>
						<th class="col-lg-6 col-md-6 col-sm-6">Description</th>
						<th>Type</th>
						<th>Capacité</th>
						<th>Prix</th>
						<th>Arrivé</th>
						<th>Départ</th>
					</tr>
					</thead>
					<tbody>

				<?php
					
					$req=$bd->prepare('select * from logements l where l.idProprio=:id');
					$req->bindvalue(':id', $_SESSION['idUser']);
					$req->execute();
					while($tab = $req->fetch(PDO::FETCH_ASSOC)){
						echo "<tr>";
						echo "<td>" . $tab['nomLogement'] . "</td>";
						echo "<td>" . $tab['ville'] . "</td>";
						echo "<td>" . $tab['description'] . "</td>";
						echo "<td>" . $tab['typeLogement'] . "</td>";
						echo "<td>" . $tab['capacite'] . "</td>";
						echo "<td>" . $tab['prix'] . "</td>";
						echo "<td>" . $tab['dateArr'] . "</td>";
						echo "<td>" . $tab['dateDep'] . "</td>";
						echo "</tr>";
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="col-lg-12 col-md-12 col-sm-12">
			<br>
			<h1>Mes Réservations en cours</h1>
			<div>  
				<table class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Nom</th>
						<th>Logement</th>
						<th>Capacité</th>
						<th>Arrivé</th>
						<th>Départ</th>
					</tr>
					</thead>
					<tbody>

				<?php
					
					$req=$bd->prepare('select * from reservations r join logements l join users u on l.idLogement = r.idLogement and u.idUser = l.idProprio where l.idProprio=:id');
					$req->bindvalue(':id', $_SESSION['idUser']);
					$req->execute();
					while($tab = $req->fetch(PDO::FETCH_ASSOC)){
						echo "<tr>";
						echo "<td>" . $tab['nom'] .' '.$tab['prenom']. "</td>";
						echo "<td>" . $tab['nomLogement'] . "</td>";
						echo "<td>" . $tab['capacite'] . "</td>";
						echo "<td>" . $tab['dateArr'] . "</td>";
						echo "<td>" . $tab['dateDep'] . "</td>";
						echo "</tr>";
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
		
    </div>

</body>
</html>