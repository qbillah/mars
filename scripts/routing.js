$(document).ready(function(){
    $("#login-dismiss").click(function(){
        $(".login-modal").slideUp();
    });
    
    $("#login").click(function(){
        $(".login-modal").slideDown().css('display' , 'inline-flex');
    });
    
    $("#logout").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/verify/logout";
    });
    $("#add").click(function(){
        $("#date").datepicker();
        var eventTitle = $("#title").val();
        var eventDescription = $("#description").val();
        var eventDate = document.getElementById("date").value;

        $.ajax({
            type: "POST",
            url: 'https://mars-remind.herokuapp.com/verify/addEvent',
            data: {
                title : eventTitle
            },
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData);
            }
        });
    });
});