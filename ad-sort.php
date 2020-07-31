<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id'] == "1") {
    $id = $_SESSION['id'];
    $btnRegistra = filter_input(INPUT_POST, 'btnconfirmar', FILTER_SANITIZE_STRING);

//verificação se o usuario clicou no botão;
    if ($btnRegistra) {
        $datasorteio = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);

        $valinicial = filter_input(INPUT_POST, 'valor_inicial', FILTER_SANITIZE_STRING);

        $valAtual = filter_input(INPUT_POST, 'valor_atual', FILTER_SANITIZE_STRING);

        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


        if ((!empty($datasorteio)) and ( !empty($valinicial)) and ( !empty($valAtual))) {
            $result_usuario = "SELECT senha FROM usuarios WHERE id = '$id' LIMIT 1";
            $result_usuario1 = mysqli_query($con, $result_usuario);
            $row_usuario = mysqli_fetch_assoc($result_usuario1);
            if ($senha == $row_usuario['senha']) {
                unset($result_usuario);
                unset($result_usuario1);
                unset($sqlr);
                $sqlr = "INSERT INTO sorteios ( data_sorteio, valor_inicial, valor_final, status) "
                        . "VALUES ('$datasorteio', '$valinicial', '$valAtual','0')";

                $resq = mysqli_query($con, $sqlr);
                if (!empty($resq)) {
                    $_SESSION['msg'] = "Cadastro realizado com Sucesso!";
                    header("Location: ap-newsort.php");
                } else {
                    $_SESSION['msg'] = "Ocorreu Algum erro ao cadastrar!";
                   header("Location: ap-newsort.php");
                }
            } else {
                $_SESSION['msg'] = "<p style='color: red'  Senhas incorreta </p>";
                header("Location: ap-newsort.php");
            }
        } else {
            $_SESSION['msg'] = "Por Favor, preencha todos os dados!";
            header("Location: ap-newsort.php");
        }
    } else {
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: pages-login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: pages-login.php");
}