<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
    $id_atual = $_SESSION['id'];

    $result_Sorteio = "SELECT * FROM sorteios WHERE status = 1 LIMIT 1";
    $result_Sor = mysqli_query($con, $result_Sorteio);
    $row_sorteio = mysqli_fetch_assoc($result_Sor);
    $id_sorteio = $row_sorteio['id_sorteio'];

    unset($sqlr);
    $sqlr = "INSERT INTO tickets  (id_sorteio, id_usuario, status,  valor_tick, num_ticked) "
            . "VALUES ('$id_sorteio', '$id_atual', '0', '10', '0' )";

    $resq = mysqli_query($con, $sqlr);
    if ($resq) {
         header ("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=177162739-76b2ef0a-17ab-4d02-a69f-a4b7ffdc1735");
    } else {
        $_SESSION['msg'] = "Erro na solicitação";
        header("Location: Sor_bilhe.php");
    }
} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}
