$(document).ready(function(){

	var poly;
	var bounds;
	window.onload = function ()
	{

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
		
		$("#recherche").click(function()
		{
		
			$(".leaflet-interactive").remove();
			$(".leaflet-marker-icon").remove();
			$(".leaflet-marker-shadow").remove();

				$.get(
					"requete_ajax_carte.php",
					{ville: $('#destination').val()}, 
					function(reponse)
					{	
						
						poly = L.geoJSON(reponse[0].geojson, {color: 'red',opacity: 0.1}).addTo(mymap);
						mymap.setView(new L.LatLng(reponse[0].lat,reponse[0].lon));	

						bounds = mymap.getBounds();
						console.log(bounds);
						
						$.get(
							"requete_ajax_carte_2.php",
							{lonNordEst: bounds.getNorthEast().lng, latNordEst: bounds.getNorthEast().lat, lonSudOuest: bounds.getSouthWest().lng, latSudOuest: bounds.getSouthWest().lat},
							function(reponse)
							{	
								console.log(reponse);
								for(var i=0; i<reponse.length; i++)
								{
									monMarqueur = [];
									
									monMarqueur[i] = L.marker([reponse[i].latitude, reponse[i].longitude],{id: reponse[i].idLogement,ville: reponse[i].ville}).addTo(mymap).on('click',function()
									{
										var a = $(this)[0].options.id;
										$("tr").css("background-color","");
										
										$("td").each(function()
										{
											if($(this).attr('id')=="markId" && $(this).text()==parseInt(a) )
												$(this).parent().css("background-color","grey");
										})
									
									});
									
									monMarqueur[i].bindPopup("<strong>"+reponse[i].nomLogement+"</strong><br>"+reponse[i].description);
								}				
							}
						);
					}
				);
				


			var date= $("#date").val();
			var dates=date.split(' - ');

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
			function(reponse)
			{
				
				//alert(reponse);
				console.log("resultat");
				console.log(reponse);

				if (reponse.includes("alert")){

					$("#notification").html(reponse);
				}
				else{

					$(".resultats").html(reponse);
					//$(".notification").prepend(reponse);


				}

			});
		
		});
	}
});
