
function RedirectionVersConnexion(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/connexion.php");
  	document.location.href= url_destination;
}


function RedirectionVersInscription(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/inscription.php");
  	document.location.href= url_destination; 
}

function RedirectionVersHome(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/home.php");
  	document.location.href= url_destination; 
}

function RedirectionVersEspaceProprio(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/espace_proprio.php");
  	document.location.href= url_destination;
}

function RedirectionVersMonCompte(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/mon_compte.php");
  	document.location.href= url_destination;
}