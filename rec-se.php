<?php
session_start();
include_once ("conn/connec.php");
include "PHPMailer/PHPMailerAutoload.php";

$btnrec = filter_input(INPUT_POST, 'btnRecSenha', FILTER_SANITIZE_STRING);


//verificação se o usuario clicou no botão;
if ($btnrec) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING
    );
    if (!empty($email)) {
        $result_usuario = "SELECT usuario, id, email FROM usuarios WHERE email = '$email' LIMIT 1";
        $result_usuario1 = mysqli_query($con, $result_usuario);
        $row_usuario = mysqli_fetch_assoc($result_usuario1);
        if ($row_usuario['email'] == $email) {
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
            $mail->Subject = "Recuperação de Senha";
            $mail->AddAddress($email, $use_ref);
            $md5 = md5($row_usuario['id']);
            $link = "https://bolaoamigo.com/pg-mudsenh.php?h=" . $md5;
            $mail->Body = '<div>
                            <div>
                                <div>
                                    <div>
                                            <h3><p> Verificação de Email</p></h3>
                                            <div>
                                               Olá, ' . $row_usuario['usuario']. '.
                                            </div>
                                        </div>
                                        <div>
                                            <p>Para mudança de senha é nescessario clicar no link abaixo:</p>
                                            <p>' . $link . '</p>
                                        </div>
                                        <div>
                                            Bolão Amigo.                                   
                                        </div>
                                </div>
                            </div> 
                        </div>';

            $enviado = $mail->Send();

            if ($enviado) {
                $_SESSION['msg'] = "<p style='color: green'>Um enviado um link para mudança de senha ao seu email.</p>";
            } else {
                $_SESSION['msg'] = "<p style='color: red'>Erro no Cadastro e envio de verificação!</p>";
            }


            header("Location: pg-recuperasenha.php");
        } 
        else {
            $_SESSION['msg'] = "<p style='color: red'>Email não cadastrado <br> Digite um email valido.</p>";
            header("Location: pg-recuperasenha.php");
        }
    } else {
        $_SESSION['msg'] = "<p style='color: red'>Digite um email valido.</p>";
        header("Location: pg-recuperasenha.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: red'>Página não encontrada</p>";
    header("Location: pages-login.php");
}