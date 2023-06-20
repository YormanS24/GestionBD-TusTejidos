<?php
class MenuView
{
    function showMenu()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <title>Das - Tus Tejidos</title>
            <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
            <link rel="icon" href="img/ico.ico" type="image/x-icon" />

            <link rel="stylesheet" href="datatables/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="datatables/datatables/datatables.min.css">
            <link rel="stylesheet" type="text/css" href="datatables/datatables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">

            <!-- Fonts and icons -->
            <script src="js/jsdasboard/webfont.min.js"></script>
            <script>
                WebFont.load({
                    google: {
                        "families": ["Open+Sans:300,400,600,700"]
                    },
                    custom: {
                        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                        urls: ['css/fonts.css']
                    },
                    active: function() {
                        sessionStorage.fonts = true;
                    }
                });
            </script>

            <!-- CSS Files -->
            <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/azzara.min.css">

            <!-- CSS Just for demo purpose, don't include it in your project -->
            <link rel="stylesheet" href="css/demo.css">
        </head>

        <body data-background-color="bg3">
            <div class="wrapper">
                <!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
                <div class="main-header" data-background-color="blue">
                    <!-- Logo Header -->
                    <div class="logo-header">
                        <a href="#" class="logo">
                            <div class="mt-3">
                                <h2>TUS TEJIDOS</h2>
                            </div>
                        </a>
                        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class=" fa fa-bars"></i>
                            </span>
                        </button>
                        <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                        <div class="navbar-minimize">
                            <button class="btn btn-minimize btn-rounded">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                    <!-- End Logo Header -->

                    <!-- Navbar Header -->
                    <nav class="navbar navbar-header navbar-expand-lg">

                        <div class="container-fluid">
                            <div class="collapse" id="search-nav">
                                <form class="navbar-left navbar-form nav-search mr-md-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-search pr-1">
                                                <i class="fa fa-search search-icon"></i>
                                            </button>
                                        </div>
                                        <input type="text" placeholder="Buscar..." class="form-control">
                                    </div>
                                </form>
                            </div>
                            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                                <li class="nav-item toggle-nav-search hidden-caret">
                                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>

                                <li class="nav-item dropdown hidden-caret" id="mostrar">
                                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="img/venta.png" alt="Img Profile">
                                    </a>
                                    <ul class="dropdown-menu messages-notif-box animated fadeIn " aria-labelledby="messageDropdown" id="pagos">
                                        <li>
                                            <div class="dropdown-title d-flex justify-content-between align-items-center">
                                                PRODUCTOS A PAGAR
                                                <a href="#" class="small">Mark all as read</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="message-notif-scroll scrollbar-outer" id="compra">

                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-center mt-2 mb-2">
                                                <button class="btn btn-success" id="pago" onclick="sale.showFacturaa();" disabled>

                                                    <span class="btn-label">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    <input type="hidden" value="APROBADA" id="aprobada" readonly>
                                                    PAGAR
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-danger" id="cancelado" onclick="sale.showFacturaCan();" disabled>
                                                    <input type="hidden" value="CANCELADA" id="cancelada" readonly>
                                                    <span class="btn-label">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                    CANCELAR
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-caret">
                                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell"></i>
                                        <span class="notification">10</span>
                                    </a>
                                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                        <li>
                                            <div class="dropdown-title">You have 4 new notification</div>
                                        </li>
                                        <li>
                                            <div class="notif-scroll scrollbar-outer">
                                                <div class="notif-center">
                                                    <a href="#">
                                                        <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                New user registered
                                                            </span>
                                                            <span class="time">5 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                Rahmad commented on Admin
                                                            </span>
                                                            <span class="time">12 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-img">
                                                            <img src="../assets/img/profile2.jpg" alt="Img Profile">
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                Reza send messages to you
                                                            </span>
                                                            <span class="time">12 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                Farrah liked Admin
                                                            </span>
                                                            <span class="time">17 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-caret">
                                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <div class="avatar-sm">
                                            <img src="img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user animated fadeIn " id="bo">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg"><img src="img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                                                <div class="u-text">
                                                    <h4 id="usu"><?php echo $_SESSION['usuario']; ?></h4>
                                                    <p class="text-muted">YJCARRASCA@UFPSO.CO</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">Ver Perfil</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="fas fa-dollar-sign"></i>&nbsp;My Balance</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i>&nbsp;Configuracion Cuenta</a>
                                            <div class="dropdown-divider"></div>
                                            <a onclick="Menu.closeSession()" class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar Session</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>

                <!-- Sidebar -->
                <div class="sidebar">

                    <div class="sidebar-background"></div>
                    <div class="sidebar-wrapper scrollbar-inner">
                        <div class="sidebar-content">
                            <div class="user">
                                <div class="avatar-sm float-left mr-2">
                                    <img src="img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="info">
                                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                        <span id="usu">
                                            <?php echo $_SESSION['usuario']; ?>
                                            <span class="user-level" id="rango">Administrador</span>
                                            <span class="caret"></span>
                                        </span>
                                    </a>
                                    <div class="clearfix"></div>

                                    <div class="collapse in" id="collapseExample">
                                        <ul class="nav">
                                            <li>
                                                <a href="#profile">
                                                    <span class="link-collapse" id="sub">Ver Perfil</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#settings">
                                                    <span class="link-collapse" id="sub">Configuracion</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav">

                                <li class="nav-item active ">
                                    <a href="index.php">
                                        <i class="fas fa-home"></i>
                                        <p>TUS TEJIDOS</p>
                                        <span class="badge badge-count">5</span>
                                    </a>
                                </li>

                                <li class="nav-section">
                                    <span class="sidebar-mini-icon">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </span>
                                    <h4 class="text-section">EJECUTAR</h4>
                                </li>


                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#forms">
                                        <i class="fas fa-users" id="ges"></i>
                                        <p id="eje">Ges. Usuarios</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="forms">
                                        <ul class="nav nav-collapse">
                                            <!--<li>
                                                <a href="#" onclick="Menu.menu('UsersController/listUser')">
                                                    <i class="fas fa-layer-group" id="lis"></i>&nbsp;Listar Usuarios
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('UsersController/addUser')">
                                                    <i class="fas fa-user-plusfas fa-user-plus" id="cre"></i>&nbsp;Crear Usuario
                                                </a>
                                            </li>-->
                                            <li>
                                                <a href="#" onclick="Menu.menu('UsersController/adminUsers')">
                                                    <i class="fas fa-user-cog" id="lis1"></i>&nbsp;Adm. Usuarios
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!--<li class="nav-item">
                                    <a data-toggle="collapse" href="#base">
                                        <i class="fas fa-handshake" id="pro"></i>
                                        <p id="eje">Ges. Proveedores</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="base">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('ProvidersController/listProver')">
                                                    <i class="fas fa-layer-group" id="lis"></i>&nbsp;Listar Proveedores
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('ProvidersController/showAddProver')">
                                                    <i class="fas fa-user-plusfas fa-user-plus" id="cre"></i>&nbsp;Crear Proveedor
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('ProvidersController/showListProver')">
                                                    <i class="fas fa-user-cog" id="lis1"></i>&nbsp;Admin. Proveedores
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>-->

                                <!--<li class="nav-item">
                                    <a data-toggle="collapse" href="#tables">
                                        <img src="img/materiaPrima.png" alt="">&nbsp;
                                        <p id="eje"> &nbsp;&nbsp;&nbsp;Ges. Materia Prima</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="tables">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('MaterialPriController/listMaterialPri')">
                                                    <i class="fas fa-layer-group" id="lis"></i>&nbsp;Listar Materia Prima
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('MaterialPriController/showAddMaterial')">
                                                    <i class="fas fa-pen-square" id="cre"></i>&nbsp;Regis. Materia Prima
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('MaterialPriController/showListMaterial')">
                                                    <img src="img/admin.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin. Materia Prima
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('MaterialPriController/reportMateriaPrima')">
                                                    <i class="fas fa-file-download" id="report"></i>&nbsp;&nbsp;Generar Reporte
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>-->


                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#tabless">
                                        <img src="img/cliente.png" alt="">&nbsp;
                                        <p id="eje"> &nbsp;&nbsp;&nbsp;Ges. Cliente</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="tabless">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('ClientController/showAddClient')">
                                                    <i class="fas fa-user-plus" id="cree"></i>&nbsp;Registrar Cliente
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('ClientController/showListClient')">
                                                    <img src="img/clienteadmin.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin. Clientes
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                                <!--<li class="nav-item">
                                    <a data-toggle="collapse" href="#tabl">
                                        <img src="img/pedido.png" alt="">&nbsp;
                                        <p id="eje"> &nbsp;&nbsp;&nbsp;Ges. Pedido</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="tabl">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('OrderController/showAddOrder')">
                                                    <i class="fas fa-book" id="cree"></i>Registrar Pedido
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('OrderController/showListOrder')">
                                                    <img src="img/adminpedido.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Admin. Pedido
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#tab">
                                        <img src="img/caja.png" alt="">&nbsp;
                                        <p id="eje"> &nbsp;&nbsp;&nbsp;Pro. Terminados</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="tab">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('productEndController/showAddProductoEnd')">
                                                    <img src="img/terminado.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Registrar Producto
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('productEndController/showListProductEnd')">
                                                    <img src="img/adminpro.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Admin. Producto
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>-->

                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#taab">
                                        <img src="img/compras.png" alt="">&nbsp;
                                        <p id="eje"> &nbsp;&nbsp;&nbsp;Ges. Ventas</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="taab">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#" onclick="Menu.menu('SalesController/showPrdoductSale')">
                                                    <img src="img/facturaR.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Registrar Venta
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="Menu.menu('SalesController/listaFactura')">
                                                    <img src="img/factura.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;Consultar Factutas
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->

                <div class="main-panel ju">
                    <div class="content">
                        <div class="page-inner">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Proveedores</p>
                                                        <h4 class="card-title">1,294</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                                        <i class="la flaticon-layers"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Cant. Productos</p>
                                                        <h4 class="card-title">1303</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                                        <i class="flaticon-analytics"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Ventas</p>
                                                        <h4 class="card-title">$ 1,345</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-danger bubble-shadow-small">
                                                        <i class="flaticon-success"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Pedidos</p>
                                                        <h4 class="card-title">576</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="content">


                            </div>
                        </div>
                    </div>

                </div>


                <!-- Custom template | don't include it in your project! -->
                <div class="custom-template">
                    <div class="title">Configuracion</div>
                    <div class="custom-content">
                        <div class="switcher">
                            <div class="switch-block">
                                <h4>BARRA SUPERIOR</h4>
                                <div class="btnSwitch">
                                    <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
                                    <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
                                    <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
                                    <button type="button" class="changeMainHeaderColor" data-color="green"></button>
                                    <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
                                    <button type="button" class="changeMainHeaderColor" data-color="red"></button>
                                    <button type="button" class="changeMainHeaderColor" data-color="dark"></button>
                                </div>
                            </div>
                            <div class="switch-block">
                                <h4>COLOR DE FONDO</h4>
                                <div class="btnSwitch">
                                    <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                                    <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                                    <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-toggle">
                        <i class="flaticon-settings"></i>
                    </div>
                </div>
                <!-- End Custom template -->

                <!-- MODAL DE LA PAGINA -->


            </div>
            </div>

            <div class="modal fade" id="my_modal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="modal_title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div id="modal_content" class="modal-body">

                        </div>
                        <div class="modal-footer justify-content-center bg-info">
                            <button type="button" class="btn btn-default bg-success" data-dismiss="modal"><i class="fas fa-door-closed"></i>CERRAR</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="my_modal1" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header su">
                            <h5 class="modal-title" id="modal_title1"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div id="modal_content1" class="modal-body">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="my_modal2" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="modal_title2"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div id="modal_content2" class="modal-body">

                        </div>
                        <div class="modal-footer justify-content-center bg-danger">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class=""></i> CANCELAR</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="User.delateUser();"><i class="fas fa-door-closed"></i> ELIMINAR</button>
                        </div>
                    </div>
                </div>
            </div>




            <!--   Core JS Files   -->
            <script src="plugins/jquery/jquery-3.3.1.min.js"></script>
            <script src="plugins/popper/popper.min.js"></script>
            <script src="plugins/bootstrap/js/bootstrap.min.js"></script>

            <!-- jQuery UI -->
            <script src="js/jsdasboard/jquery-ui.min.js"></script>
            <script src="js/jsdasboard/jquery.ui.touch-punch.min.js"></script>

            <!-- jQuery Scrollbar -->
            <script src="js/jsdasboard/jquery.scrollbar.min.js"></script>

            <!-- Moment JS -->
            <script src="js/jsdasboard/moment.min.js"></script>

            <!-- Chart JS -->
            <script src="js/jsdasboard/chart.min.js"></script>

            <!-- jQuery Sparkline -->
            <script src="js/jsdasboard/jquery.sparkline.min.js"></script>

            <!-- Chart Circle -->
            <script src="js/jsdasboard/circles.min.js"></script>

            <!-- Datatables -->
            <script src="js/jsdasboard/datatables.min.js"></script>

            <!-- Bootstrap Notify -->
            <script src="js/jsdasboard/bootstrap-notify.min.js"></script>

            <!-- Bootstrap Toggle -->
            <script src="js/jsdasboard/bootstrap-toggle.min.js"></script>

            <!-- jQuery Vector Maps -->
            <script src="js/jsdasboard/jquery.vmap.min.js"></script>
            <script src="js/jsdasboard/jquery.vmap.world.js"></script>

            <!-- Google Maps Plugin -->
            <script src="js/jsdasboard/gmaps.js"></script>

            <!-- Sweet Alert -->
            <script src="js/jsdasboard/sweetalert.min.js"></script>

            <!-- Azzara JS -->
            <script src="js/jsdasboard/ready.min.js"></script>

            <!-- Azzara DEMO methods, don't include it in your project! -->
            <script src="js/jsdasboard/setting-demo.js"></script>
            <script src="js/jsdasboard/demo.js"></script>

            <!-- js proyecto-->
            <script src="js/Menu.js"></script>
            <script src="js/User.js"></script>
            <script src="js/Provider.js"></script>
            <script src="js/Client.js"></script>
            <script src="js/Material.js"></script>
            <script src="js/Order.js"></script>
            <script src="js/productEnd.js"></script>
            <script src="js/Sale.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



        </body>

        </html>

<?php
    }
}
?>