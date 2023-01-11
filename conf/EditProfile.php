<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
?>
    <?php include("../include/connexion.php"); ?>
    <?php
    $id = $_SESSION['id'];

    $req = $db->prepare("SELECT * FROM users WHERE id='$id'");
    $req->execute();
    $result = $req->fetch();

    ?>

    <head>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Gestion de stock</title>

            <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
            <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

            <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

            <link rel="stylesheet" href="../assets/css/main.css">
            <style>
                .col-lg-4 .card .header h2 {
                    position: relative;
                    left: -64px;
                }

                .col-12 h5 {
                    text-align: center;
                }
            </style>
        </head>
        <!-- /////////////////////////////////////////// -->

    <body class="theme-indigo">
        <!-- //////////////////////////////////////////////::: -->
        <nav class="navbar custom-navbar navbar-expand-lg py-2">
            <div class="container-fluid px-0">
                <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
                <a href="../index.php" class="navbar-brand"><strong>Izzy</strong> Shop</a>
                <div id="navbar_main">
                    <ul class="navbar-nav mr-auto hidden-xs">
                        <li class="nav-item page-header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">User menu</h6>
                                <a class="dropdown-item" href="./profile.php"><i class="fa fa-user text-primary"></i>My Profile</a>
                                <div class="dropdown-divider" role="presentation"></div>
                                <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out text-primary"></i>Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- //////////////////////////////////////////////::: -->
        <div class="main_content" id="main-content">
            <div class="left_sidebar">
                <nav class="sidebar">
                    <div class="user-info">
                        <?php
                        $id = $_SESSION['id'];
                        $sql = $db->prepare("SELECT * FROM users where id='$id'");
                        $sql->execute();
                        $res = $sql->fetch();
                        ?>
                        <div class="image">
                            <a href="javascript:void(0);"><img src="./uploads/<?= $res['photo']; ?> " alt="User"></a>
                        </div>
                        <div class="detail mt-3">
                            <h5 class="mb-0"><?= $res['nom'] ?></h5>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<p> you are logged in ! </p>';
                            }
                            ?>
                            <small>Admin</small>
                        </div>
                    </div>
                    <ul id="main-menu" class="metismenu">
                        <li class="g_heading">Home</li>
                        <li><a href="../index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                        <li class="g_heading">Gestions</li>
                        <li>
                            <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-user"></i><span>Gestion des
                                    clients</span></a>
                            <ul>
                                <li><a href="../Clients/index.php">liste des clients</a></li>
                                <li><a href="../Clients/addclient.php">ajouter un client</a></li>
                                <li><a href="../Clients/liste_form_excel.php">liste des clients pour la form excel</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="has-arrow"><i class="ti-car"></i><span>Gestion des
                                    fournisseurs</span></a>
                            <ul>
                                <li><a href="../Fournisseur/index.php">liste des fournisseurs</a></li>
                                <li><a href="../Fournisseur/AddFournisseur.php">ajouter un fournisseurs</a></li>
                                <li><a href="../Fournisseur/liste_form_excel.php">liste des fournisseurs pour la form excel
                                        fournisseurs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-cubes"></i><span>Gestion des
                                    produits</span></a>
                            <ul>
                                <li><a href="../Products/index.php">liste des produits</a></li>
                                <li><a href="../Products/addProducts.php">ajouter un produit</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="has-arrow"><i class="fa  fa-th-large"></i><span>Gestion des
                                    categories</span></a>
                            <ul>
                                <li><a href="../Categories/index.php">les categories</a></li>
                                <li><a href="../Categories/addCategorie.php">ajouter une categorie</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-cube"></i></i><span>Les
                                    approvisionnements</span></a>
                            <ul>
                                <li><a href="../approvisionnements/approvisionnements.php">les approvisionnements</a></li>
                                <li><a href="../approvisionnements/addApprovisionnements.php">ajouter</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../caisse/caisse.php"><i class="fa fa-calculator"></i><span> Gestion de la
                                    Caisse</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="page">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="javascript:void(0);">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>
                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-12">
                            <h5>Votre Profile</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card pricing2">
                            <div class="body">
                                <div class="pricing-plan">


                                    <form id="basic-form" method="POST" action="./uploadImg.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>current image</label>
                                            <br>
                                            <input type="hidden" name="previous" value="<?= $result['photo']; ?> " alt="User">
                                            <img src="./uploads/<?= $result['photo']; ?>" alt="IMG-CATEGORY" width="200px">
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <br>
                                            <input name="photo" type="file" style="color: white;" value="./uploads/<?= $result['photo'] ?>" alt='IMG-CATEGORY'>
                                        </div>
                                        <div class="form-group">
                                            <label>username</label>
                                            <input name="nom" type="text" class="form-control" value="<?= $result['nom'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="text" class="form-control" value="<?= $result['email'] ?>">
                                        </div>


                                        <br>
                                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>


        <script src="../assets/bundles/libscripts.bundle.js"></script>
        <script src="../assets/bundles/vendorscripts.bundle.js"></script>
        <script src="../assets/bundles/datatablescripts.bundle.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
        <script src="../assets/js/theme.js"></script>
        <script src="../assets/js/pages/tables/jquery-datatable.js"></script>

    </body>

<?php
}
?>