$(document).ready(function(){

    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#add").click(function(){
        
        $("#date").datepicker();

        var read = ("#title").val();

        var data = readEvent(read);

        if(read.includes("::") == true){
            var eventTitle = data[0];
            var eventTag = data[1];
            console.log(true);
        }else if(read.includes("::") == false){
            var eventTitle = $("#title").val();
            var eventTag = '';
            console.log(false);
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