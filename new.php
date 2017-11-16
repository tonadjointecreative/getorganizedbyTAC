<?php 
define('SAFEASANA', 1);
include('config.php');

$workspace = $_POST['workspace'];
$project = $_POST['project'];
$assignee = $_POST['assignee'];
$title = $_POST['title'];
if(empty($assignee)){
    $data = array("workspace" => $workspace, "projects" => $project, "name" => $title);
}else{
    $data = array("assignee" => $assignee,"workspace" => $workspace, "projects" => $project, "name" => $title);
}
$post = json_encode(array('data' => $data));


$query = "https://app.asana.com/api/1.0/tasks";

// Init CURL and Authorisation
$ch = curl_init();

$authorization = "Authorization: Bearer ".$api_key;
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// Create the task
curl_setopt($ch, CURLOPT_URL, $query);
$output = curl_exec($ch);
echo $output;
curl_close($ch);

?>