<?php 
    define('SAFEASANA', 1);
    include('config.php');
    include('curl.php');
    include('helper.php');
    include('display.php');
?>

<html>
<head>
    <meta charset="UTF-8">

    <!-- Mobile tags -->
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="480">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no"> 

    <title>Asana | <?php echo count($today) ?> tasks Today</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,200" rel="stylesheet">

    <!-- jQuery -->
    <script src="javascripts/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Dragula - Drag n Drop -->
    <script src="javascripts/dragula.min.js"></script>

    <!-- Flickity -->
    <script src="javascripts/flickity.pkgd.min.js"></script>

    <!-- Init Dragula and Flickity in a script -->
    <script src="javascripts/main.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="stylesheets/screen.css"> 

    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="favicon-ios.png">    

</head>

<body>
    <!-- Browsersync -->
    <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.12'><\/script>".replace("HOST", location.hostname));
//]]></script>
    
    <!-- Navigation to Workspaces-->
    <input type="checkbox" id="hamburger"/>
    <label class="menuicon" for="hamburger">
      <span></span>
    </label>
    <div class="menu" id="sidebar">
        <h2>Workspaces</h2>
        <ul class="workspaces-list">
            <?php foreach ($workspaces as $workspace) {
                echo '<li class="workspace"><a target="_blank" href="https://app.asana.com/0/'.idToURL($workspace['id']).'/list">'.$workspace['name'].'</a></li>';
            }?>    
        </ul>
        <label class="show-completed"><input type="checkbox" value=""> Show completed today</label>
    </div>


    <!-- Create task toggle -->
    <div id="createbutton">
        <a class="btn btn-info toggle-task"><span>+</span></a>
    </div>

    <!-- Task lists -->
    <div class="wrapper">
        <div class="container">
            <div class="row row-tasks">
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Today</h2>
                    <ul id="today" class="todo-list">
                        <?php foreach ($today as $task) {
                            display($task, $workspaces, $projects);
                        }?>
                        <?php foreach ($today_completed as $task) {
                            display($task, $workspaces, $projects);
                        }?>
                    </ul>
                </div>
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Upcoming</h2>
                    <ul id="upcoming" class="todo-list">
                        <?php foreach ($upcoming as $task) {
                            display($task, $workspaces, $projects);
                        }?>
                        <?php foreach ($upcoming_completed as $task) {
                            display($task, $workspaces, $projects);
                        }?>

                    </ul>
                </div>
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Later</h2>
                    <ul id="later" class="todo-list">
                        <?php foreach ($later as $task) {
                            display($task, $workspaces, $projects);
                        }?>
                        <?php foreach ($later_completed as $task) {
                            display($task, $workspaces, $projects);
                        }?>

                    </ul>
                </div>
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Inbox</h2>
                    <ul id="inbox" class="todo-list">
                        <?php foreach ($inbox as $task) {
                            display($task, $workspaces, $projects);
                        }?>
                        <?php foreach ($inbox_completed as $task) {
                            display($task, $workspaces, $projects);
                        }?>

                    </ul>                
                </div>
            </div>
        </div>
    </div>

    <!-- Hire me! ;) -->
    <footer>
        <div class="container">
            <div class="row new-task-form">
                <div class="form-group">
                    <div class="col-lg-3 workspace">
                        <!-- Workspace -->
                        <label for="workspace-sel">Workspace:</label>
                        <select class="form-control" id="workspace-sel">
                            <?php foreach ($workspaces as $workspace) {
                                echo '<option value="'.$workspace['id'].'">'.$workspace['name'].'</option>';
                            }?>
                        </select>                        
                    </div>
                    <div class="col-lg-3 project">
                        <!-- Project -->
                        <label for="project-sel">Project:</label>
                        <select class="form-control" id="project-sel">
                        </select>
                    </div>
                    <div class="col-lg-3 title">
                        <!-- Title -->
                        <label for="title-sel">Title:</label>                    
                        <input id="title-sel" class="form-control" type="text" name="title" value="">
                    </div>
                    <div class="col-lg-3 assignee">
                        <!-- Assignee -->
                        <label for="assignee-sel">Assignee:</label>
                        <select class="form-control grey" id="assignee-sel">
                        </select>
                        <a href="create" class="btn btn-info new-task">Create</a>
                        <!-- Loader -->
                        <div class="btn btn-info spinner loader">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>                        
                    </div>
                </div>
            </div>    

            <a href="http://www.howaboutyes.com">created by How About Yes</a>
        </div>
    </footer>

</body>
</html>
