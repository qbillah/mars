<?php 

    session_start();

    $redurl = "https://mars-remind.herokuapp.com/?error=100";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["title"]) && isset($_POST["date"])){

            //SANITIZATION

            $tag = $_POST["tag"];
            $tag = htmlspecialchars($tag);
            $tag = filter_var($tag , FILTER_SANITIZE_STRING);

            $title = $_POST["title"];
            $title = htmlspecialchars($title);
            $title = filter_var($title , FILTER_SANITIZE_STRING);

            $date = $_POST["date"];
            $date = htmlspecialchars($date);
            $date = filter_var($date , FILTER_SANITIZE_STRING);

            if(isset($_POST["description"])){
                $desc = $_POST["description"];
                $desc = htmlspecialchars($desc);
                $desc = filter_var($desc , FILTER_SANITIZE_STRING);
            }
            //SANITIZATION

            require('dbConn.php');

            if(isset($_SESSION['uuID'])){
                $table = $_SESSION['uuID'];
            }else if(isset($_COOKIE['uuID'])){
                $table = $_COOKIE["uuID"];
            }else{
                header("Location: $redurl");
            }

            $sql = "INSERT INTO $table (`event` , `eventDescription` , `eventTag` , `eventDate`) VALUES ('$title' , '$desc' , '$tag' , '$date')";
            if($conn->query($sql)){

                echo "Added 1 Event :)";

                if(isset($_SESSION['email'])){
                    $sendTo = $_SESSION['email'];
                }else if(isset($_COOKIE['email'])){
                    $sendTo = $_COOKIE["email"];
                }else{
                    header("Location: $redurl");
                }

                if(isset($_SESSION['userID'])){
                    $user = $_SESSION['userID'];
                }else if(isset($_COOKIE['userID'])){
                    $user = $_COOKIE["userID"];
                }else{
                    header("Location: $redurl");
                }
                
            }else{
                echo "Event add error :(";
            }

        }
    }else{
        header("Location: $redurl");
    }

?>