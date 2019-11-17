<!DOCTYPE html>
<html>
    <head>
        <title>Mail Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="jquery.ui.touch-punch.min.js"></script>
        <script src="main.js"></script>
        <script src="emoji.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Inconsolata:400,700');
            ::-webkit-scrollbar{
                display: none;
            }
            *{
                box-sizing: border-box;
            }
            html , body{
                margin: 0;
                padding: 0;
                font-family: 'Inconsolata', monospace;
                font-size: 12px;
                font-weight: 300;
                user-select: none;
                -webkit-user-select: none;
            }
            a{
                cursor: pointer;
                margin-left: .5em;
                margin-right: .5em;
            }
            /*
            input[type=checkbox]{
                -webkit-appearance: none;
                width: 22px;
                height: 22px;
                border: 1px solid black;
                border-radius: 100px;
                outline: none;
            }
            input[type=checkbox]:checked{
                background-color: blue;
            }*/
            .main{
                width: 100vw;
                height: 100vh;
                display: inline-flex;
                justify-content: center;
                align-items: top;
            }
            .header{
                font-size: 1em;
                width: 100%;
                height: 60px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                top: 0;
            }
            .app-container{
                margin-top: calc(60px + 3em);
                width: 34.5em;
                height: calc(100vh - 120px);
                transition: width .25s ease-in-out;
            }
            .add{
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin-top: 60px;
                width: 3em;
                height: 4em;
                cursor: pointer;
                font-size: 1.5em;
                border-right: 1px solid black;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
            }
            .edit{
                float: right;
                width: 3em;
                height: 4em;
                cursor: pointer;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5em;
                /*
                border-right: 1px solid black;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                */
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
            }
            span.done{
                font-size: 1.5em;
                cursor: pointer;
            }
            span.item-priority{
                vertical-align: middle;
            }
            .todo-item{
                width: 30em;
                display: inline-flex;
                justify-content: center;
                align-items: top;
                border: 1px solid black;
                padding: 1em;
                margin-bottom: 1em;
                transition: all .25s ease-in-out;
            }
            .todo-item-wrap , .todo-item-wrap-nodrag{
                background-color: white;
                cursor: pointer;
                position: relative;
                width: 34.5em;
                margin-bottom: 1.5em;
                transition: all .25s ease-in-out;
                border-radius: 4px;
                box-shadow: 10px -2.5px 32px 2px rgba(0, 0, 0, 0.125);
                transition: opacity .25s , box-shadow .25s;
            }
            .todo-item-wrap:hover{
                box-shadow: 5px -5px 30px 1px rgba(0, 0, 0, 0.2);
            }
            .todo-item-added{
                width: 30em;
                display: inline-flex;
                justify-content: center;
                align-items: top;
                /*border: 1px solid black;*/
                border-right: none;
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
                padding: 1em;
                transition: all .25s ease-in-out;
            }
            .actions{
                width: 5em;
                display: inline-flex;
                justify-content: left;
                align-items: center;
            }
            .content{
                width: 20em;
                display: inline-block;
            }
            .rem-content{
                width: 100%;
                border: none;
                outline: none;
                font-size: 1em;
                color: blue;
                font-family: 'Inconsolata', monospace;
            }
            .rem-content::placeholder{
                color: black;
                font-family: 'Inconsolata', monospace;
            }
            .emoji-sort{
                border-radius: 4px;
                box-shadow: 10px -2.5px 32px 3px rgba(0, 0, 0, 0.125);
                width: 100%;
                height: 60px;
                margin-bottom: 1em;
                font-size: 1.75em;
                display: inline-flex;
                justify-content: center;
                align-items: center;
            }
            @media screen and (max-width: 800px){
                .app-container{
                    width: 29.5em;
                }
                .todo-item{
                    width: 25em;
                }
                .todo-item-wrap , .todo-item-wrap-nodrag{
                    width: 29.5em;
                }
                .todo-item-added{
                    width: 25em;
                }
                .actions{
                    justify-content: center;
                    margin-left: -.5em;
                }
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <span style="position: absolute; left: 4.5em;">About</span>
                    M.A.R.S 🚀
                <span style="position: absolute; right: 4.5em;">Login</span>
            </div>
            <div class="app-container" id="app">

                
                <div class="emoji-sort">
                    <a id="important">📌</a>
                    <a id="phone">📞</a>
                    <a id="professional">👔</a>
                    <a id="holiday">🎈</a>
                    <a id="vacation">🌴</a>
                </div>
<!--
                <div class="emoji-sort" id="done">
                    <a>✅</a>
                </div>

                <div class="emoji-sort" id="delete">
                    <a>💀</a>
                </div>
-->
                <div class="todo-item-wrap-nodrag" style="opacity: 1;">
                    <div class="todo-item-added">
                        <div class="actions">
                            <input type="checkbox" class="done">
                        </div>
                        <div class="content">
                            <input class="rem-content" type="text" placeholder="Event Title" name="event-title" id="title">
                            <input class="rem-content" type="text" placeholder="Event Description" name="event-description" id="description">
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