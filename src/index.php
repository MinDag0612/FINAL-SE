<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $pass = $_POST['password'];
        $role = $_POST['role'];

        if ($role == "staff" && $id == "admin" && $pass == "admin"){
            $queryFindAcc = $conn->prepare("SELECT * FROM account WHERE id = ? and role = ?");
            $queryFindAcc->bind_param("ss", $id, $role);
            $queryFindAcc->execute();

            $resultFind = $queryFindAcc->get_result();
            if ($data = $resultFind->fetch_assoc()){
                $_SESSION['data'] = $data;
                header('location:admin.php');
                exit;
            }
            
        }

        $queryFindAcc = $conn->prepare("SELECT * FROM account WHERE id = ? and role = ?");
        $queryFindAcc->bind_param("ss", $id, $role);
        $queryFindAcc->execute();

        $resultFind = $queryFindAcc->get_result();
        if ($data = $resultFind->fetch_assoc()){
            if(password_verify($pass, $data['password'])){
                $_SESSION['data'] = $data;
                if ($role == "staff"){
                    header('location:home.php');
                    exit;
                }
                else{
                    header('location:dashboard.php');
                    exit;
                }
                
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