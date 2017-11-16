<?php 
define('SAFEASANA', 1);
include('config.php');

$workspace = $_POST['workspace'];

$query = "https://app.asana.com/api/1.0/workspaces/".$workspace."/projects?opt_fields=name,id,color&archived=false";

// Init CURL and Authorisation
$ch = curl_init(); 

$authorization = "Authorization: Bearer ".$api_key;
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Get Projects
curl_setopt($ch, CURLOPT_URL, $query);
$output = curl_exec($ch);
echo $output;
curl_close($ch);

?>