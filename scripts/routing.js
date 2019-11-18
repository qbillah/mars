$(document).ready(function(){

    $("#login-dismiss").click(function(){
        $(".login-modal").slideUp();
    });
    
    $("#login").click(function(){
        $(".login-modal").slideDown().css('display' , 'inline-flex');
    });
    
    $("#IMP").click(function(){
        window.location.href = "https://mars-remind.herokuapp.com/search?tag=WRK";
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

});