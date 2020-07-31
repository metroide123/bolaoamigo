<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']=="1") {
if(!empty($_GET['h'])){
  $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING); 
}

if(!empty($h)){
     $re_sor = "DELETE FROM sorteios WHERE id_sorteio ='$h'";
     $result_User = mysqli_query($con, $re_sor);
     $_SESSION['msg'] = "Sorteio Deletado com Sucesso.";
     header("Location: ap-newsort.php");
} else { 
    echo "erro!";
}



} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}

