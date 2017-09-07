<?php 
$currency = $_POST['qwe'];
$url = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL, $url);
// Execute
$result = curl_exec($ch);
// Closing
curl_close($ch);
$array = json_decode($result, true);
$array_USD_EUR = ["USD" => "", "EUR" => ""];

foreach ($array as $array_id) {
	foreach ($array_id as $key => $value) {
		if ($key == "r030" && $value == 840) {
			$array_USD_EUR["USD"] = $array_id["rate"];
		}
		if ($key == "r030" && $value == 978) {
			$array_USD_EUR["EUR"] = $array_id["rate"];
		}
	}	
}
echo(json_encode($array_USD_EUR));
?>