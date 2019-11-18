<?php 
    $servername = "kf3k4aywsrp0d2is.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $username = "q87papupcxlz5d1l";
    $password = "p95vtkeguojiojlt";
    $db = "ebnk3f2sbiz4a9mv";

    $conn = new mysqli($servername , $username , $password , $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>