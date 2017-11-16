<?php 
define('SAFEASANA', 1);
include('config.php');

$task_id = $_POST['id'];
$assignee_status = $_POST['assignee_status'];

$query = "https://app.asana.com/api/1.0/tasks/".$task_id;

// Init CURL and Authorisation
$ch = curl_init(); 
$data = array("assignee_status" => $assignee_status);
$post = json_encode(array('data' => $data));

$authorization = "Authorization: Bearer ".$api_key;
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

// Get Workspaces
curl_setopt($ch, CURLOPT_URL, $query);
$output = curl_exec($ch);
// $output = json_decode($output,true);
// $output = json_encode($output);
echo $output;
curl_close($ch);

?>
