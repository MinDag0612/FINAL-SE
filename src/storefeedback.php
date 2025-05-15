<?php
    require_once 'feedback.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];
        echo storeFeedback($name, $feedback);
    }
?>