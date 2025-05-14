<?php
    require_once 'product.php';
    // header('Content-Type: application/json');

    if (isset($_POST['style'])){
        $style = $_POST['style'];

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo (get_product($style));
        }
        else{
            echo "request method not access";
        }
    }
    else{
        echo "Need POST['style'] to get data";
    }
?>