<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    require_once __DIR__ . "/functions.php";


    $dataUser = $_POST;

    if ($dataUser['type_operation'] == 'update'){
//        $insert = $insertInterviewee($dataInterviewee);
//        if ($insert){
//            header("Location: index.php");exit;
//        }
    }
    elseif ($dataUser['type_operation'] == 'insert'){
        $insert = $insertUser($dataUser);
        if ($insert){
            header("Location: cadastro_usuario.php");exit;
        }

    }elseif ($dataUser['type_operation'] == 'inabilit'){
        $inabilitUpdate = $inabilitUser($dataUser['pideusuario']);
        if ($inabilitUpdate){
            header("Location: cadastro_usuario.php");exit;
        }

    }

}
