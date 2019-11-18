$(document).ready(function(){

    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#add").click(function(){
        
        $("#date").datepicker();

        var read = $("#title").val();

        var data = readEvent(read);

        if(read.includes("::") == true){
            var eventTitle = data[1];
            var eventTag = data[0];
        }else if(read.includes("::") == false){
            var eventTitle = read;
            var eventTag = '';
        }

        var eventDescription = $("#description").val();
        var eventDate = document.getElementById("date").value;

        $.post( "https://mars-remind.herokuapp.com/verify/addEvent", { title: eventTitle , description: eventDescription , tag: eventTag , date: eventDate })
            .done(function( data ) {

                Email.send({
                    SecureToken : "377666a6-fbb4-4db3-bef2-c447d13b0333",
                    To : 'yasinbillahdesigns@gmail.com',
                    From : "marsreminder@gmail.com",
                    Subject : "This is the subject",
                    Body : "And this is the body"
                }).then(
                  message => alert(message)
                );

                $("#title").val("");
                $("#description").val("");
                document.getElementById("date").value = "";
                window.location.href = "https://mars-remind.herokuapp.com/";
        });
    });

    function sendMail(){

    }

});