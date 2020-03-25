<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    session_start();

    require_once __DIR__ . "/functions.php";


    $dataUser = $_POST;

    $login = $spSelLogin($_POST);
    if ($login['ideusuario'] != "0"){
        $_SESSION['DATA_USER'] = $login;
        header("Location: index.php");exit;
    }else{
        header("Location: login.php");exit;
    }


}
