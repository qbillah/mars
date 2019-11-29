<?php 
    session_start();

    if(!isset($_SESSION['userID'])){
        if(!isset($_COOKIE['userID'])){
            header("Location: https://mars-remind.herokuapp.com/");
        }else{
            $delAcc = $_COOKIE['userID'];
        }
    }else{
        $delAcc = $_SESSION['userID'];
    }

    echo $delAcc;

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