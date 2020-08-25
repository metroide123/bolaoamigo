<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
     $id_atual = $_SESSION['id'];
     
     $result_n = "SELECT nivel_acesso FROM usuarios WHERE id = $id_atual LIMIT 1";
     $result_nn = mysqli_query($con, $result_n);
     $row_ni = mysqli_fetch_assoc($result_nn);
     $ac = $row_ni['nivel_acesso'];
     
if($ac == "1"){     
if(!empty($_GET['h'])){
  $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING); 
}

if(!empty($h)){
     $re_sor = "UPDATE saques SET status = 2 WHERE id_saque ='$h'";
     $result_User = mysqli_query($con, $re_sor);
     $_SESSION['msg'] = "<p style='color: gree' Saque Aprovado </p>";
     header("Location: ap-aprov.php");
} else { 
    echo "erro!";
}
} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}


} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}

