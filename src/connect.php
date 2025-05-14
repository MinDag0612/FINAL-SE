<?php
    // $host = 'localhost';
    // $db = 'final_se_db';
    // $user = 'root';
    // $pass = '';

    $host = 'db';     
    $db   = 'final_se';       
    $user = 'user';           
    $pass = 'password';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error){
        die("Connect faile". $conn -> connect_error);
    }

    // echo("Connect success");
?>