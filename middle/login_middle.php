<?php
$url = 'back/login_back.php';

$postdata = $_POST;

$c = curl_init();
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
$result = curl_exec ($c); 
curl_close ($c); 

//<person><name>name</name><age>22</age></person>


if($result){
	$string = $result; 

	$xml = new SimpleXMLElement($string);

	$age = $xml->xpath('//age');


	if($age[0]<=30){
		$newinsert = '<evaluation>young</evaluation>';
	}else{
		$newinsert = '<evaluation>old</evaluation>';
	}
	
	
	$oldending = "</person>";
	echo str_replace($oldending, $newinsert.$oldending, $string);	

//<person><name>name</name><age>22</age><evaluation>young</evaluation></person>
	
}else
	header('HTTP/1.1 500 Internal Server Error');

?>