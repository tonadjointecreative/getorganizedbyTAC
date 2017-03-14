<?php

// Task display loop
function display( $task, $workspaces, $projects ){
    $workspace = array_search($task['workspace']['id'],array_column($workspaces,'id'));
    $project = array_search($task['projects'][0]['id'],array_column($projects,'id'));
    $project_color = $projects[$project]['color'];
    $name = $task['name'];
    if($name == ""){
        $name = "** empty title **";
    }        
    if($project_color == ""){
        $project_color = "default-color";
    }
    echo '<li data-id="'.$task['id'].'" class="todo-item">';
    echo '<a class="name" target="_blank" href="https://app.asana.com/0/'.$projects[$project]['id'].'/'.$task['id'].'">'.$name.'</a><br>';
    if($task['projects'] == null){
        echo '<a class="project default-color" target="_blank" href="https://app.asana.com/0/'.idToURL($task['workspace']['id']).'/list">No project</a>';
    }else{
        echo '<a class="'.$project_color.' project" target="_blank" href="https://app.asana.com/0/'.$projects[$project]['id'].'/list">'.$projects[$project]['name'].'</a>';
    }
    echo '<a class="workspace" target="_blank" href="https://app.asana.com/0/'.idToURL($task['workspace']['id']).'/list">'.$workspaces[$workspace]['name'].'</a>';
    if($task['due_on'] != ""){
        get_nice_date($task['due_on']);
    }        
    echo '</li>';
}

?>