<?php
// Enter your Personal Acces Token here and rename to config.php
$api_key = "xxx";


function idToURL($input){
	// For some strange reason the Asana API Workspace ID is not the same as the URL to a workspace, so to make URLs to workspaces work, you must configurate them here.

	// Repeat if you have multiple workspaces... eh, probably you do. why else are you using this code?
	// Example of 2 workspaces
	if($input == "12345") // workspace ID
		$output = "54321"; // workspace URL number

	if($input == "12121") // workspace ID
		$output = "34343"; // workspace URL number

	return $output;
}

?>