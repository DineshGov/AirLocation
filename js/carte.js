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

	
		var mymap = L.map('mapid',{
			center: [48.866667,2.333333],
			zoom: 12,
			maxZoom: 18,
			layers: [tilesStreets, tilesSatellite]
		});

		var baseMaps = {
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
	
	
});