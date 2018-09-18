$(document).ready(function(){

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

		var tilesPirates=  L.tileLayer(mapboxUrl, {
		    attribution: mapboxAttribution,
		    maxZoom: 18,
		    id: 'mapbox.pirates',
		    accessToken: mapboxToken
		});

		var mymap = L.map('mapid',{
			center: [46.55886,2.28516],
			zoom: 2,
			maxZoom: 6,
			layers: [tilesStreets, tilesSatellite , tilesPirates]
		});

		var baseMaps = {
		    "Pirates": tilesPirates,
		    "Rues": tilesStreets,
			"Satellite": tilesSatellite
			};

		L.control.layers(baseMaps).addTo(mymap);
	}	
});