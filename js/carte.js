$(document).ready(function(){

	var poly;
	window.onload = function (){

		var mapboxUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}';
		var mapboxAttribution ='Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>';
		var mapboxToken = 'pk.eyJ1Ijoic2x5MTIzIiwiYSI6ImNqZXNuOXQ1aTEyNjYyeHA5dDgyYjlyZjgifQ.OGFCp15cp-8tHsz9WO527Q';
					
		var tilesStreets=  L.tileLayer(mapboxUrl, {
			attribution: mapboxAttribution,
			maxZoom: 18,
			id: 'mapbox.streets',
			accessToken: mapboxToken
			});

		var tilesSatellite=  L.tileLayer(mapboxUrl, {
		    attribution: mapboxAttribution,
		    maxZoom: 18,
		    id: 'mapbox.satellite',
		    accessToken: mapboxToken
		});

<<<<<<< HEAD
		

		var mymap = L.map('mapid',{
			center: [46.55886,2.28516],
			zoom: 2,
			maxZoom: 6,
=======
	
		var mymap = L.map('mapid',{
			center: [48.866667,2.333333],
			zoom: 12,
			maxZoom: 18,
>>>>>>> 0a48821f45401d94d47d9e1a679077174e487e50
			layers: [tilesStreets, tilesSatellite]
		});

		var baseMaps = {
<<<<<<< HEAD
		    
			"Satellite": tilesSatellite,
			"Rues": tilesStreets
			};

		L.control.layers(baseMaps).addTo(mymap);
	}

	$("#rechercher").click(function(){

		/*var destination=$("#destination").val();
		var date= $("#date").val();
		var voyageurs=$("#voyageurs").val(); 
		console.log(destination);
		console.log(date);
		console.log(voyageurs);*/

		/*$.ajax({

			url : 'requete_ajax_home.php',
			type: 'POST',
			data:'destination='+destination+'&date='+date+'&voyageurs'+voyageurs,
			dataType : 'html',
			success: function (reponse) {
				alert(reponse);	
			},
			error : function(resultat, statut, erreur){
 
	       }

		});*/
 		console.log($("#destination").val());
		console.log($("#date").val());
		var date= $("#date").val();
		var dates=date.split(' - ');
		console.log('debut fin');
		console.log(dates[0]);
		console.log(dates[1]);
		var date_debut = dates[0];
		var date_fin = dates[1];

		$.post(
			"requete_ajax_home.php",
			{
				destination: $("#destination").val(),
				date_debut: date_debut,
				date_fin: date_fin,
				voyageurs: $("#voyageurs").val() 
			},
			function(reponse){
				alert(reponse);
				if(reponse){
					console.log("OK");
				}
				else{
					console.log(reponse);
					console.log("erreur");
				}
			}
		);



	});

=======
		    "Satellite": tilesSatellite,
			"Rues": tilesStreets
			
			};

		L.control.layers(baseMaps).addTo(mymap);
		
		$("#recherche").click(function(){
		
		$(".leaflet-interactive").remove();
			$.get(
				"traitement.php",
				{ville: $('#ville').val()}, 
				function(reponse)
				{				
					poly = L.geoJSON(reponse[0].geojson, {color: 'red'}).addTo(mymap);
					mymap.setView(new L.LatLng(reponse[0].lat,reponse[0].lon));
				}
			);
			
		});
	}
	
	
>>>>>>> 0a48821f45401d94d47d9e1a679077174e487e50
});