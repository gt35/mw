<?php
$url = 'middle/login_middle.php';

$postdata = $_POST;

$c = curl_init();
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
$result = curl_exec ($c); 
curl_close ($c); 

$prehtml = '<html><head></head><body>';
$posthtml = '</body</html>';

if($result){
	echo $prehtml;
	echo '<p>View the source to see the raw results. But, the client should make it pretty, such as: </p><br /><br />';
	
	$xml = new SimpleXMLElement($result);
	
	echo '<table border="1"><tr><td>';

	$name = $xml->xpath('//name');
	echo $name[0];

	echo '</td></tr><tr><td>';

	$age = $xml->xpath('//age');
	echo $age[0];

	echo '</td></tr><tr><td>';

	$ev = $xml->xpath('//evaluation');
	echo $ev[0];
	
	echo '</td></tr></table>';
	echo $result;
	echo $posthtml;
}	
else
	header('HTTP/1.1 500 Internal Server Error');

?>