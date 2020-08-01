<?php
session_start();
include_once ("conn/connec.php");
unset($result_usuario);
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING
);

if($btnLogin){
    $email_user = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING
    );
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING
    );
    if ((!empty($email_user)) and (!empty($senha))){
       $result_usuario = "SELECT * FROM usuarios WHERE email = '$email_user' LIMIT 1";

       $result_usuarior = mysqli_query($con, $result_usuario);
       echo "password_hash($senha, PASSWORD_DEFAULT";
       if ($result_usuarior){
          $row_usuario = mysqli_fetch_assoc($result_usuarior);
          if($senha==$row_usuario['senha'] and $email_user==$row_usuario['email'] ){
              $_SESSION['id'] = $row_usuario['id'];
              $_SESSION['usuario'] = $row_usuario['usuario'];
              $_ac = $row_usuario['nivel_acesso'];
              
               header("Location: dashboard.php");
           } else {
               $_SESSION['msg'] = "loguin e senha incorreto!";
               header("Location: pages-login.php");
           }
       }
    } else {
        $_SESSION['msg'] = "Digite loguin,, e senha!";
        header("Location: pages-login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: pages-login.php");
}


