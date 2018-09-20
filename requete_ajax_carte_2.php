<?php
require_once("database_auth.php");

$latNordEst = (float)$_GET['latNordEst'];
$lonNordEst = (float)$_GET['lonNordEst'];
$latSudOuest = (float)$_GET['latSudOuest'];
$lonSudOuest = (float)$_GET['lonSudOuest'];

$rep=array();

$req = $bd->prepare("select * from logements");
$req->execute();

/*echo "Latitude Nord-Est: ".$latNordEst.'<br>';
echo "Longitude Nord-Est: ".$lonNordEst.'<br>';
echo "Latitude Sud-Ouest: ".$latSudOuest.'<br>';
echo "Longitude Sud-Ouest: ".$lonSudOuest.'<br>';*/

while($tab = $req->fetch(PDO::FETCH_ASSOC)) //on repete tant qu'il y aura des logements avec des coordonnées
{
	$lon = $tab['longitude'];
	$lat = $tab['latitude'];
	
	
	$req2 = $bd->prepare //requete verifiant si l'emplacement du logement appartient au champ delimités par les bords passé en parametre get
	("
		select ST_CONTAINS
			(
			ST_GEOMFROMTEXT('POLYGON(($latNordEst $lonSudOuest,$latNordEst $lonNordEst,$latSudOuest $lonNordEst,$latSudOuest $lonSudOuest,$latNordEst $lonSudOuest))'), 
			ST_GEOMFROMTEXT('POINT($lat $lon)')
			) as val;
	");
	
		
	$req2->execute();
	$tab2 = $req2->fetch(PDO::FETCH_ASSOC);	//on recupere la valeur booleene
	
	$ville = $tab['ville'];

	if($tab2['val'])
	{
		array_push($rep,$tab);
	}
		
}

header('Content-Type: application/json');
echo json_encode($rep);