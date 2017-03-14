<?php 
    include('config.php');
    include('curl.php');
    include('helper.php');
    include('display.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Asana</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,200" rel="stylesheet">

    <!-- jQuery -->
    <script src="javascripts/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Dragula - Drag n Drop -->
    <script src="javascripts/dragula.min.js"></script>
    <link rel="stylesheet" href="dragula.min.css"> 
    <!-- Init Dragula in a script -->
    <script src="javascripts/main.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="stylesheets/screen.css"> 
</head>

<body>
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
    </div>
    
    <!-- Task lists -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Today</h2>
                    <ul id="today" class="todo-list">
                        <?php foreach ($today as $task) {
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
                    </ul>
                </div>
                <div class="column col-md-3 col-sm-6">
                    <h2 class="list-title">Later</h2>
                    <ul id="later" class="todo-list">
                        <?php foreach ($later as $task) {
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
                    </ul>                
                </div>
            </div>
        </div>
    </div>

    <!-- Hire me! ;) -->
    <footer><a href="http://www.sefrijn.nl">created by sefrijn.nl</a></footer>

</body>
</html>
