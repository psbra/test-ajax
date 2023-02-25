<?php
    $res = array();

    $usr = "pablo";
    $clave = "3d3232b2f031f070d9ba5969b87776ff";
    $nombre = "Pablito Colombo The great";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        
        if ($usr == $usuario && $clave == md5($password)) {
            $res = ["status" => "OK", "message" => $nombre];
        } else {
            $res = ["status" => "ERROR", "message" => "Usario o Clave incorrecta"];
        }
        

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);



    } else {
        echo "El scritp no soporta metodo get";
    }

?>