<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'api/connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('home.html.twig', [
        'name' => $_SESSION['name']
    ])
?>