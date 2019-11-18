<?php 
    session_start();
    unset($_SESSION["userID"]);
    unset($_SESSION["uuID"]);
    setcookie('userID', "", time()-7200 , '/');
    setcookie('uuID', "", time()-7200 , '/');
    session_destroy();
    header("Location: https://mars-remind.herokuapp.com");
?>