<?php
session_start();
if ($_SESSION['id']) {
    header("Location: dashboard.php");
}
?>

<!doctype html>
<html lang="pt-br">
    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bolão Amigo | Login</title>
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
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div>Bem vindo</div>
                                                <span>Faça login na sua conta.</span>
                                            </h4>

                                        </div>
                                        <div>
                                            <h6 class="text-center text-danger"> 
                                                <?php
                                                if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                    unset($_SESSION['msg']);
                                                }
                                                ?></h6>
                                        </div>
                                        <form id="signupForm" class="" method="post" action="valida.php">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input type="text" name="email" id="exampleEmail" placeholder="Email..."  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input type="password"  name="senha" id="examplePassword" placeholder="Senha..." class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="divider"></div>
                                            <h6 class="mb-0">Não possui conta? <a href="pages-register.php" class="text-primary">Cadastre-se</a></h6>
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-left">
                                            <a href="pg-recuperasenha.php" class="btn-lg btn btn-link">Esqueci minha senha!</a>
                                        </div>
                                        <div class="float-right">
                                            <input type="submit"  name="btnLogin" class="btn btn-primary btn-lg" value="Entrar">
                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
</html>