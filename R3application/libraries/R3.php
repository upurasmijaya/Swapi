<?php
class r3 {
	function getJSON($sumber){
		/*
		fungsi konversi data ke bentuk JSON
		*/
		$obj = json_decode($sumber, TRUE);
		return $obj;
	}
	
	function getAPI($url){
		/*
		fungsi CURL untuk FETCH API
		*/
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	function getLastURL($url, $pos = -1) {
		/*
		fungsi mengambil posisi yang diinginkan dari API url
		*/
		$path = parse_url($url, PHP_URL_PATH); 
		$pathTrimmed = trim($path, '/');
		$pathTokens = explode('/', $pathTrimmed); 

		if (substr($path, $pos) !== '/') {
			array_pop($pathTokens);
		}
		return end($pathTokens);
	}
	
	function parseLI($konten){
		/*
		fungsi pemecah LI element
		*/
		$results = '';
		foreach ($konten as $konten_item):
			$results .= '
			<li>'.$konten_item.'</li>
			';
		endforeach;
		return $results;
	}
	
	function intText($element){
		/*
		fungsi test numeric dan konversi number_format
		*/		
		if (is_numeric($element)) {
			return number_format($element, 0);
		} else {
			return $element;
		}
		
	}
}



