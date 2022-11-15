<!DOCTYPE html>
<html lang="es" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/images/favicons/site.webmanifest">
    <!--===============================================================================================-->
    <title><?= $data["title"] ?></title>
    <!-- bulma -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/bower_components/bulma/css/bulma.min.css">
    <!-- bulma -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <!-- fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <!-- jquery -->
    <script src="<?= BASE_URL ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jquery -->
    <!-- datatables -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bm/dt-1.12.1/datatables.min.css" /> -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bm/dt-1.12.1/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.css" />
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bm/dt-1.12.1/datatables.min.js"></script> -->
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bm/dt-1.12.1/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.js">
    </script>
    <!-- datatables -->
    <script src="https://kit.fontawesome.com/7ac530336f.js" crossorigin="anonymous"></script>
    <!-- custom styles -->
    <style>
    table.dataTable.is-hoverable>tbody>tr:hover>* {
        box-shadow: inset 0 0 0 9999px rgb(105 129 139 / 20%) !important;
    }

    table.dataTable.is-striped>tbody>tr>* {
        border-bottom: 1px solid rgb(105 129 139 / 20%);
    }

    table.dataTable {
        border: 1px solid rgb(105 129 139 / 20%);
        border-radius: 10px;
    }

    .table tbody tr:last-child td,
    .table tbody tr:last-child th {
        border-bottom-width: 0 !important;
    }
    </style>
</head>

<body>
    <form id="logout-form" action="<?= BASE_URL ?>/Login/logout" style="display: none;" method="post">
    </form>
    <div id="app">
        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-brand is-right">
                <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
                    <span class="icon pr-5" style="font-size: 2rem;"><i class="mdi mdi-menu"></i></span>
                </a>
            </div>
            <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
                <div class="navbar-end">
                    <div
                        class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
                        <a class="navbar-link is-arrowless">
                            <div class="is-user-avatar">
                                <img src="<?= BASE_URL ?>/images/<?= $_SESSION["rute_profile"] ?>"
                                    alt="<?= $_SESSION["nombre"] ?>">
                            </div>
                            <div class="is-user-name"><span><?= $_SESSION["nombre"] ?></span></div>
                            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="navbar-dropdown">
                            <!-- <a href="profile.html" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a> -->
                            <!-- <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Settings</span>
                            </a> -->
                            <!-- <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Messages</span>
                            </a> -->
                            <!-- <hr class="navbar-divider"> -->
                            <a class="navbar-item" href="#!"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <span class="icon"><i class="mdi mdi-logout"></i></span>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside class="aside is-placed-left is-expanded">
            <div class="aside-tools">
                <div class="aside-tools-label">
                    <span><b>Admin</b> Panel</span>
                </div>
            </div>
            <div class="menu is-menu-main">
                <p class="menu-label">General</p>
                <?php if (isset($_SESSION["Escritorio"]) && $_SESSION["Escritorio"] == 1) {
                    echo '<ul class="menu-list">
                        <li>
                            <a href="' . BASE_URL . '/dashboard" class="is-active router-link-active has-icon">
                                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                                <span class="menu-item-label">Dashboard</span>
                            </a>
                        </li>
                    </ul>';
                } ?>
                <?php if (isset($_SESSION["Almacen"]) && $_SESSION["Almacen"] == 1) {
                    echo '<ul class="menu-list">
                    <li>
                        <a class="has-icon has-dropdown-icon">
                            <span class="icon"><i class="mdi mdi-package"></i></span>
                            <span class="menu-item-label">Almacen</span>
                            <div class="dropdown-icon">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="' . BASE_URL . '/products">
                                    <span>Productos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span>Categorías</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>';
                } ?>
                <?php if (isset($_SESSION["Ventas"]) && $_SESSION["Ventas"] == 1) {
                    echo '<ul class="menu-list">
                    <li>
                        <a class="has-icon has-dropdown-icon">
                            <span class="icon"><i class="mdi mdi-coin"></i></span>
                            <span class="menu-item-label">Ventas</span>
                            <div class="dropdown-icon">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="' . BASE_URL . '/venta/nueva_venta">
                                    <span>Ventas</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span>Clientes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>';
                } ?>
                <?php if (isset($_SESSION["Compras"]) && $_SESSION["Compras"] == 1) {
                    echo '<p class="menu-label">Administrar</p>
                    <ul class="menu-list">
                        <li>
                        <a class="has-icon has-dropdown-icon">
                            <span class="icon"><i class="mdi mdi-vector-square"></i></span>
                            <span class="menu-item-label">Compras</span>
                            <div class="dropdown-icon">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="#!">
                                    <span>Ingreso</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span>Proveedor</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>';
                } ?>
                <?php if (isset($_SESSION["Acceso"]) && $_SESSION["Acceso"] == 1) {
                    echo '<ul class="menu-list">
                    <li>
                        <a class="has-icon has-dropdown-icon">
                            <span class="icon"><i class="mdi mdi-key"></i></span>
                            <span class="menu-item-label">Accesos</span>
                            <div class="dropdown-icon">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="#!">
                                    <span>Usuarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span>Permisos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>';
                } ?>
                <?php if (isset($_SESSION["Consulta Compras"]) && $_SESSION["Consulta Compras"] == 1) {
                    echo '<ul class="menu-list">
                        <li>
                            <a href="#!" class="has-icon">
                                <span class="icon"><i class="mdi mdi-chart-arc"></i></span>
                                <span class="menu-item-label">Compras por fechas</span>
                            </a>
                        </li>
                    </ul>';
                } ?>
                <?php if (isset($_SESSION["Consulta Ventas"]) && $_SESSION["Consulta Ventas"] == 1) {
                    echo '<ul class="menu-list">
                        <li>
                            <a href="#!" class="has-icon">
                                <span class="icon"><i class="mdi mdi-chart-bar"></i></span>
                                <span class="menu-item-label">Consulta Ventas</span>
                            </a>
                        </li>
                    </ul>';
                } ?>
            </div>
        </aside>