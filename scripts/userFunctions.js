$(document).ready(function(){

    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#add").click(function(){
        
        $("#date").datepicker();



        var eventTitle = $("#title").val();
        var eventDescription = $("#description").val();
        var eventDate = document.getElementById("date").value;

        
        
        console.log(readEvent(eventTitle));

        $.post( "https://mars-remind.herokuapp.com/verify/addEvent", { title: eventTitle , description: eventDescription , date: eventDate})
            .done(function( data ) {
                $("#title").val("");
                $("#description").val("");
                document.getElementById("date").value = "";
                alert(data);
        });
    });

});