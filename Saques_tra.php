<?php 
session_start();
include_once ("conn/connec.php");
if ($_SESSION['id']) {
     unset($result_Users);
     unset( $row_usu);
     unset($row_sorteio);
     unset($result_tick);
     unset($result_tikets);
     
        
     $id_atual = $_SESSION['id'];
     
     $result_Users = "SELECT * FROM usuarios WHERE id ='$id_atual' LIMIT 1";
     $result_User = mysqli_query($con, $result_Users);
     $row_usu = mysqli_fetch_assoc($result_User);
     $ind_dir = $row_usu['num_indic_dir'];
     $user_saldo = $row_usu['saldo'];
   
     $result_saques_espera = "SELECT * FROM saques WHERE id_usuario = ' $id_atual' AND status = 0 ";
     $result_saque_espera = mysqli_query($con, $result_saques_espera);
    
     $result_saques_historico = "SELECT * FROM saques WHERE id_usuario = ' $id_atual' AND status = 1 ";
     $result_saque_historico = mysqli_query($con, $result_saques_historico);
    
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
                                <li>
                                    <a>Saques & Transações</a>
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
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>
                                        <div class="page-title-subheading">
                                        <?php if(isset($_SESSION['msg'])){
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                        }?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6" >
                                <div class="card-shadow-success border mb-3 card card-body border-success " style="height: 269px;">
                                    <h5 class="card-title">SALDO</h5>
                                    <div class="fsize-4">
                                        <h2> <small class="opacity-5">R$</small>
                                            <span><?php echo $row_usu['saldo'] ?>,00</span></h2>
                                    </div>
                                </div>       
                            </div> <!-- Area do Saldo -->
                            <div class="main-card mb-3 card col-xl-6">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitação de Saque</h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="POST" action="solicita_saque.php">
                                        <div class="form-group">
                                            <label for="username">Usuario</label>
                                            <div>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $_SESSION['usuario'] ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite Email do Mercado Pago" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="valor">Valor</label>
                                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite Valor do Saque" />
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Senha</label>
                                            <div>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="btnconfirmar" value="Confirmar">
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- Area das solicitações de saque-->
                        </div> <!-- Area do Saldo e saque-->
                            <div class="main-card mb-3 card col-xl-12">
                                <div class="card-body">
                                    <h5 class="card-title">Minhas Solicitações</h5>
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Código</th>
                                                <th>Conta a receber</th>
                                                <th>Valor</th>
                                                <th>Satus</th>
                                                <th>Data da solicitação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $i="1"; foreach ($result_saque_espera as $uts){ ?>
                                            <tr>
                                                <th scope="row"><?= $i?></th>
                                                <td><?= $uts['id_saque']; ?></td>
                                                <td><?= $uts['email_saque']; ?></td>
                                                <td><?= $uts['valor_saque']; ?></td>
                                                <td class="text-warning">Aguardando</td>
                                                <td><?= $uts['data']; ?></td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                           
                        </div> 
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                     <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Código</th>
                                                <th>Conta a receber</th>
                                                <th>Valor</th>
                                                <th>Satus</th>
                                                <th>Data da solicitação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $i="1"; foreach ($result_saque_historico as $uts){ ?>
                                            <tr>
                                                <th scope="row"><?= $i?></th>
                                                <td><?= $uts['id_saque']; ?></td>
                                                <td><?= $uts['email_saque']; ?></td>
                                                <td><?= $uts['valor_saque']; ?></td>
                                                <td class="text-success" >Aprovado</td>
                                                <td><?= $uts['data']; ?></td>
                                            </tr>
                                            <?php $i++; } ?>
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
