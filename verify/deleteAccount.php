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

    $sql = "DELETE FROM marsUsers WHERE uniqueUID = '$delAcc'";

    if($conn->query($sql)){
        $sql = "DROP TABLE $delAcc";
        if($conn->query($sql)){
            header("Location: https://mars-remind.herokuapp.com/logout");
        }
    }else{
        header("Location: https://mars-remind.herokuapp.com/");
    }

?>