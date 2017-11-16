<?php 
define('SAFEASANA', 1);
include('config.php');

$query = "https://app.asana.com/api/1.0/users/me";

// Init CURL and Authorisation
$ch = curl_init(); 

$authorization = "Authorization: Bearer ".$api_key;
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Get Assignees
curl_setopt($ch, CURLOPT_URL, $query);
$output = curl_exec($ch);
echo $output;
curl_close($ch);

?>