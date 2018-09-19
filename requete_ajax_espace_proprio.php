<?php 
		if(isset($_GET["lat"]) && isset($_GET["long"]))
		{
			$context = stream_context_create(
				array(
					"http" => array(
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
					)
				)
			);
			
			$url = "https://nominatim.openstreetmap.org/reverse.php?format=json&lat=" . $_GET['lat'] . "&" . "lon=" . $_GET['long'] . "";
			$url_with_para = urldecode($url);
			$a = json_decode(file_get_contents($url_with_para,false, $context)); 
			header('Content-Type: application/json');
			echo json_encode($a);
		}
?>