<?php 
    session_start();

    if(!isset($_SESSION['userID'])){
        if(!isset($_COOKIE['userID'])){
            header("Location: https://mars-remind.herokuapp.com/");
        }else{
            $uuID = $_COOKIE['userID'];
        }
    }else{
        $uuID = $_SESSION['userID'];
    }

    require('dbConn.php');

    $sql = "DELETE FROM marsUsers WHERE uniqueUID = '$uuID'";

    if($conn->query($sql)){
        $sql = "DROP TABLE $uuID";
        if($conn->query($sql)){
            header("Location: https://mars-remind.herokuapp.com/logout");
        }
    }else{
        header("Location: https://mars-remind.herokuapp.com/");
    }

?>