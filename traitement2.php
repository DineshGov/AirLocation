<?php
require_once("database_auth.php");

$latNordEst = (float)$_GET['latNordEst'];
$lonNordEst = (float)$_GET['lonNordEst'];
$latSudOuest = (float)$_GET['latSudOuest'];
$lonSudOuest = (float)$_GET['lonSudOuest'];

$rep='';

$req = $bd->prepare("select * from logements");
$req->execute();

while($tab = $req->fetch(PDO::FETCH_ASSOC))
{
	$lon = $tab['longitude'];
	$lat = $tab['latitude'];
	
	
	/*$req2 = $bd->prepare
	("
		select ST_CONTAINS
			(
			ST_GEOMFROMTEXT('POLYGON((48.89 2.27,48.89 2.42,48.81 2.42,48.81 2.27,48.89 2.27))'), 
			ST_GEOMFROMTEXT('POINT(48.86 2.30)')
			) as val;
	");*/
	
	$req2 = $bd->prepare
	("
		select ST_CONTAINS
			(
			ST_GEOMFROMTEXT('POLYGON(($latNordEst $lonSudOuest,$latNordEst $lonNordEst,$latSudOuest $lonNordEst,$latSudOuest $lonSudOuest,$latNordEst $lonSudOuest))'), 
			ST_GEOMFROMTEXT('POINT($lat $lon)')
			) as val;
	");
		
	$req2->execute();
	$tab2 = $req2->fetch(PDO::FETCH_ASSOC);	//on recupere la valeur booleene
	
	if($tab2)
	{
		$rep.="ce lieu appartient à la borne".'<br>';
	}
	else
	{
		$rep.="ce lieu n'appartient pas à la borne".'<br>';
	}
	
}
echo $rep;