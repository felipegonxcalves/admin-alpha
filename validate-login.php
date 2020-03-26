<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $conn = require __DIR__ . "/db_config.php";

    $spSelLogin = function ($params) use ($conn) {
        $sql = "CALL spselLogin(?, ?)";
        $smtp = $conn->prepare($sql);
        $smtp->bindValue(1, $params['pdeslogin']);
        $smtp->bindValue(2, $params['pdessenha']);
        $smtp->execute();
        $login = $smtp->fetch();
        return $login;
    };


    $dataUser = $_POST;

    $login = $spSelLogin($_POST);
    if ($login['ideusuario'] == "0"){
        var_dump("Entrou");
        header("Location: login.php");exit;
    }else{
        $_SESSION['DATA_USER'] = $login;
        header("Location: index.php");exit;
    }




}

function validateAuth()
{
    if (!isset($_SESSION['DATA_USER'])){
        header("Location: login.php");exit;
    }
}
