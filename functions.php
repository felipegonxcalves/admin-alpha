<?php



$conn = require __DIR__ . "/db_config.php";

//function getUserByCpf($cpf, $conn)
//{
//    $sql = "CALL spselidecandidato(?)";
//        $smtp = $conn->prepare($sql);
//        $smtp->bindValue(1, $cpf);
//        $smtp->execute();
//        $user = $smtp->fetch();
//    return $user;
//}

$getAllInterviewee = function () use ($conn) {
    $sql = "CALL splistaentrevistado()";
    $smtp = $conn->prepare($sql);

    $smtp->execute();
    $user = $smtp->fetchAll();
    return $user;
};

$insertInterviewee = function ($params) use($conn) {
    $sql = "CALL spinsentrevistado(?, ?, ?)";
        $smtp = $conn->prepare($sql);
        $smtp->bindValue(1, $params['pnomentrevistado']);
        $smtp->bindValue(2, $params['pnrocpf']);
        $smtp->bindValue(3, "S");
        $interviewee = $smtp->execute();

    return $interviewee;
};

$insertUser = function ($params) use($conn) {
    $sql = "CALL spinsupdusuario(?, ?)";
        $smtp = $conn->prepare($sql);
        $smtp->bindValue(1, $params['pdeslogin']);
        $smtp->bindValue(2, $params['pdessenha']);
        $interviewee = $smtp->execute();

    return $interviewee;
};

$inabilitUser = function ($params) use($conn) {
    $sql = "CALL spupdinabilitausuario(?)";
    $smtp = $conn->prepare($sql);
    $smtp->bindValue(1, $params);
    $interviewee = $smtp->execute();

    return $interviewee;
};


$deleteInterviewee = function ($params) use($conn) {

    $sql = "CALL spdelentrevistado(?)";
    $smtp = $conn->prepare($sql);
    $smtp->bindValue(1, $params);
    $interviewee = $smtp->execute();
    return $interviewee;
};

$getAllUsers = function () use ($conn) {
    $sql = "CALL splistausuario()";
    $smtp = $conn->prepare($sql);

    $smtp->execute();
    $user = $smtp->fetchAll();
    return $user;
};

$spSelGrafico01 = function ($params) use ($conn) {
    $sql = "CALL spselgrafico01(?)";
    $smtp = $conn->prepare($sql);
    $smtp->bindValue(1, $params);
    $smtp->execute();
    $grafico01 = $smtp->fetch();
    return $grafico01;
};

$spSelLogin = function ($params) use ($conn) {
    $sql = "CALL spselLogin(?, ?)";
    $smtp = $conn->prepare($sql);
    $smtp->bindValue(1, $params['pdeslogin']);
    $smtp->bindValue(2, $params['pdessenha']);
    $smtp->execute();
    $login = $smtp->fetch();
    return $login;
};

function validateAuth()
{
    if (!isset($_SESSION['DATA_USER'])){
        header("Location: login.php");exit;
    }
}

//function insertQuestion($data, $conn)
//{
////        var_dump($data);
//    $sql = "CALL spinsresposta2(?, ?, ?)";
//    $smtp = $conn->prepare($sql);
//    $smtp->bindValue(1, $data['ideentrevistado']);
//    $smtp->bindValue(2, $data['nro_questao']);
//    $smtp->bindValue(3, $data['desresposta']);
//    $smtp->execute();
//
//    return $smtp;
//}
//
//function renderQuestion($questao)
//{
//    header("Location: {$questao}.php");exit;
//}
