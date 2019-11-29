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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.4.1/dist/email.min.js"></script>
        <?php 
            if(!isset($_SESSION['userID']) && !isset($_COOKIE['userID'])){
                echo "<script src='../scripts/routing.js'></script>";
                echo "<script src='../scripts/main.js'></script>";
            }else if(isset($_SESSION['userID']) || isset($_COOKIE['userID'])){
                echo "<script src='../scripts/userFunctions.js'></script>";
            }
        ?>
        <script src="../scripts/emoji.js"></script>
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
                            echo $_SESSION['userID'];
                        }else if(isset($_COOKIE['userID'])){
                            echo $_COOKIE['userID'];
                        }else{
                            echo "About";
                        }
                    ?>
                </div>
                <div class="rounded-wrap">🚀 Settings 🚀</div>
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
            <div class="app-container" id="settings">
                <div class="settings-wrap">
                    <button class="settings">Change password 🔒</button>
                    <button class="settings">Change email 📧</button>
                    <button class="settings">Delete my data 🗑️</button>
                    <button class="settings">Delete my account ⛔</button>
                    <button class="settings" id="settings-logout">Logout 🛑</button>
                </div>
            </div>
        </div>

    </body>
</html>