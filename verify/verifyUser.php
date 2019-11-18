<?php 

    //RECYCLED CODE FROM OLD PROJECT

    session_start();

    $redURL = "https://mars-remind.herokuapp.com/";
    $dashboard = "https://mars-remind.herokuapp.com/";

    require('dbConn.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST["email"]) && !empty($_POST["pass"]) === true){
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                header ("Location: $redURL");
            }else{
                if(preg_match('/[A-Z]/' , $_POST["pass"]) && strlen($_POST["pass"]) > 8){

                    $user_email = $_POST["email"];
                    $user_pass = $_POST["pass"];
                    $cleanUser = substr($user_email, 0, strpos($user_email, "@"));

                    $sql = "SELECT * FROM marsUsers WHERE email = '$user_email' and user = '$cleanUser' ";
                    $results = $conn->query($sql);
                    $user_exist = $results->num_rows;

                    if($user_exist === 0){
                        $hash = password_hash($user_pass , PASSWORD_DEFAULT);
                        $sql = "INSERT INTO marsUsers (`email` , `user` , `hash`) VALUE ('$user_email' , '$cleanUser' , '$hash');";
                        if($conn->query($sql)){
                            $sql = "SELECT * FROM marsUsers WHERE email = '$user_email'";
                            $results = $conn->query($sql);
                            if($results->num_rows > 0){
                                while($row = $results->fetch_assoc()){
                                    $id[] = $row["id"];
                                }
                            }
                            $uuID = $cleanUser.$id[0];

                            $sql = "UPDATE marsUsers SET uniqueUID = '$uuID' WHERE email = '$user_email';";
                            $conn->query($sql);
                            
                            $createTable = "
                                CREATE TABLE $uuID(
                                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    event VARCHAR(255),
                                    eventDescription VARCHAR(255),
                                    eventTag VARCHAR(255),
                                    eventDate DATE
                                );
                            ";
                            //TABLE FOR SAVED POSTS
                            $conn->query($createTable);
                            
                            setcookie('userID' , $cleanUser , time()+86400 , '/');
                            setcookie('uuID' , $uuID , time()+86400 , '/');
                            setcookie('email' , $user_email , time()+86400 , '/');
                            $_SESSION["userID"] = $cleanUser;
                            $_SESSION["uuID"] = $uuID;
                            $_SESSION["email"] = $user_email;
                            header("Location: $dashboard");
                        }else{
                            header("Location: $redURL");
                        }
                    }else if($user_exist === 1){
                        $sql = "SELECT * FROM marsUsers WHERE email = '$user_email' ";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $hashOriginal[] = $row["hash"];
                            }
                        }
                        if(password_verify($user_pass , $hashOriginal[0])){
                            $sql = "SELECT * FROM marsUsers WHERE email = '$user_email' ";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                $uuID[] = $row["uniqueUID"];
                                }
                            }

                            setcookie('userID' , $cleanUser , time()+86400 , '/');
                            setcookie('uuID' , $uuID[0] , time()+86400 , '/');
                            setcookie('email' , $user_email , time()+86400 , '/');
                            $_SESSION["userID"] = $cleanUser;
                            $_SESSION["uuID"] = $uuID[0];
                            $_SESSION["email"] = $user_email;
                            header("Location: $dashboard");
                        }else{
                            header("Location: $redURL");
                        }
                    }else{
                        header("Location: $redURL");
                    }

                }else{
                    header("Location: $redURL");
                }
            }
        }else{
            header("Location: $redURL");
        }
    }else{
        header("Location: $redURL");
    }
?>