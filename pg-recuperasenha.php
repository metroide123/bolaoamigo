<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">


   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Forgot Password Boxed - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
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
                                        <div class="h5 modal-title">Esqueceu sua senha?
                                            <h6 class="mt-1 mb-0 opacity-8">
                                                <span>Digite seu email de acesso para recuperar senha.</span>
                                                <p> <?php
                                                    if (isset($_SESSION['msg'])) {
                                                        echo $_SESSION['msg'];
                                                        unset($_SESSION['msg']);
                                                    }
                                                    ?></p>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form class="" method="POST" action="rec-se.php">
                                                <div>    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="exampleEmail" class="">Email</label>
                                                                <input name="email" id="exampleEmail" placeholder="Email..." type="email" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <h6 class="mb-0">
                                                    <a href="pages-login.php" class="text-primary">Entre com uma conta exitente!</a>
                                                </h6>
                                        </div>
                                        <div class="float-right">
                                            <input type="submit" name="btnRecSenha" class="btn btn-primary btn-lg"></input>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Bolão Amigo - 2020</div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-forgot-password-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
</html>

