<?php
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id'] == "1") {
    unset($result_Users);
    unset($row_usu);
    unset($row_sorteio);
    unset($result_tick);
    unset($result_tikets);


    $id_atual = $_SESSION['id'];

    $result_Users = "SELECT * FROM usuarios ";
    $result_User = mysqli_query($con, $result_Users);


    $result = "SELECT count(*) as total FROM usuarios ";
    $result = mysqli_query($con, $result);
    $row_usuario1 = mysqli_fetch_assoc($result);
    $total_user = $row_usuario1['total'];
    unset($result);
    unset($row_usuario1);


    $result = "SELECT count(*) as total FROM usuarios WHERE nivel = 0";
    $result = mysqli_query($con, $result);
    $row_usuario1 = mysqli_fetch_assoc($result);
    $total_usern0 = $row_usuario1['total'];
    unset($result);
    unset($row_usuario1);


    $result = "SELECT count(*) as total FROM usuarios WHERE nivel = 1";
    $result = mysqli_query($con, $result);
    $row_usuario1 = mysqli_fetch_assoc($result);
    $total_usern1 = $row_usuario1['total'];
    unset($result);
    unset($row_usuario1);

    $result = "SELECT count(*) as total FROM usuarios WHERE nivel = 2";
    $result = mysqli_query($con, $result);
    $row_usuario1 = mysqli_fetch_assoc($result);
    $total_usern2 = $row_usuario1['total'];
    unset($result);
    unset($row_usuario1);
} else {
    $_SESSION['msg'] = "Faça Loguin para Acesar a pagina.";
    header("Location: pages-login.php");
}
?>

<!doctype html>
<html lang="pt-br">


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/dashboards-crm-variation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:40:10 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CRM Dashboard - Examples of just how powerful ArchitectUI really is!</title>
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

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
                                <li >
                                    <a href="Sor_bilhe.php">Sorteios & Bilhetes</a>
                                </li>
                                <li>
                                    <a href="Afiliados.php">Amigos Indicados</a>
                                </li>
                                <li   >
                                    <a href="#">Saques & Transações</a>
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
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="main-card mb-3 card">
                            <div class="grid-menu grid-menu-2col">
                                <div class="no-gutters row">
                                    <div class="col-sm-6">
                                        <div class="widget-chart">
                                            <div>
                                                <span class="pl-1">TOTAL USUARIOS</span>
                                            </div>
                                            <div class="widget-numbers"><?php
echo $total_user;
?></div>
                                            <div class="widget-subheading"></div>
                                            <div class="widget-description text-success">
                                                <span class="pl-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="widget-chart">
                                            <div>
                                                <span class="pl-1">TOTAL USUARIOS DE NIVEL 0</span>
                                            </div>
                                            <div class="widget-numbers"><?php
echo $total_usern0;
?></div>
                                            <div class="widget-subheading"></div>
                                            <div class="widget-description text-info">

                                                <span class="pl-1"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="widget-chart">
                                            <div>       
                                                <span class="pl-1">TOTAL USUARIOS DE NIVEL 1</span>
                                            </div>
                                            <div class="widget-numbers"><?php
echo $total_usern1;
?></div>
                                            <div class="widget-subheading"></div>
                                            <div class="widget-description text-success">
                                                <span class="pl-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="widget-chart">
                                            <div>
                                                <span class="pl-1">TOTAL USUARIOS DE NIVEL 2</span>
                                            </div>
                                            <div class="widget-numbers"><?php
echo $total_usern2;
?></div>
                                            <div class="widget-subheading"></div>
                                            <div class="widget-description text-success">
                                                <span class="pl-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <h5 class="card-title">Todos os Usuarios</h5>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Tel</th>
                                            <th>Saldo</th>
                                            <th>Nível</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php foreach ($result_User as $uts) { ?>
                                            <tr>
                                                <th scope="row"><?= $uts['id']; ?></th>
                                                <td><?= $uts['usuario']; ?></td>
                                                <td><?= $uts['email']; ?></td>
                                                <td><?= $uts['telefone']; ?></td>
                                                <td><?= $uts['saldo']; ?></td>
                                                <td><?= $uts['nivel']; ?></td>
                                                <td><?= date('d/m/Y', strtotime($uts['data_de_cadastro'])); ?></td>
                                            </tr>
<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Area da tabela antigos-->
                    </div>
                </div>
            </div>
        </div>
        <div class="app-drawer-overlay d-none animated fadeIn">
        </div><script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    </body>


    <!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/dashboards-crm-variation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 21:40:10 GMT -->
</html>
