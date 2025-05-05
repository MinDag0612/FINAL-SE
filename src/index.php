<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $pass = $_POST['password'];

        $queryFindAcc = $conn->prepare("SELECT * FROM account WHERE id = ?");
        $queryFindAcc->bind_param("s", $id);
        $queryFindAcc->execute();

        $resultFind = $queryFindAcc->get_result();
        if ($data = $resultFind->fetch_assoc()){
            if(password_verify($pass, $data['password'])){
                $_SESSION['name'] = $data['name'];
                header('location:home.php');
                exit;
            }
            else{
                echo $twig->render('index.html.twig', [
                    'error' => "Wrong password"
                ]);
            }
        }
        else{
            echo $twig->render('index.html.twig', [
                'error' => "ID doesn't exist"
            ]);
        }
    }
    else{
        echo $twig->render('index.html.twig');
    }
?>