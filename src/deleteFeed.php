<?php
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $query = $conn->prepare("DELETE FROM feedbacks");
        $query->execute();
        
    }
?>