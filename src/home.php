<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    // echo $_SESSION['data']['id'];
    echo $twig->render('home.html.twig', [
        'data' => $_SESSION['data']
    ])
?>