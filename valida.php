<?php
session_start();
include_once ("conn/connec.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING
);

if($btnLogin){
    $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING
    );
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING
    );
    if ((!empty($usuario)) and (!empty($senha))){
       $result_usuario = "SELECT * FROM usuarios WHERE usuario ='$usuario' LIMIT 1";

       $result_usuario = mysqli_query($con, $result_usuario);
       //echo password_hash($senha, PASSWORD_DEFAULT);
       if ($result_usuario){
          $row_usuario = mysqli_fetch_assoc($result_usuario);
          if($senha==$row_usuario['senha']){
              $_SESSION['id'] = $row_usuario['id'];
              $_SESSION['usuario'] = $row_usuario['usuario'];
               
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


