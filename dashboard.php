<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
    unset($result_Sorteio);
    unset($result_Sor);
    unset($row_sorteio);
    unset($result_tick);
    unset($result_tikets);
    $id_atual = $_SESSION['id'];

    $result_n = "SELECT nivel_acesso FROM usuarios WHERE id = $id_atual LIMIT 1";
    $result_nn = mysqli_query($con, $result_n);
    $row_ni = mysqli_fetch_assoc($result_nn);
    $ac = $row_ni['nivel_acesso'];


    $result_Sorteio = "SELECT * FROM sorteios WHERE status = 1 LIMIT 1";
    $result_Sor = mysqli_query($con, $result_Sorteio);
    $row_sorteio = mysqli_fetch_assoc($result_Sor);

    $valAtual = $row_sorteio['valor_final'];
    $datasorteio = $row_sorteio['data_sorteio'];
    $idsorteio = $row_sorteio['id_sorteio'];



    $result_Users = "SELECT * FROM usuarios WHERE id ='$id_atual' LIMIT 1";
    $result_User = mysqli_query($con, $result_Users);
    $row_usu = mysqli_fetch_assoc($result_User);
    $ind_dir = $row_usu['num_indic_dir'];
    $user_saldo = $row_usu['saldo'];

    $result_tick = "SELECT * FROM tickets WHERE id_usuario = ' $id_atual' AND id_sorteio = '$idsorteio' AND status = 1 LIMIT 3";
    $result_tikets = mysqli_query($con, $result_tick);

    $result_notif = "SELECT titulo_post, post, data FROM notifi_post WHERE (id_user = ' $id_atual' OR id_user = 1) AND status = 1 ORDER BY data ASC";
    $result_notifi = mysqli_query($con, $result_notif);
} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}
?> 
<!doctype html>
<html lang="pt-br">

    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:36:11 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Painel de Usuário</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar"  >
        <div class="app-header bg-asteroid header-text-light"> <!--Mudar a cor da barra -->
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <ul class="header-megamenu nav">
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading"><?php echo $row_usu['usuario'] ?></div>
                                                                    <div class="widget-subheading opacity-8">Onde quem compartilha ganha!</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2" ">
                                                                    <button onclick="window.location.href = 'sair.php'" class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="height: 150px;">
                                                <div>
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Minha Conta
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="pg-configusuario.php" class="nav-link">Configurações</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="contact.html" target="_blank" class="nav-link">Contate-nos</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="terms.html" target="_blank" class="nav-link">Sobre</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar bg-vicious-stance sidebar-text-light">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner ">
                        <ul class="vertical-nav-menu">
                            <li  class="mm-active"      >
                                <a>Dashboards</a>
                            <li>
                                <a href="Sor_bilhe.php">Sorteios & Bilhetes</a>
                            </li>
                            <li  >
                                <a href="Afiliados.php"> Amigos Indicados</a>
                            </li>
                            <li>
                                <a href="Saques_tra.php">Saques & Transações</a>
                            </li>
<?php if ($ac == "1") { ?>
                                <li>
                                    <a href="ap-sortatul.php">Dados Sorteio Atual</a>
                                </li>
                                <li>
                                    <a href="ap-aprov.php">Aprovar Saques</a>
                                </li>
                                <li>
                                    <a href="ap-newsort.php">Cirar Novo Sorteio</a>
                                </li>
                                <li>
                                    <a href="ap-sort.php">Sorteio</a>
                                </li>
                                <li>
                                    <a href="ap-busc.php">Busca de Usuario</a>
                                </li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="tabs-animation">
                        <div class="row" >
                            <div class="col-md-6" >
                                <div class="mb-3 text-white card-border bg-success card" style="height: 270px;" >
                                    <div class="card-header">
                                        Proxímo Sorteio
                                        <div class="btn-actions-pane-right">
                                            Nº 0000<?php echo $idsorteio ?>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h1><p>R$  <?php echo $valAtual ?>,00</p></h1>

                                    </div>
                                    <div class="d-block text-right card-footer">
                                        Data: <?php echo date('d/m/Y', strtotime($datasorteio)); ?>                                    
                                    </div>
                                </div>
                            </div> <!-- Area de Sorteio -->
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card" style="height: 270px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Meus Tickets</h5>
                                        <table class="mb-5 table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Num Sorteio</th>
                                                    <th>Meu Tiket</th>
                                                    <th>Data Compra</th>
                                                </tr>
                                            </thead>
                                            <tbody>

<?php $i = "1";
foreach ($result_tikets as $uts) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $uts['id_sorteio']; ?></td>
                                                        <td><?= $uts['num_ticked']; ?></td>
                                                        <td><?= $uts['data_compra']; ?></td>
                                                    </tr>
                                                    <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
                                        <div></div>
                                        <div class="text-center"> 
                                            <a href="pag_enc.php" class="btn-wide mb-2 mr-2 btn-icon btn-icon-right btn-shadow btn-pill btn btn-outline-success btn-lg"onclick="return confirm('Precione ok para continuar com sua compra, sendo redirecionado ao mercado pago.');" >COMPRAR TICKET</a>
                                            <h2 class="card-title"></h2>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Area de Tickets -->
                        </div> <!-- Parte do Sorteio Atual -->
                        <div class="row">
                            <div class="col-md-6 col-xl-3" >
                                <div class="card-shadow-success border mb-3 card card-body border-success " style="height: 269px;">
                                    <h5 class="card-title">SALDO</h5>
                                    <div class="fsize-4">
                                        <h2> <small class="opacity-5">R$</small>
                                            <span><?php echo $row_usu['saldo'] ?>,00</span></h2>
                                    </div>
                                </div>       
                            </div> <!-- Area do Saldo -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card-shadow-info border mb-3 card card-body border-info" style="height: 269px;">
                                    <h5 class="card-title">INDICADOS DIRETOS</h5>
                                    <div class="fsize-4">
                                        <h2> <span><?php echo $row_usu['num_indic_dir'] ?></span></h2>
                                    </div>
                                </div>
                            </div> <!-- Area de indicados diretos -->
                            <div class="col-md-6 col-xl-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Últimas Notificações</h5>
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                    <?php foreach ($result_notifi as $uts) { ?>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title"><?= $uts['titulo_post']; ?></h4>
                                                                    <p><?= $uts['post']; ?></p>
                                                                    <span class="vertical-timeline-element-date"><?= $uts['data']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>  <!-- Area de Notificações -->
                        </div> <!-- Area do Saldo e Notificações -->
                    </div>
                </div>
            </div>
        </div>
        <div class="app-drawer-overlay d-none animated fadeIn">

        </div><script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
</body>


<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:36:45 GMT -->
</html>
