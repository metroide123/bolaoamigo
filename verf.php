<?php
session_start();
include_once ("conn/connec.php");
if (!empty(filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING))) {
    $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING);
}
if (!empty($h)) {
    unset($result_usuario);
    unset($result_usuario1);
    $result_usuario = "SELECT * FROM usuarios WHERE md5(id) = '$h' LIMIT 1";
    $result_usuario1 = mysqli_query($con, $result_usuario);
    $row_usu = mysqli_fetch_assoc($result_usuario1);
    if ($row_usu['status'] == "0") {
        $id1 = $row_usu['id'];
        $id2 = $row_usu['id_indicador1'];
        if ($id2 !="0") {
            unset($result_usuario);
            unset($result_usuario1);
            $result_usuario = "SELECT * FROM usuarios WHERE id = '$id2' LIMIT 1";
            $result_usuario1 = mysqli_query($con, $result_usuario);
            $row_ref = mysqli_fetch_assoc($result_usuario1);
            $numdir = $row_ref['num_indic_dir'];
            $numdir++;
            $sql_up = "UPDATE usuarios SET num_indic_dir = '$numdir' WHERE id ='$id2'";
            $result_usuario2 = mysqli_query($con, $sql_up);
        }

        $id3 = $row_usuario['id_indicador2'];
        if ($id3 != "0") {
            unset($result_usuario);
            unset($result_usuario1);
            $result_usuario = "SELECT * FROM usuarios WHERE id = '$id3' LIMIT 1";
            $result_usuario1 = mysqli_query($con, $result_usuario);
            $row_ref = mysqli_fetch_assoc($result_usuario1);
            $numdir2 = $row_ref['num_Indic_Ind'];
            $numdir2++;
            $sql_up1 = "UPDATE usuarios SET num_Indic_Ind = '$numdir2' WHERE id ='$id3'";
            $result_usuario3 = mysqli_query($con, $sql_up1);
        }

        $sql_up2 = "UPDATE usuarios SET status = 1 WHERE id ='$id1'";
        $result = mysqli_query($con, $sql_up2);
        
        $menssagem = "Email Verificado Com sucesso.";
    } else {
        $menssagem = "Email Já Verificado!";
    }
} else {
    $menssagem = "Erro ao Verificar Email";
}
?>
<!doctype html>
<html lang="pt-br">


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-forgot-password-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Verificação de Email</title>
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-6">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="h5 modal-title">Verificação de Email
                                            <h6 class="mt-1 mb-0 opacity-8">
                                                <span></span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form class="">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <h6 class="mt-1 mb-0 opacity-8">
                                                                <span style="color: green"><?php echo $menssagem; ?></span>
                                                            </h6></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="divider"></div>
                                        <h6 class="mb-0">
                                            <a href="index.html" class="text-primary">Ir para Home</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Bolão Amigo - 2020</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-forgot-password-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
</html>
