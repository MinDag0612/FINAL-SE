<?php
    require_once 'product.php';
<<<<<<< HEAD
    // header('Content-Type: application/json');
=======
>>>>>>> fd5e00e80d2b8584b05e385b44025710eceeb73a

    if (isset($_POST['style'])){
        $style = $_POST['style'];

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
<<<<<<< HEAD
            echo (get_product($style));
=======
            echo get_product($style);
>>>>>>> fd5e00e80d2b8584b05e385b44025710eceeb73a
        }
        else{
            echo "request method not access";
        }
    }
    else{
        echo "Need POST['style'] to get data";
    }
?>