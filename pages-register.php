<?php
session_start();
if(!empty($_GET['h'])){
  $h = filter_input(INPUT_GET, 'h', FILTER_SANITIZE_STRING); 
}


if(!empty($h)){
    $IdIndicado = $h;
} else {
    $IdIndicado ="0";
}

?>

<!doctype html>
<html lang="pt-br">


<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cadastrar</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-premium-dark">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title">
                                    <h4 class="mt-2">
                                        <div>Welcome,</div>
                                        <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                    </h4>
                                </h5>
                                <?php if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }?>
                                <form method="post" action="prod_cad.php">
                                <div class="divider row"></div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="email" id="exampleEmail"  placeholder="Email..." type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="usuario" id="exampleName" placeholder="Nome..." type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="telefone" id="exampleTel" placeholder="telefone..." type="tel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="password"  id="examplePassword" placeholder="Senha..." type="password"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="passwordrep" id="examplePasswordRep" placeholder="Confirmar Senha..." type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input name="IdIndicado" id="exampleIndicado" placeholder="" value="<?php echo $IdIndicado ?>" type="text" class="form-control">
                                        </div>
                                <div class="mt-3 position-relative form-check">
                                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                    <label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label>
                                </div>
                                <div class="divider row"></div>
                                <h6 class="mb-0">Already have an account?
                                    <a href="javascript:void(0);" class="text-primary">Sign in</a> | <a href="javascript:void(0);" class="text-primary">Recover Password</a>
                                </h6>
                            </div>
                            <div class="modal-footer d-block text-center">
                                <input type="submit" name="btnRegistrar" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" value="Cadastrar">
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">Copyright © ArchitectUI 2019</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>


<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:17 GMT -->
</html>
