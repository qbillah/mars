<!DOCTYPE html>
<?php 

    session_start();

?>
<html>
    <head>
        <title>Mail Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../style/main.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="jquery.ui.touch-punch.min.js"></script>
        <script src="../scripts/main.js"></script>
        <script src="../scripts/emoji.js"></script>
    </head>
    <body>

        <div class="login-modal">
            <div class="login-wrap">
                <div class="rounded-wrap">🚀 LOGIN TO M.A.R.S 🚀</div>
                <br style="clear:both">
                <form class="landing-login" action="../verify/verifyUser.php" method="post">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Password" name="pass">
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

                <div class="rounded-wrap" style="position: absolute; left: 4.5em;" id="<?php if(isset($_SESSION['userID'])){echo "";}else if(isset($_COOKIE['userID'])){echo "";}else{echo "#about";}?>">
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

                <div class="rounded-wrap">🚀 M.A.R.S 🚀</div>
                <div class="rounded-wrap" style="position: absolute; right: 4.5em;" id="<?php if(isset($_SESSION['userID'])){echo "logout";}else if(isset($_COOKIE['userID'])){echo "logout";}else{echo "login";}?>">
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
                    <a id="important">📌</a>
                    <a id="phone">📞</a>
                    <a id="professional">👔</a>
                    <a id="holiday">🎈</a>
                    <a id="vacation">🌴</a>
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