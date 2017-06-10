$(document).ready(function(){
    $('.loader').hide();

    $('[data-toggle="tooltip"]').tooltip({delay: { "show": 1000, "hide": 200 }});

    dragula([today,upcoming,later,inbox]).on('drop', function (el,container) {
        var id = $(el).data('id');
        var assignee_status = $(container).attr("id");
        $.ajax({
           url: 'update.php',
           type: "POST",
           data: {id: id, assignee_status: assignee_status},
           success: function(data){
               console.log(data);
                document.title = "Asana | "+$('#today li').not('.completed').length+" tasks Today";
           }
       });               
    });

    $('.icon').click(function(){
        var id = $(this).parent().data('id');
        $(this).parent().addClass('completed');
        $.ajax({
           url: 'complete.php',
           type: "POST",
           data: {id: id},
           success: function(data){
               console.log(data);
           }
        });
        document.title = "Asana | "+$('#today li').not('.completed').length+" tasks Today";
    });

    $('.show-completed').children().click(function() {
        var elem = $(this);
        if(elem.is(':checked')){
            $('.completed').show();
        }else{
            $('.completed').hide();
        }
    });

    // Create task functions
    function getProjects(workspace){
        $.ajax({
            url: 'getprojects.php',
            type: "POST",
            dataType: 'json',
            data: {workspace: workspace},
            success: function(data){
                console.log(data);
                
                $('#project-sel').empty();
                for(var i = 0;i<data.data.length;i++){
                    $('#project-sel').append($("<option></option>").attr("value",data.data[i].id).text(data.data[i].name));
                }
            }
        });
    }
    function getAssignees(workspace){
        $.ajax({
            url: 'getassignees.php',
            type: "POST",
            dataType: 'json',
            data: {workspace: workspace},
            success: function(data){
                console.log(data);
                
                $('#assignee-sel').empty();
                $('#assignee-sel').append("<option value=\"\">Select Assignee</option>");
                if(data.data.length == 0){

                    $.ajax({
                        url: 'getme.php',
                        type: "GET",
                        dataType: 'json',
                        success: function(data){
                            $('#assignee-sel').append($("<option></option>").attr("value",data.data.id).text(data.data.name));
                        }
                    }); 
                }else{
                    for(var i = 0;i<data.data.length;i++){
                        $('#assignee-sel').append($("<option></option>").attr("value",data.data[i].id).text(data.data[i].name)); 
                    }                    
                }
            }
        });
    }

    function init(){
        var workspace = $('footer #workspace-sel').val();
        getProjects(workspace);
        getAssignees(workspace);
    }

    $( "footer #workspace-sel" ).change(function() {
        var workspace = $(this).val();
        getProjects(workspace);
        getAssignees(workspace);
    });

    $('#assignee-sel').change(function(){
        if($('#assignee-sel').find(":selected").val() == ""){
            $(this).addClass('grey');
        }else{
            $(this).removeClass('grey');
        }
    });

    $('.new-task').click(function(event){
        event.preventDefault();
        var workspace = $('#workspace-sel').val();
        var project = $('#project-sel').val();
        var assignee = $('#assignee-sel').val();
        var title = $('#title-sel').val();
        if(title != ""){
            $('.title label').text('Label:');
            $('.form-group .title').removeClass('has-error has-feedback');            
            $('.new-task').hide();
            $('.loader').show();
            $('#title-sel').val("");
            $('.todo-list#inbox li').removeClass('new');            
            $.ajax({
                url: 'new.php',
                type: "POST",
                dataType: 'json',
                data: {workspace: workspace,project: project, assignee: assignee, title: title},
                success: function(data){
                    console.log(data);
                    var id = data.data.id;
                    $.ajax({
                        url: 'update-inbox.php',
                        type: "GET",
                        success: function(data){
                            $('.todo-list#inbox').html(data);
                            $('.todo-list#inbox').find("[data-id='" + id + "']").addClass("new");
                            $('.new-task').show();
                            $('.loader').hide();

                        }
                    });
                }
            });
        }else{
            $('.title label').text('Label (not empty!):');            
            $('.form-group .title').addClass('has-error has-feedback');
            console.log("title is empty");
        } 
    });

    init();    
});