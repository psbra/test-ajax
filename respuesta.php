<?php
    $res = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $res = ["usuario" => $usuario, "password" => $password];

        echo json_encode($res);


        
    } else {
        echo "El scritp no soporta metodo get";
    }

?>