<?php 
    session_start();

    if(!isset($_SESSION['uuID'])){
        if(!isset($_COOKIE['uuID'])){
            header("Location: https://mars-remind.herokuapp.com/");
        }else{
            $delAcc = $_COOKIE['uuID'];
        }
    }else{
        $delAcc = $_SESSION['uuID'];
    }

    require('dbConn.php');

    $sql = "DELETE FROM $delAcc";

    if($conn->query($sql)){
        header("Location: https://mars-remind.herokuapp.com/");
    }else{
        header("Location: https://mars-remind.herokuapp.com/");
    }

?>