<!DOCTYPE html>
<?php 

    session_start();
    require('./verify/dbConn.php');

?>
<html>
    <head>
        <title>🚀 Mars Remind.</title>
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <meta charset="utf-8">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta charset="utf-8">
        <link href="../style/main.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://momentjs.com/downloads/moment.js"></script>
        <?php 
            if(!isset($_SESSION['userID']) && !isset($_COOKIE['userID'])){
                echo "<script src='../scripts/routing.js'></script>";
                echo "<script src='../scripts/main.js'></script>";
            }else if(isset($_SESSION['userID']) || isset($_COOKIE['userID'])){
                echo "<script src='../scripts/userFunctions.js'></script>";
            }
        ?>
        <script src="../scripts/emoji.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
        <script type="text/javascript">
            (function(){
                emailjs.init("user_QcO3RSFmIVpstkRwN2BBm");
            })();
        </script>
    </head>
    <body>
        
        <div class="login-modal">
            <div class="login-wrap">
                <div class="rounded-wrap">🚀 LOGIN TO M.A.R.S 🚀</div>
                <br style="clear:both">
                <form class="landing-login" action="../verify/verifyUser.php" method="post">
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="pass">
                    <br style="clear:both">
                    <br style="clear:both">
                    <input type="submit" value="Login / Sign Up" name="submit">
                </form>
                <br>
                <span>Forgot your password?</span>
            </div>
            <div class="dismiss" id="login-dismiss">Dismiss</div>
        </div>
            
        <div class="main">
            <div class="header">

                <div class="rounded-wrap username-display-landing" style="position: absolute; left: 4.5em;" id="<?php if(isset($_SESSION['userID'])){echo "";}else if(isset($_COOKIE['userID'])){echo "";}else{echo "#about";}?>">
                    <?php 
                        if(isset($_SESSION['userID'])){
                            echo "<a href='https://mars-remind.herokuapp.com/settings'>".$_SESSION['userID']."</a>";
                        }else if(isset($_COOKIE['userID'])){
                            echo "<a href='/settings'>".$_COOKIE['userID']."</a>";
                        }else{
                            echo "About";
                        }
                    ?>
                </div>
                <div class="rounded-wrap">🚀 M.A.R.S 🚀</div>
                <div class="rounded-wrap" style="position: absolute; right: 4.5em; " id="<?php if(isset($_SESSION['userID'])){echo "logout";}else if(isset($_COOKIE['userID'])){echo "logout";}else{echo "login";}?>">
                    <?php 
                        if(isset($_SESSION['userID'])){
                            echo "Logout";
                        }else if(isset($_COOKIE['userID'])){
                            echo "Logout";
                        }else{
                            echo "Login";
                        }
                    ?>
                </div>

            </div>
            <div class="app-container" id="app">

                
                <div class="emoji-sort">
                    <a id="IMP">📌</a>
                    <a id="EML">📨</a>
                    <a id="WRK">👔</a>
                    <a id="LZY">🌴</a>
                    <a id="misc">📎</a>
                </div>

                <div class="todo-item-wrap-nodrag" style="opacity: 1;">
                    <div class="todo-item-added">
                        <div class="actions">
                            <input type="checkbox" class="done">
                        </div>
                        <div class="content">
                            <input class="rem-content" type="text" placeholder="Add new event" name="event-title" id="title">
                            <input class="rem-content" type="text" placeholder="Event description" name="event-description" id="description">
                            <br>
                            <input class="rem-content" type="date" name="event-date" id="date">
                        </div>
                    </div>
                    <div class="edit" id="add">🚀</div>
                </div>

                <?php 

                    if(isset($_SESSION['uuID'])){
                        $user = $_SESSION['uuID'];
                    }else if(isset($_COOKIE['uuID'])){
                        $user = $_COOKIE["uuID"];
                    }else{
                        
                    }
                    
                    $sql = "SELECT * FROM $user ORDER BY eventDate DESC";
                    $results = $conn->query($sql);
                    $events = $results->num_rows;

                    if($events > 0){
                        while($event = $results->fetch_assoc()){

                            switch($event['eventTag']){
                                case "IMP":
                                    $tag = "📌";
                                    break;
                                case "EML":
                                    $tag = "📨";
                                    break;
                                case "WRK":
                                    $tag = "👔";
                                    break;
                                case "LZY":
                                    $tag = "🌴";
                                    break;
                                default:
                                    $tag = "📅";
                                    break;
                            }

                            echo"<div class='todo-item-wrap' style='opacity: 1;'>";
                            echo"<div class='todo-item-added'>";

                            echo"<div class='actions'>";
                            echo"<input type='checkbox' class='done' id='".$event['id']."'>";
                            echo"</div>";

                            echo"<div class='content'>";
                            echo"<input class='rem-content' type='text' value='".$event['event']."' readonly>";
                            echo"<input class='rem-content' type='text' value='".$event['eventDescription']."' readonly>";
                            echo"<br>";
                            echo"<input class='rem-content' type='date' value='".$event['eventDate']."' readonly>";
                            echo"</div>";

                            echo"</div>";
                            
                            echo"<div class='edit'>".$tag."</div>";
                            echo"</div>";
                        }
                    }

                ?>

                <!--NEW TEMPLATE TODO ITEM TEMPLATE-->
                <!--
                <div class="todo-item-wrap">
                    <div class="todo-item">
                        <div class="actions">
                            <input type="checkbox" class="done">
                        </div>
                        <div class="content">
                            <input type="text" placeholder="Reminder Title" class="rem-content">
                            <br>
                            <input type="text" placeholder="Reminder Description" class="rem-content">
                            <br>
                            <input type="date" class="rem-content">
                        </div>
                    </div>
                    <div class="edit">
                        ⚫
                    </div>
                </div>
                -->
                <!--NEW TEMPLATE TODO ITEM TEMPLATE-->

                <!--
                    Pull from DB here *****************
                -->

            </div>
        </div>
    </body>
</html>