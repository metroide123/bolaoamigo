<?php

session_start();
include_once ("conn/connec.php");
$btnConfirma = filter_input(INPUT_POST, 'btnconfirmar', FILTER_SANITIZE_STRING);

//verificação se o usuario clicou no botão;
if ($btnConfirma) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING
    );
    $usuario = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING
    );
    $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING
    );
    $valor_saque = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);

    if ((!empty($usuario)) and ( !empty($email)) and ( !empty($senha)) and ( !empty($valor_saque))) {
        if ($valor_saque >= "20") {
            $idsec = $_SESSION['id'];
            $result_senha = "SELECT * FROM usuarios WHERE id = '$idsec' LIMIT 1";
            $result_usenha = mysqli_query($con, $result_senha);
            $row_senha = mysqli_fetch_assoc($result_usenha);
            if ($senha == $row_senha['senha']) {
                if ($row_senha['saldo'] >= $valor_saque and $row_senha['saldo'] >= "20") {
                    unset($sql);
                    $sql = "INSERT INTO saques ( id_usuario, valor_saque, email_saque, status)"
                            . " VALUES ('$idsec', '$valor_saque', '$email', '0')";
                    $resq = mysqli_query($con, $sql);
                    if (!empty($resq)) {

                        unset($sqlupd);
                        $atsaldo = $row_senha['saldo'] - $valor_saque;
                        $sqlupd = "UPDATE usuarios SET saldo = '$atsaldo' WHERE id = '$idsec'";
                        $resqUpd = mysqli_query($con, $sqlupd);

                        if (!empty($resqUpd)) {
                            $_SESSION['msg'] = "Soloicitação de saque realizada com Sucesso!";
                            header("Location: Saques_tra.php");
                        } else {
                            $_SESSION['msg'] = "Ocorreu Algum erro na solicitação!";
                            header("Location: Saques_tra.php");
                        }
                        unset($result_senha);
                        unset($row_senha);
                    } else {
                        $_SESSION['msg'] = "Ocorreu Algum erro na solicitação!";
                        header("Location: Saques_tra.php");
                    }
                } else {
                    unset($result_senha);
                    unset($row_senha);
                    $_SESSION['msg'] = "Saldo a baixo do valor solicitado. Valor minimo para saque é de 20 reais.";
                    header("Location: Saques_tra.php ");
                }
            } else {
                unset($result_senha);
                $_SESSION['msg'] = "Senha incorreta!";
                header("Location: Saques_tra.php ");
            }
        } else {
            $_SESSION['msg'] = "Valor solicitado abaixo do minimo. Valor minimo para saque é de 20 reais.";
            header("Location: Saques_tra.php ");
        }
    } else {
        $_SESSION['msg'] = "Por Favor, preencha todos os dados!";
        header("Location: Saques_tra.php ");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: dashboard.php");
}
