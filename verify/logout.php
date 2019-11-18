<?php 
    session_start();
    unset($_SESSION["userID"]);
    unset($_SESSION["uuID"]);
    unset($_SESSION["email"]);
    setcookie('userID', "", time()-7200 , '/');
    setcookie('uuID', "", time()-7200 , '/');
    setcookie('email', "", time()-7200 , '/');
    session_destroy();
    header("Location: https://mars-remind.herokuapp.com");
?>