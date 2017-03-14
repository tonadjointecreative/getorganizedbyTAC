$(document).ready(function(){
    dragula([today,upcoming,later,inbox]).on('drop', function (el,container) {
        console.log($(container).attr("id"));
        console.log($(el).data('id'));
        var id = $(el).data('id');
        var assignee_status = $(container).attr("id");
        $.ajax({
             url: 'update.php', //This is the current doc
             type: "POST",
             // dataType:'json', // add json datatype to get json
             data: {id: id, assignee_status: assignee_status},
             success: function(data){
                 console.log(data);
             }
        });                 
    });
});