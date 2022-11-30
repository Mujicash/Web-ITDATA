<?php
function toUSD($from,$amount) {
	$url = "https://api.exchangerate-api.com/v4/latest/USD";
	$json = file_get_contents($url);
	$obj = json_decode($json);
	return ($amount/$obj->rates->$from);
}

?>