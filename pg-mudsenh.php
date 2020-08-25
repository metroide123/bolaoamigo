<?php
session_start();
if (!empty(filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING))) {
    $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING);
}


if (!empty($h)) {
    $IdIndicado = $h;
} else {
    $IdIndicado = "0";
}
?>


<!doctype html>
<html lang="pt-br">


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bolão Amigo | Recuperar Senha</title>
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
                                    <form id="signupForm" method="post"  action="c-mud.php">
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div>Alterar Senha</div>
                                                <span>Digite sua nova senha.</span>
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
                                        
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input type="password" name="senha" id="examplePassword" placeholder="Nova Senha"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input type="password"  name="senharep" id="examplePassword" placeholder="Repetir Senha" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group" style="display: none;">
                                                    <input name="IdIndicado" placeholder="" value="<?php echo $IdIndicado ?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <h6 class="mb-0">Ir para <a href="pages-login.php" class="text-primary">login</a></h6>
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-right">
                                            <input type="submit"  name="btnmudar" class="btn btn-primary btn-lg" value="Mudar Senha">
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



</html>

