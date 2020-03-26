<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    require __DIR__ . "/functions.php";


    $dataUser = $_POST;

    if ($dataUser['tipoGrafico'] == '01'){
        $responseGrafico01 = $spSelGrafico01($dataUser['pideentrevistado']);
        $responseGrafico02 = $spSelGrafico02($dataUser['pideentrevistado']);
        echo json_encode(["status" => true, "grafico1" => $responseGrafico01, "grafico2" => $responseGrafico02]);
    }


}
