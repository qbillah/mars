<?php 
    session_start();

    $redURL = "https://mars-remind.herokuapp.com/";
    $dashboard = "https://mars-remind.herokuapp.com/";

    require('dbConn.php');

    if(!isset($_SESSION['uuID'])){
        if(!isset($_COOKIE['uuID'])){
            header("Location: https://mars-remind.herokuapp.com/");
        }else{
            $id = $_COOKIE['uuID'];
        }
    }else{
        $id = $_SESSION['uuID'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(preg_match('/[A-Z]/' , $_POST["newPassword"]) && strlen($_POST["newPassword"]) > 8){
            $user_pass = $_POST["newPassword"];
            $hash = password_hash($user_pass , PASSWORD_DEFAULT);

            $sql = "UPDATE marsUsers SET hash = '$hash' WHERE uniqueUID = '$id' ";
            if($conn->query($sql)){
                header("Location: https://mars-remind.herokuapp.com/?changedPassword=");
            }else{
                header("Location: https://mars-remind.herokuapp.com/");
            }
        }
    }

?>