<?php
    require 'vendor/autoload.php';
    require_once 'connect.php';

    function storeFeedback($name, $feedback){
        global $conn;
        $query = $conn->prepare('INSERT INTO feedbacks (name, feedback) VALUES (?, ?)');
        $query->bind_param('ss', $name, $feedback);
        if ($query->execute()){
            echo "success";
        }
        else{
            echo "error insert feedback";
        }
        
    }
?>