function recuperation_coordonnees(e) {
        /*Exemple de valeur retournée par e.latlng.toString()
        LatLng(45.58329, 2.640128)
        
        On veut extraire les coordonnées pour avoir deux variables latitude et longitude.
        */
        $(".leaflet-marker-icon").remove();
        $(".leaflet-marker-shadow").remove();
        //On supprime le marker (et son ombre) précédemment placé.
        var marker = L.marker(e.latlng).addTo(map);
        //Sinon utiliser e.latlng.lat et e.latlng.lng
        
        var coordonnees = e.latlng.toString();
        var position_parenthese_ouvrante = coordonnees.indexOf('(') + 1;
        var position_parenthese_fermante = coordonnees.indexOf(')');
        
        var coordonnees_sans_parenthese = coordonnees.substring(position_parenthese_ouvrante, position_parenthese_fermante);
        
        var extractionCoordonnees = coordonnees_sans_parenthese.split(", ");
        //La fonction split renvoie un tableau.
        
        $("#clickedLatitude").val(extractionCoordonnees[0]);
        $("#clickedLongitude").val(extractionCoordonnees[1]);

        $("#lat").val(extractionCoordonnees[0]);
        $("#long").val(extractionCoordonnees[1]);

        get_ville_from_coordinates();
}

function get_ville_from_coordinates(){
    console.log("get_ville_from_coordinates");
    $.get(
        "requete_ajax_espace_proprio.php",
        {
            lat: $("#lat").val(),
            long: $("#long").val()
        }, 
        function(reponse)
        {       
            console.log("in function reponse");
            var location;
            //typeof(x) != "undefined"
            if(typeof(reponse.address.town) != "undefined"){
                console.log('reponse.address.town= ' + reponse.address.town + "");
                location = reponse.address.town;
            }
            else if(typeof(reponse.address.city) != "undefined"){
                console.log('reponse.address.city= ' + reponse.address.city + "");
                location = reponse.address.city;
            }
            else if(typeof(reponse.address.county) != "undefined"){
                console.log('reponse.address.county= ' + reponse.address.county + "");
                location = reponse.address.county;
            }
            else{
                console.log('reponse.display_name= ' + reponse.display_name + "");
                location = reponse.display_name;
            }

            $('#inputVille').val(location);

        }
    );
}

