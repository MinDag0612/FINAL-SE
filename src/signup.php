<?php
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['fullname'];
        $id = $_POST['staff_id'];
        $pass = $_POST['password'];
        $passConfirm = $_POST['confirm_password'];

        if ($pass != $passConfirm){
            echo $twig->render('signup.html.twig', ['error' => "Password don't match"]);
            return;
        }

        $queryGetID = $conn -> prepare("SELECT * FROM account WHERE id = ?");
        $queryGetID->bind_param("s", $id);
        $queryGetID->execute();

        $idExist = $queryGetID->get_result();
        if ($idExist->fetch_assoc()){
            echo $twig->render('signup.html.twig', ['error' => "ID was used"]);
            return;
        }
        else{
            $hashed = password_hash($pass, PASSWORD_BCRYPT);
            $queryStore = $conn->prepare("INSERT INTO account (name, id, password) VALUES (?, ?, ?)");
            $queryStore->bind_param("sss", $name, $id, $hashed);
            $queryStore->execute();
            echo $twig->render('signup.html.twig', ['error' => "Signup successful, please login"]);
        }

    }
    else{
        echo $twig->render('signup.html.twig');
    }

    

?>