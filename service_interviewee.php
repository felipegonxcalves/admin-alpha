<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    require __DIR__ . "/functions.php";


    $dataInterviewee = $_POST;

    if ($dataInterviewee['type_operation'] == 'update'){
        $insert = $insertInterviewee($dataInterviewee);
        if ($insert){
            header("Location: index.php");exit;
        }
    }
    elseif ($dataInterviewee['type_operation'] == 'insert'){

        $insert = $insertInterviewee($dataInterviewee);
        if ($insert){
            header("Location: index.php");exit;
        }

    }
    elseif ($dataInterviewee['type_operation'] == 'delete'){

        $delete = $deleteInterviewee($dataInterviewee['pnrocpf']);
        if ($delete){
            header("Location: index.php");exit;
        }

    }

}
