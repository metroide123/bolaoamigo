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
       
       if ($result_usuarior){
          $row_usuario = mysqli_fetch_assoc($result_usuarior);   
          if($row_usuario['status'] == "1"){
          if($senha== $row_usuario['senha'] and $email_user==$row_usuario['email'] ){
              $_SESSION['id'] = $row_usuario['id'];
              $_SESSION['usuario'] = $row_usuario['usuario'];
              
               header("Location: dashboard.php");
           } 
           else {
               $_SESSION['msg'] = "login e senha incorreto!";
               header("Location: pages-login.php");
           }
          } else {
              $_SESSION['msg'] = "Você ainda não verificou seu email.";
              header("Location: pages-login.php");
          }       
           
           }
       
    } else {
        $_SESSION['msg'] = "Digite login e senha!";
        header("Location: pages-login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: pages-login.php");
}


