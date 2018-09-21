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
												$(this).parent().css("background-color","#F5F5F5");
										})
										
										var $target = $('html,body'); 
										$target.animate({scrollTop: $target.height()}, 1000);
									
									});
									
									monMarqueur[i].bindPopup(
										"<strong>Nom: </strong>"+reponse[i].nomLogement+"<br>"+
										"<strong>Ville: </strong>"+reponse[i].ville+"<br>"+
										"<strong>Description: </strong>"+reponse[i].description+"<br>"+
										"<strong>Capacité: </strong>"+reponse[i].capacite+"<br>"+
										"<strong>Date d'arrivé: </strong>"+reponse[i].dateArr+"<br>"+
										"<strong>Date de depart: </strong>"+reponse[i].dateDep+"<br>"								
									);
								}				
							}
						);
					}
				);
				


			var date= $("#date").val();
			var dates=date.split(' - ');

			var date_debut = dates[0];
			var date_fin = dates[1];

			var bounds_filtre=mymap.getBounds();
		
			console.log(bounds_filtre.getNorthEast().lng);
			console.log(bounds_filtre.getNorthEast().lat);
			console.log(bounds_filtre.getSouthWest().lng);
			console.log(bounds_filtre.getSouthWest().lat);


		$.post(
			"requete_ajax_home.php",
			{
				destination: $("#destination").val(),
				date_debut: date_debut,
				date_fin: date_fin,
				voyageurs: $("#voyageurs").val(),
				lon_north_east:bounds_filtre.getNorthEast().lng, 
				lat_north_east:bounds_filtre.getNorthEast().lat,
				lon_south_west:bounds_filtre.getSouthWest().lng,
				lat_south_west:bounds_filtre.getSouthWest().lat


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
				
				$('.btnSubmit').click(function(e){
					if($('#idUser').val().trim()=="")
					{
						e.preventDefault();
						//alert("Vous devez être ")
						$('.btnSubmit').removeClass('btn-success');
						$('.btnSubmit').addClass('btn-danger');
						$('.btnSubmit').text("Connectez vous");
					}
				});
				
			});
		
		});
	}

	function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Paris","Marseille","Toulouse","Nice","Bordeaux","Lyon","Lille","Nantes","Barcelone","Madrid","Valence","Londres","Chelsea","Liverpool","Manchester","Arsenal","Cardiff","Berlin","Munich","Rio","Tokyo","Lisbonne",
"Buenos aires","Alger","Marrakech","New-York","Varsovie","Moscou","Pékin","Mexico","Lima","Bagdad","Rome","Kiev","Caracas","Beyrouth","Montevideo","Bruxelles","Dublin","Tunis","Athènes","Oslo","Canberra","Monaco","Kingston","New Delhi","Amsterdam","Le Caire","Zagreb","La Havane","Ottawa","Washington","Panama","Stockholm","Berne"];

/*initiate the autocomplete function on the "destination" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("destination"), countries);

});





