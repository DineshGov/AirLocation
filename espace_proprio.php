<?php session_start(); ?>
<?php
	$page_name="espace_proprio.php";
	require ('entete.php');
	require('database_auth.php');
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

		    <div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">

		        <p>
		            Latitude: <input type="text" id="clickedLatitude"> 
		            Longitude: <input type="text" id="clickedLongitude">
		        </p>

		        <div>
		        	<p>Situez votre logement sur la carte.</p>
		            <p>Attribuer ces coordonnées à votre logement
		            	<button type="button" class="btn btn-info btn-xs"> Go</button>
		            </p>
		        </div>

		    </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
        	<form action="add_propriete.php" method="POST">

        		<label for="inputVille">Ville:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
				    <input type="text" name="inputVille" id="inputVille" class="form-control" placeholder="Ville" required autofocus>
				</div>

				<label for="dateArr">Date d'arrivée:</label>
        		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				    <input type="date" name="dateArr" id="dateArr" class="form-control" placeholder="Date d'arrivée" required>
				</div>

				<label for="dateDep">Date de départ:</label>
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
				    <input type="number" name="inputPrx" id="inputPrx" class="form-control" placeholder="Prix" min="0" required>
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
    	
    	   

    </div>

</body>
</html>