<?php 

    session_start();

    $redurl = "https://mars-remind.herokuapp.com/?error=100";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["deleteID"])){

            $id = $_POST["deleteID"];

            require('dbConn.php');

            if(isset($_SESSION['uuID'])){
                $table = $_SESSION['uuID'];
            }else if(isset($_COOKIE['uuID'])){
                $table = $_COOKIE["uuID"];
            }else{
                header("Location: $redurl");
            }

            $sql = "DELETE FROM $table WHERE id = '$id' ";
            if($conn->query($sql)){
                echo "Deleted 1 Event :)";
            }else{
                echo "Event delete error :(";
            }

        }
    }else{
        header("Location: $redurl");
    }

?>