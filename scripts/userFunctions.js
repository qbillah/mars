$(document).ready(function(){

    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#settings-logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });

    $("#delete-data").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/data";
    });

    $("#delete-data-confirm").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/deleteData";
    });

    $("#delete-account").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/deleteAccount";
    });

    $("#change-pass").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/changePass";
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

                var icon;
                switch(eventTag){
                    case "IMP":
                        icon = "📌";
                        break;
                    case "EML":
                        icon = "📨";
                        break;
                    case "WRK":
                        icon = "👔";
                        break;
                    case "LZY":
                        icon = "🌴";
                        break;
                    default:
                        icon = "📅";
                        break;
                }

                var formatDate = moment(eventDate).format('dddd, MMMM Do YYYY');

                var sendTo = getCookieEmail();
                sendTo = sendTo.replace("%40" , "@");

                var template_params = {
                    "to_email": sendTo,
                    "event_name": eventTitle,
                    "to_name": getCookieUser(),
                    "event_icon": icon,
                    "event_date": formatDate
                }
                
                var service_id = "marsreminder";
                var template_id = "marsremind";

                // IN TESTING MODE - COMMENT THIS OUT
                
                emailjs.send(service_id, template_id, template_params)
                .then(function(response) {
                    $("#title").val("");
                    $("#description").val("");
                    document.getElementById("date").value = "";
                }, function(error) {
                    $("#title").val("");
                    $("#description").val("");
                    document.getElementById("date").value = "";
                    window.location.href = "https://mars-remind.herokuapp.com/?error=100";
                });

                window.location.href = "https://mars-remind.herokuapp.com/";
                
            });
    });

    $('.done').click(function(){
        var deleteKey = $(this).attr('id');
        $.post("https://mars-remind.herokuapp.com/verify/deleteEvent" , {deleteID : deleteKey}).done(function(data){
            window.location.href = "https://mars-remind.herokuapp.com/";
        });
    });
    
    $("#IMP").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=IMP";
    });

    $("#EML").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=EML";
    });

    $("#WRK").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=WRK";
    });

    $("#LZY").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=LZY";
    });

    $("#misc").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=";
    });
    
    function getCookieEmail(name) {
        name = "email";
        var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    }

    function getCookieUser(name) {
        name = "userID";
        var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    }



});