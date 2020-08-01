<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
    $result_Sorteio = "SELECT * FROM sorteios WHERE status = 1 LIMIT 1";
    $result_Sor = mysqli_query($con, $result_Sorteio);
    $row_sorteio = mysqli_fetch_assoc($result_Sor);
    $valAtual = $row_sorteio['valor_final'];
    $datasorteio = $row_sorteio['data_sorteio'];
    $idsorteio = $row_sorteio['id_sorteio'];
    $id_atual = $_SESSION['id'];
    $result_tick = "SELECT * FROM tickets WHERE id_usuario = ' $id_atual' AND id_sorteio = '$idsorteio' ";
    $result_tikets = mysqli_query($con, $result_tick);

    $id_atual = $_SESSION['id'];

    $result_Users = "SELECT * FROM usuarios WHERE id ='$id_atual' LIMIT 1";
    $result_User = mysqli_query($con, $result_Users);
    $row_usu = mysqli_fetch_assoc($result_User);

    $result_UtmSort = "SELECT * FROM sorteios WHERE status = 0 ";
    $result_Usor = mysqli_query($con, $result_UtmSort);
} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}
?>

<!doctype html>
<html lang="pt-br">


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/tables-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:41 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Data Tables - Choose between regular React Bootstrap tables or advanced dynamic ones.</title>
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Choose between regular React Bootstrap tables or advanced dynamic ones.">

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
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
                                                            <a href="javascript:void(0);" class="nav-link">Configurações</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Contate-nos</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Sobre</a>
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
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                    <a href="dashboard.php" >Dashboards</a>
                                </li>
                                <li>
                                    <a>Sorteios & Bilhetes</a>
                                </li>
                                <li>
                                    <a href="Afiliados.php">Amigos Indicados</a>
                                </li>
                                <li>
                                    <a href="Saques_tra.php">Saques & Transações</a>
                                </li>
                                <?php if ($_SESSION['id'] == "1") { ?>
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
                <div class="app-main__outer"> <!-- Corpo editavel -->
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 text-white card-border bg-success card">
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
                            </div>
                        </div> <!-- Parte do Sorteio Atual -->
                        <div class="row">                       
                            <div class="col-lg-9">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Meus Tickets</h5>
                                        <table class="mb-0 table table-hover">
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
                                                foreach ($result_tikets as $uts) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $uts['id_sorteio']; ?></td>
                                                        <td><?= $uts['num_ticked']; ?></td>
                                                        <td><?= $uts['data_compra']; ?></td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="main-card mb-3 card" style="height: 88%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Participar do Sorterio</h5>
                                        <div class="text-center">
                                            <button class="btn-wide mb-2 mr-2 btn-icon btn-icon-right btn-shadow btn-pill btn btn-outline-success btn-lg">COMPRAR TICKET</button>
                                            <h2 class="card-title"></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Tabela de Tickets e botão de comprar-->
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <thead> 
                                    <h5 class="card-title">ÚLTIMOS SORTEIOS</h5>
                                    <tr>
                                        <th>Nº do Bolão</th>
                                        <th>Data</th>
                                        <th>Valor Final do Bolão</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php foreach ($result_Usor as $uts) { ?>
                                            <tr>
                                                <th scope="row">000<?= $uts['id_sorteio']; ?></th>
                                                <td><?= date('d/m/Y', strtotime($uts['data_sorteio'])); ?></td>
                                                <td><?= $uts['valor_final']; ?></td>
                                            </tr>
<?php } ?>
                                        </tfoot>
                                </table>
                            </div>
                        </div> <!-- Tabela de ultimos sorteios-->
                    </div>
                </div>
            </div></div>

        <div class="app-drawer-overlay d-none animated fadeIn">

        </div><script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    </body>


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/tables-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:39:41 GMT -->
</html>
