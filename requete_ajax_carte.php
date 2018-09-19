<?php 
		if(isset($_GET["ville"]))
		{
			$context = stream_context_create(
				array(
					"http" => array(
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
					)
				)
			);
			
			$ville = $_GET["ville"];

			$url = urldecode("https://nominatim.openstreetmap.org/search.php?q=$ville&polygon_geojson=1&format=json");
			$a = json_decode(file_get_contents($url,false, $context)); 
			header('Content-Type: application/json');
			echo json_encode($a);
		}
?>