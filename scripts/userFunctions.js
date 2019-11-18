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
                    SecureToken : "5f2e68c9-3035-4a48-a31b-ef8eeb82fd24",
                    To : 'them@website.com',
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