<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
?>
<?php require "../include/header_listes.php"; ?>
<?php include('../include/connexion.php'); ?>
<?php
    $id = $_GET['id'];
    $req = $db->prepare('SELECT * FROM fournisseur WHERE id=?');
    $req->execute([$id]);
    $result = $req->fetch();
    if (isset($_POST["Enregistrer"])) {
        $nom = $_POST['nom'];
        $num = $_POST['num'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $req = $db->prepare('UPDATE fournisseur set nom=? WHERE id=?');
        $req->execute([$nom, $id]);
        $ren = $db->prepare('UPDATE fournisseur set tele=? WHERE id=?');
        $ren->execute([$num, $id]);
        $rem = $db->prepare('UPDATE fournisseur set adresse=? WHERE id=?');
        $rem->execute([$adresse, $id]);
        $ree = $db->prepare('UPDATE fournisseur set email=? WHERE id=?');
        $ree->execute([$email, $id]);

        header('location: ./index.php?message=updated');
    }
    ?>

<head>
    <style>
    .container-fluid .row {
        position: relative;
        bottom: -200px;
        left: 15%;
    }

    .header>h2 {
        text-align: center;
        font-size: 400%;
    }

    h2 {
        position: relative;
        left: -75px;
        font-weight: 900;
        color: #fefdfe;
    }
    </style>
</head>

<body class="theme-indigo">

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="../index.php" class="navbar-brand">
                <strong>Izzy</strong> Shop</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Ajouter des clients</li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="../conf/profile.php"><i
                                    class="fa fa-user text-primary"></i>My Profile</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="../logout.php"><i
                                    class="fa fa-sign-out text-primary"></i>Sign
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
                    <?php
                        $id = $_SESSION['id'];
                        $sql = $db->prepare("SELECT * FROM users where id='$id'");
                        $sql->execute();
                        $res = $sql->fetch();
                        ?>
                    <div class="image">
                        <a href="javascript:void(0);"><img src="../conf/uploads/<?= $res['photo']; ?> " alt="User"></a>
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
                    <li class="g_heading ">Home</li>
                    <li><a href="../index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                    <li class="g_heading">Gestions</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-user"></i><span>Gestion des
                                clients</span></a>
                        <ul>
                            <li><a href="../Clients/index.php">liste des clients</a></li>
                            <li><a href="../Clients/addClient.php">ajouter un client</a></li>
                            <li><a href="../Clients/liste_form_excel.php">modifier un client</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-car"></i><span>Gestion des
                                fournisseurs</span></a>
                        <ul>
                            <li><a href="../Fournisseur/index.php">liste des fournisseurs</a></li>
                            <li><a href="../Fournisseur/AjouterFournisseur.php">ajouter un fournisseurs</a></li>
                            <li class="active"><a href="../Fournisseur/ModiefierFournisseur.php">modifier un
                                    fournisseurs</a></li>
                            <li><a href="../Fournisseur//SupprimierFournisseur.php">supprimer un fournisseurs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-cubes"></i><span>Gestion des
                                produits</span></a>
                        <ul>
                            <li><a href="../Products/index.php">liste des produits</a></li>
                            <li><a href="../Products/AjouterProducts.php">ajouter un produit</a></li>
                            <li><a href="../Products/ModiefierProducts.php">modifier un produit</a></li>
                            <li><a href="../Products/SupprimierProducts.php">supprimer un produit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa  fa-th-large"></i><span>Gestion des
                                categories</span></a>
                        <ul>
                            <li><a href="chart-c3.html">les categories</a></li>
                            <li><a href="chartsjs.html">ajouter une categorie</a></li>
                            <li><a href="chartsjs.html">modifier une categorie</a></li>
                            <li><a href="chart-flot.html">supprimer une categorie</a></li>
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
                <a class="navbar-brand" href="javascript:void(0);">Gestion de stock</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">

                        </li>
                        <li class="nav-item dropdown">

                        </li>
                        <li class="nav-item dropdown">

                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- <a href="./Ajouterclient.php"><button type="button" class="btn btn-primary" title="Add client">Add Client</button></a> -->
                        <!-- <a href="./telecharger-excel" title="table des clients" class="btn btn-success ml-2">Voir le table pour telecharger la forme excel</a> -->
                    </form>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="header" style="font-size: 20%; font-weight: 900;">
                                <h2>Ajouter Votre client</h2>
                            </div>
                            <div class="body">
                                <form id="basic-form" method="POST" action="">
                                    <div class="form-group">
                                        <label>Nom complete</label>
                                        <input name="nom" type="text" class="form-control" value="<?= $result['nom'] ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de télephone</label>
                                        <input name="num" type="text" class="form-control"
                                            value="<?= $result['tele'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="adresse" type="text" class="form-control"
                                            value="<?= $result['adresse'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email account</label>
                                        <input name="email" type="email" class="form-control"
                                            value="<?= $result['email'] ?>" required>
                                    </div>
                                    <br>
                                    <input type="submit" name="Enregistrer" class="btn btn-primary" value="Enregistrer">

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

    <script src="../assets/bundles/c3.bundle.js"></script>
    <script src="../assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->

    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/pages/index.js"></script>
    <script src="../assets/js/pages/todo-js.js"></script>
    <?php require "../include/footer.php"; ?>
</body>

</html>
<?php } ?>