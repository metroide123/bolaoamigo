<?php
session_start();
include_once ("conn/connec.php");
include "PHPMailer/PHPMailerAutoload.php";


$btnmudar = filter_input(INPUT_POST, 'btnmudar', FILTER_SANITIZE_STRING);


//verificação se o usuario clicou no botão;
if ($btnmudar) {
    $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $senharep = filter_input(INPUT_POST, 'passwordrep', FILTER_SANITIZE_STRING);
    $IdIndicado = filter_input(INPUT_POST, 'Id_user', FILTER_SANITIZE_STRING);
    if (!empty($senha) AND !empty($senharep)) {
        if ($senha == $senharep) {
            $sql_up = "UPDATE usuarios SET senha = '$senha' WHERE md5(id) ='$IdIndicado'";
            $result_usuario2 = mysqli_query($con, $sql_up);

            if ($result_usuario2) {
                $result_usuario = "SELECT usuario FROM usuarios WHERE email = '$IdIndicado' LIMIT 1";
                $result_usuario1 = mysqli_query($con, $result_usuario);
                $row_usuario = mysqli_fetch_assoc($result_usuario1);
                $use_ref = $row_usuario['usuario'];
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = "smtp.hostinger.com.br";
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'contato@bolaoamigo.com';
                $mail->Password = 'Contato123bolao';
                $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
                $mail->From = "contato@bolaoamigo.com";
                $mail->FromName = "BolaoAmigo";
                $mail->IsHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = "Nova Senha";
                $mail->AddAddress($email, $use_ref);
                $mail->Body = '<div>
                            <div>
                                <div>
                                    <div>
                                            <h3><p> Mudança de Senha</p></h3>
                                            <div>
                                               Olá, ' . $row_usuario['usuario'] . '.
                                            </div>
                                        </div>
                                        <div>
                                            <p>Sua mudança de senha foi realizada com sucesso</p>
                                            <p>Sua nova senha é: ' . $senha . '</p>
                                        </div>
                                        <div>
                                            Bolão Amigo.                                   
                                        </div>
                                </div>
                            </div> 
                        </div>';

                $enviado = $mail->Send();

                if ($enviado) {
                    $_SESSION['msg'] = "<p style='color: green'>Senha Alterada Com sucesso.</p>";
                } else {
                    $_SESSION['msg'] = "<p style='color: red'>Erro no Cadastro e envio de verificação!</p>";
                }
                header("Location: c-mud.php");
            } else {
                $_SESSION['msg'] = "<p style='color: red'>Erro - erro ao mudar senha!</p>";
                header("Location: c-mud.php");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro - Senhas diferentes!</p>";
            header("Location: c-mud.php");
        }
    } else {
        $_SESSION['msg'] = "<p style='color: red'>Erro - Digite a sua nova Senha!</p>";
        header("Location: c-mud.php");
    }
} else {
        $_SESSION['msg'] = "<p style='color: red'>Erro</p>";
        header("Location: c-mud.php");
}


