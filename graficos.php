<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    require __DIR__ . "/functions.php";


    $dataUser = $_POST;

    if ($dataUser['tipoGrafico'] == '01'){
        $responseGrafico = $spSelGrafico01($dataUser['pideentrevistado']);

        var_dump($responseGrafico);exit;
        return json_encode($responseGrafico);
    }


}
