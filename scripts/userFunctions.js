$(document).ready(function(){

    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#add").click(function(){
        
        $("#date").datepicker();


        var data = readEvent($("#title").val());

        if(data.length == 2){
            var eventTitle = data[0];
            var eventTag = data[1];
        }else{
            var eventTitle = $("#title").val();
            var eventTag = '';
        }

        console.log(eventTitle);
        console.log(eventTag);

        var eventDescription = $("#description").val();
        var eventDate = document.getElementById("date").value;

        $.post( "https://mars-remind.herokuapp.com/verify/addEvent", { title: eventTitle , description: eventDescription , tag: eventTag , date: eventDate })
            .done(function( data ) {
                $("#title").val("");
                $("#description").val("");
                document.getElementById("date").value = "";
                alert(data);
        });
    });

});