<?php

session_start();
include_once ("conn/connec.php");
include "PHPMailer/PHPMailerAutoload.php";


$btnRegistra = filter_input(INPUT_POST, 'btnRegistrar', FILTER_SANITIZE_STRING);


//verificação se o usuario clicou no botão;
if ($btnRegistra) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING
    );
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING
    );
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING
    );
    $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING
    );
    $senhaRep = filter_input(INPUT_POST, 'passwordrep', FILTER_SANITIZE_STRING
    );
    $IdIndicado = filter_input(INPUT_POST, 'IdIndicado', FILTER_SANITIZE_STRING);

    $Checkbox = filter_input(INPUT_POST, 'check', FILTER_SANITIZE_STRING);
    if (!empty($Checkbox)) {
        if ((!empty($usuario)) and ( !empty($email)) and ( !empty($senha)) and ( !empty($senhaRep)) and ( !empty($telefone))) {
            if ($senha == $senhaRep) {
                $result_usuario = "SELECT email FROM usuarios WHERE email = '$email' LIMIT 1";
                $result_usuario1 = mysqli_query($con, $result_usuario);
                $row_usuario = mysqli_fetch_assoc($result_usuario1);
                if ($row_usuario['email'] != $email) {

// Inicia a classe PHPMailer 
                    $mail = new PHPMailer();
// Método de envio 
                    $mail->IsSMTP();
// Enviar por SMTP 
                    $mail->Host = "smtp.hostinger.com.br";
                    $mail->Port = 587;
// Usar autenticação SMTP (obrigatório) 
                    $mail->SMTPAuth = true;
// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
                    $mail->Username = 'contato@bolaoamigo.com';
                    $mail->Password = 'Contato123bolao';
// Configurações de compatibilidade para autenticação em TLS 
                    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
// $mail->SMTPDebug = 2; 
// Define o remetente 
// Seu e-mail 
                    $mail->From = "contato@bolaoamigo.com";
// Seu nome 
                    $mail->FromName = "BolaoAmigo";
// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
                    $mail->IsHTML(true);
// Charset (opcional) 
                    $mail->CharSet = 'UTF-8';
                    // Assunto da mensagem 
                    $mail->Subject = "Verificação de Email";
                    
                    if ($IdIndicado != "0") {
                        unset($result_id );
                        unset($result_id1);
                        unset($result_id2);
                        $result_id = "SELECT * FROM usuarios WHERE id = '$IdIndicado' LIMIT 1";
                        $result_id1 = mysqli_query($con, $result_id);
                        $result_id2 = mysqli_fetch_assoc($result_id1);

                        if ($result_id2['id'] == $IdIndicado) {
                            $nivel = "1";
                            $id2 = "0";
                            if ($result_id2['id_indicador1'] != "0") {
                                $id2 = $result_id2['id_indicador1'];
                                $nivel = "2";
                            }
                            $saldo = "0";
                            unset($sqlr);
                            $sqlr = "INSERT INTO usuarios ( usuario, senha, email, telefone, id_indicador1, id_indicador2,
                                    saldo, nivel, status, part_sorteio) VALUES ('$usuario', '$senha', '$email', '$telefone', '$IdIndicado','$id2', '$saldo', '$nivel', '0', '0')";

                            $resq = mysqli_query($con, $sqlr);
                            if (!empty($resq)) {

                                $verf_id = "SELECT id, usuario  FROM usuarios WHERE email = '$email' LIMIT 1";
                                $res_verf = mysqli_query($con, $verf_id);
                                $row_verf = mysqli_fetch_assoc($res_verf);
                                $use_ref = $row_verf['usuario'];
                                $md5 = md5($row_verf['id']);
                                $link = "https://bolaoamigo.com/verf.php?h=" . $md5;
                                // Define o(s) destinatário(s) 
                                $mail->AddAddress($email, $use_ref);
                                // Corpo do email 
                                $mail->Body = '<div>
                            <div>
                                <div>
                                    <div>
                                            <h3><p> Verificação de Email</p></h3>
                                            <div>
                                               Olá, ' . $use_ref . '.
                                            </div>
                                        </div>
                                        <div>
                                            <p>Para concluir seu cadastro é nescessario a validação do email.</p>
                                            <p>Clique no link para validar seu cadastro:</p>
                                            <p>' . $link . '</p>
                                        </div>
                                        <div>
                                            Bolão Amigo.                                   
                                        </div>
                                </div>
                            </div> <!-- Area de Sorteio -->
                        </div>';

                                $enviado = $mail->Send();

                                if ($enviado) {
                                    $_SESSION['msg'] = "<p style='color: green'>Cadastro realizado com Sucesso! Verifique seu email para completar o cadastro!</p>";
                                } else {
                                    $_SESSION['msg'] = "<p style='color: red'>Erro no Cadastro e envio de verificação!</p>";
                                }
                                header("Location: pages-register.php?h=" . $IdIndicado);
                            } else {
                                $_SESSION['msg'] = "Ocorreu Algum erro ao cadastrar!";
                                header("Location: pages-register.php?h=" . $IdIndicado);
                            }
                        } else {
                            $_SESSION['msg'] = "Id de usuario indicado não existe!";
                            header("Location: pages-register.php?h=" . $IdIndicado);
                        }
                    } 
                    else {
                        $id2 = "0";
                        $IdIndicado = "0";
                        $nivel = "0";
                        $saldo = "0";
                        unset($sql);
                        $sql = "INSERT INTO usuarios ( usuario, senha, email, telefone, id_indicador1, id_indicador2,
                                    saldo, nivel, status, part_sorteio) VALUES ('$usuario', '$senha', '$email', '$telefone', '$IdIndicado','$id2', '$saldo', '$nivel', '0', '0')";

                        $res = mysqli_query($con, $sql);
                        if (!empty($res)) {
                            $verf_id = "SELECT id, usuario FROM usuarios WHERE email = '$email' LIMIT 1";
                            $res_verf = mysqli_query($con, $verf_id);
                            $row_verf = mysqli_fetch_assoc($res_verf);
                            $use_ref = $row_verf['usuario'];
                            $md5 = md5($row_verf['id']);
                            $link = "https://bolaoamigo.com/verf.php?h=" . $md5;
                            // Define o(s) destinatário(s) 
                            $mail->AddAddress($email, $use_ref);
                            // Corpo do email 
                            $mail->Body = '<div>
                            <div>
                                <div>
                                    <div>
                                            <h3><p> Verificação de Email</p></h3>
                                            <div>
                                            Olá, ' . $use_ref . '.
                                            </div>
                                        </div>
                                        <div>
                                            <p>Para concluir seu cadastro é nescessario a validação do email.</p>
                                            <p>Clique no link para validar seu cadastro:</p>
                                            <p>' . $link . '</p>
                                        </div>
                                        <div>
                                            Bolão Amigo.                                   
                                        </div>
                                </div>
                            </div> <!-- Area de Sorteio -->
                        </div>';

                            $enviado = $mail->Send();

                            if ($enviado) {
                                $_SESSION['msg'] = "<p style='color: green'>Cadastro realizado com Sucesso! Verifique seu email para completar o cadastro!</p>";
                            } else {
                                $_SESSION['msg'] = "<p style='color: red'>Erro no Cadastro e envio de verificação!</p>";
                            }
                            header("Location: pages-register.php?h=" . $IdIndicado);
                        } else {
                            $_SESSION['msg'] = "<p style='color: red'>Ocorreu Algum erro ao cadastrar!</p>";
                            header("Location: pages-register.php?h=" . $IdIndicado);
                        }
                    }
                } else {
                    $_SESSION['msg'] = "<p style='color: red'> Email já Cadastrado!</p>";
                    header("Location: pages-register.php");
                }
            } else {
                $_SESSION['msg'] = "<p style='color: red'> Senhas diferentes! por favor digitar senha iguais.</p>";
                header("Location: pages-register.php?h=" . $IdIndicado);
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Por Favor, preencha todos os dados!</p>";
            header("Location: pages-register.php?h=" . $IdIndicado);
        }
    } else {
        $_SESSION['msg'] = "<p style='color: red'>Aceite os termos para dar continuidade no cadastro.</p>";
        header("Location: pages-register.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: red'>Página não encontrada</p>";
    header("Location: pages-register.php");
}