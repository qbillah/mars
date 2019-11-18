$(document).ready(function(){

    $("#login-dismiss").click(function(){
        $(".login-modal").slideUp();
    });
    
    $("#login").click(function(){
        $(".login-modal").slideDown().css('display' , 'inline-flex');
    });
    
});