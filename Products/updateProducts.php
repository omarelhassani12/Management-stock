<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
?>
<?php require "../include/header_listes.php"; ?>
<?php include('../include/connexion.php'); ?>
<?php
    try {

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $req = $db->prepare("SELECT * FROM produits WHERE id='$id'");
            $req->execute();
            $result = $req->fetch();
        } else {
            header('Location: index.php');
        }
    } catch (Exception $e) {
        echo "it not match";
    }

    if (isset($_POST['update']) && isset($_FILES['photo'])) {
        include "../include/connexion.php";
        // $photo = $_FILES['photo'];
        $reference = $_POST['reference'];
        $libelle = $_POST['libelle'];
        $prix_unitaire = $_POST['prix_unitaire'];
        $prix_achat = $_POST['prix_achat'];
        $prix_vente = $_POST['prix_vente'];
        $quantite_stock = $_POST['quantite_stock'];
        $idCategorie = $_POST['idCategorie'];

        $photo = $_FILES['previous'];

        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];
        $fileType = $_FILES['photo']['type'];


        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));


        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = './uploads/' . $fileNameNew;
                    unlink(('./uploads/' . $result['photo']));
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php?updatesuccess");

                    //update into database

                    $sql = $db->prepare("UPDATE produits SET reference='$reference',photo='$fileNameNew',libelle='$libelle',prix_unitaire='$prix_unitaire',prix_achat='$prix_achat',prix_vente='$prix_vente',quantite_stock='$quantite_stock',idCategorie='$idCategorie' WHERE id='$id'");
                    $sql->execute();
                    header('Location: index.php?message=Updated');
                } else {
                    echo " Your file is too big!";
                }
            } else {
                echo " there was an error  updating your files";
            }
        } else {
            echo " You cannot  update files of this type";
        }
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
                            <li class="breadcrumb-item">Categories</li>
                            <li class="breadcrumb-item active">Modifier des Categories</li>
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
                    <li class="g_heading">Home</li>
                    <li><a href="../index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                    <li class="g_heading">Gestions</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-user"></i><span>Gestion des
                                clients</span></a>
                        <ul>
                            <li><a href="../Clients/index.php">liste des clients</a></li>
                            <li><a href="../Clients/addClient.php">ajouter un client</a></li>
                            <li><a href="../Clients/liste_form_excel.php">liste des clients pour la form excel</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-car"></i><span>Gestion des
                                fournisseurs</span></a>
                        <ul>
                            <li><a href="../Fournisseur/index.php">liste des fournisseurs</a></li>
                            <li><a href="../Fournisseur/AjouterFournisseur.php">ajouter un fournisseurs</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-cubes"></i><span>Gestion des
                                produits</span></a>
                        <ul>
                            <li><a href="../Products/index.php">liste des produits</a></li>
                            <li><a href="../Products/AjouterProducts.php">ajouter un produit</a></li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa  fa-th-large"></i><span>Gestion des
                                categories</span></a>
                        <ul>
                            <li><a href="./index.php">les categories</a></li>
                            <li><a href="./addCategorie.php">ajouter une categorie</a></li>

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


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

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
                                <h2>Modifier Votre categorie</h2>
                            </div>
                            <div class="body">
                                <form id="basic-form" method="POST" action="uploadImg.php"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>current image</label>
                                        <br>
                                        <img src="./uploads/<?= $result['photo']; ?>" alt="">
                                        <input type="hidden" name="previous" value="<?= $result['photo']; ?>">

                                        <hr>
                                        <label>Image de produit</label>
                                        <br>
                                        <input name="photo" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Reference de produit</label>
                                        <input name="reference" type="number" class="form-control"
                                            value="<?= $result['reference'] ?>">
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input name="libelle" type="text" class="form-control"
                                                value="<?= $result['libelle'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Prix unitaire</label>
                                            <input name="prix_unitaire" type="number" min="0" class="form-control"
                                                value="<?= $result['prix_unitaire'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Prix achat</label>
                                            <input name="prix_achat" type="number" min="0" class="form-control"
                                                value="<?= $result['prix_achat'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Prix vente</label>
                                            <input name="prix_vente" type="number" min="0" class="form-control"
                                                value="<?= $result['prix_vente'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Qauntite de Stock</label>
                                            <input name="quantite_stock" type="number" min="0" class="form-control"
                                                value="<?= $result['quantite_stock'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie </label>
                                            <select name="idCategorie" id="idCategorie">
                                                <?php
                                                    $sql = $db->prepare('SELECT * FROM categories');
                                                    $sql->execute();
                                                    foreach ($sql as $result) { ?>
                                                <option value="<?= $result['id']; ?>"><?= $result['libelle']; ?>
                                                </option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <br>
                                        <input type="submit" name="update" id="submit" class="btn btn-primary"
                                            value="Update">
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