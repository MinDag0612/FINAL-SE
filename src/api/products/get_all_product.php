<?php
    require_once 'product.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        echo get_all_product();
    }
    else{
        echo "request method not access";
    }
?>