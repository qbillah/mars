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
});