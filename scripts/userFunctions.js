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

                emailjs.init("user_QcO3RSFmIVpstkRwN2BBm");

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

                console.log(getCookieEmail());
                console.log(getCookieUser());
                console.log(icon);
                console.log(date);

                var template_params = {
                    "to_email": getCookieEmail(),
                    "event_name": eventTitle,
                    "to_name": getCookieUser(),
                    "event_icon": icon,
                    "event_date": eventDate
                }
                
                var service_id = "default_service";
                var template_id = "marsremind";
                emailjs.send(service_id, template_id, template_params);

                $("#title").val("");
                $("#description").val("");
                document.getElementById("date").value = "";
                window.location.href = "https://mars-remind.herokuapp.com/";
        });
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