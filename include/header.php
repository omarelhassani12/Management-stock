<?php require "./include/session.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Gestion de stock</title>

    <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        .separate-title {
            position: relative;
            left: 45%;
        }

        .header {
            position: relative;
            left: 50%;
        }
    </style>
</head>

<body class="theme-indigo">

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <!-- <a href="index.html" class="navbar-brand"><img src="../assets/images/logo.png" alt="izzyshop" /> -->
            <strong>izzy</strong> shop</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Liste des clients</li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-user text-primary"></i>My Profile</a>

                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-cog text-primary"></i>Settings</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out text-primary"></i>Sign
                                out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">
        <div class="left_sidebar">
            <nav class="sidebar">
                <div class="user-info">
                    <div class="image"><a href="javascript:void(0);"><img src="../assets/images/user.png" alt="User"></a></div>
                    <div class="detail mt-3">
                        <h5 class="mb-0">name of admin</h5>
                        <small>Admin</small>
                    </div>
                </div>
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Home</li>
                    <li><a href="../index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                    <!-- <li><a href="ui-elements.html"><i class="ti-vector"></i><span>UI Elements</span></a></li> -->
                    <!--   <li class="g_heading">Gestion des clients</li>
                    <li><a href="app-calendar.html"><i class="ti-calendar"></i><span>liste des clients</span></a></li>
                    <li><a href="app-taskboard.html"><i class="ti-notepad"></i><span>ajouter client</span></a></li>
                    <li><a href="app-inbox.html"><i class="ti-email"></i><span>Inbox</span></a></li>
                    <li><a href="app-chat.html"><i class="ti-comments"></i><span>Chat Apps</span></a></li>
                    <li><a href="app-contact.html"><i class="ti-id-badge"></i><span>Contact List</span></a></li>
                    <li><a href="widgets.html"><i class="ti-widget"></i><span>Widgets</span></a></li>
 -->
                    <li class="g_heading">Gestions</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-pie-chart"></i><span>Gestion des clients</span></a>
                        <ul>
                            <li><a href="chart-c3.html">liste des clients</a></li>
                            <li><a href="chartsjs.html">ajouter un client</a></li>
                            <li><a href="chartsjs.html">modifier un client</a></li>
                            <li><a href="chart-flot.html">supprimer un client</a></li>
                            <!--  <li><a href="chart-knob.html">JQuery Knob</a></li>
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chart-sparkline.html">Sparkline Chart</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-pencil-alt"></i><span>Gestion des produits</span></a>
                        <ul>
                            <li><a href="chart-c3.html">liste des produits</a></li>
                            <li><a href="chartsjs.html">ajouter un produit</a></li>
                            <li><a href="chartsjs.html">modifier un produit</a></li>
                            <li><a href="chart-flot.html">supprimer un produit</a></li>
                            <!--  <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            <li><a href="form-markdown.html">Markdown</a></li> -->
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>Gestion des categories</span></a>
                        <ul>
                            <li><a href="chart-c3.html">les categories</a></li>
                            <li><a href="chartsjs.html">ajouter une categorie</a></li>
                            <li><a href="chartsjs.html">modifier une categorie</a></li>
                            <li><a href="chart-flot.html">supprimer une categorie</a></li>
                        </ul>
                    </li>
                    <!--   <li class="g_heading">Users</li>
                    <li><a href="page-profile.html"><i class="ti-user"></i><span>Profile</span></a></li>
                    <li><a href="page-timeline.html"><i class="ti-menu-alt"></i><span>Timeline</span></a></li>
                    <li><a href="page-invoices.html"><i class="ti-file"></i><span>Invoices</span></a></li>
                    <li class="g_heading">Authentication</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-lock"></i><span>Authentication</span></a>
                        <ul>
                            <li><a class="dropdown-item" href="auth-login.html">Login</a></li>
                            <li><a class="dropdown-item" href="auth-register.html">Register</a></li>
                            <li><a class="dropdown-item" href="auth-forgot-password.html">Forgot password</a></li>
                            <li><a class="dropdown-item" href="auth-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-na"></i><span>Error Pages</span></a>
                        <ul>
                            <li><a class="dropdown-item" href="error-400.html">400 error</a></li>
                            <li><a class="dropdown-item" href="error-401.html">401 error</a></li>
                            <li><a class="dropdown-item" href="error-403.html">403 error</a></li>
                            <li><a class="dropdown-item" href="error-404.html">404 error</a></li>
                            <li><a class="dropdown-item" href="error-500.html">500 error</a></li>
                            <li><a class="dropdown-item" href="error-503.html">503 error</a></li>
                        </ul>
                    </li>
                    <li class="g_heading">Extra</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-clipboard"></i><span>Pages</span></a>
                        <ul>
                            <li><a href="page-empty.html">Empty page</a></li>
                            <li><a href="page-pricing.html">Pricing cards</a>
                            <li><a href="page-search.html">Search Results</a></li>
                            <li><a href="page-testimonials.html">Testimonials</a></li>
                            <li><a href="page-icons.html">Icons</a></li>
                            <li><a href="page-gallery.html">Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="docs/introduction.html"><i class="ti-file"></i><span>Documentation</span></a></li> -->
                </ul>
            </nav>
        </div>