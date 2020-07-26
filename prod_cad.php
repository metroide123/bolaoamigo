<?php
session_start();
include_once ("conn/connec.php");
$btnRegistra = filter_input(INPUT_POST, 'btnRegistrar', FILTER_SANITIZE_STRING);

//verificação se o usuario clicou no botão;
if($btnRegistra){
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
    
    if ((!empty($usuario)) and (!empty($email)) and (!empty($senha)) and (!empty($senhaRep)) and (!empty($telefone))){
        if($senha==$senhaRep){
                $result_usuario = "SELECT email FROM usuarios WHERE email = '$email' LIMIT 1";
                $result_usuario1 = mysqli_query($con, $result_usuario);
                $row_usuario = mysqli_fetch_assoc($result_usuario1);
                    if($row_usuario['email'] != $email){
                        if($IdIndicado!="0"){
                            $result_id = "SELECT * FROM usuarios WHERE id = '$IdIndicado' LIMIT 1";
                            $result_id1 = mysqli_query($con, $result_id);
                            $result_id2 = mysqli_fetch_assoc($result_id1);
                            
                            if($result_id2['id'] == $IdIndicado){
                                $nivel = "1";
                                $id2 = "0";
                                if($result_id2['id_indicador1'] != "0"){
                                    $id2 = $result_id2['id_indicador1'];
                                    $nivel = "2";
                                }                                
                                $saldo = "0";
                                unset($sqlr);
                                $sqlr = "INSERT INTO usuarios ( usuario, senha, email, telefone, id_indicador1, id_indicador2,
                                    Saldo, Nivel)VALUES ('$usuario', '$senha', '$email', '$telefone', '$IdIndicado','$id2', '$saldo', '$nivel')";
                                
                                $resq = mysqli_query($con, $sqlr);
                                if(!empty($resq)){
                                   $_SESSION['msg'] = "Cadastro realizado com Sucesso!";
                                    header("Location: pages-register.php?h=".$IdIndicado);
                                } else {
                                    $_SESSION['msg'] = "Ocorreu Algum erro ao cadastrar!";
                                   header("Location: pages-register.php?h=".$IdIndicado);
                                }

                            } else {
                                $_SESSION['msg'] = "Id de usuario indicado não existe!";
                                header("Location: pages-register.php?h=".$IdIndicado);
                            }
                        }
                        else {
                            $id2 = "0";
                            $IdIndicado = "0";
                            $nivel = "0";
                            $saldo = "0";
                            unset($sql);
                            $sql = "INSERT INTO usuarios ( usuario, senha, email, telefone, id_indicador1, id_indicador2,
                                    Saldo, Nivel) VALUES ('$usuario', '$senha', '$email', '$telefone', '$IdIndicado','$id2', '$saldo', '$nivel')";
                                
                            $res = mysqli_query($con, $sql);
                            if(!empty($res)){
                                $_SESSION['msg'] = "Cadastro realizado com Sucesso!";
                                header("Location: pages-register.php");
                            } else {
                                $_SESSION['msg'] = "Ocorreu Algum erro ao cadastrar...!";
                                header("Location: pages-register.php");
                            }
                        }
                    }
                    else {
                        $_SESSION['msg'] = "<p style='color: red' Email já Cadastrado!</p>";
                        header("Location: pages-register.php");
                    }
        }
        else {
            $_SESSION['msg'] = "Senhas diferentes! por favor digitar senha iguais.";
            header("Location: pages-register.php?h=".$IdIndicado);
        }
    }
    else {
        $_SESSION['msg'] = "Por Favor, preencha todos os dados!";
        header("Location: pages-register.php?h=".$IdIndicado);
    }
}
else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: pages-register.php");
}