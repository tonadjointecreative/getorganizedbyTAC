<?php 
define('SAFEASANA', 1);
include('config.php');

$task_id = $_POST['id'];

// $task_id = "297261977477409";
$query = "https://app.asana.com/api/1.0/tasks/".$task_id;

// Init CURL and Authorisation
$ch = curl_init(); 
$data = array("completed" => "true");
$post = json_encode(array('data' => $data));

$authorization = "Authorization: Bearer ".$api_key;
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

curl_setopt($ch, CURLOPT_URL, $query);
$output = curl_exec($ch);
echo $output;
curl_close($ch);

?>
