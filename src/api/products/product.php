<?php
    require_once '../connect.php';
    header('Content-Type: application/json');

    
    function  get_product($style){
        global $conn;

        $query = $conn->prepare('SELECT * FROM products WHERE style = ?');
        $query->bind_param('s', $style);
        $query->execute();

        $result = $query->get_result();
        if ($row = $result->num_rows > 0){
            $data = [];

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
        else{
            echo "No product found";
        }

    }

    function get_all_product(){
        global $conn;

        $query = $conn->prepare('SELECT * FROM products');
        $query->execute();

        $result = $query->get_result();
        if ($row = $result->num_rows > 0){
            $data = [];

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
        else{
            echo "No product found";
        }

    }
?>