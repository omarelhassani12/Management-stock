<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
?>
<?php require "../include/header_listes.php"; ?>
<?php include('../include/connexion.php'); ?>

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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <script src="../include/repeater.js" type="text/javascript"></script>
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
                            <li class="breadcrumb-item">Approvisionnements</li>
                            <li class="breadcrumb-item active">Ajouter des approvisionnements</li>
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
                            <li><a href="./index.php">liste des clients</a></li>
                            <li><a href="./addClient.php">ajouter un client</a></li>
                            <li><a href="./liste_form_excel.php">liste des clients pour la form excel</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-car"></i><span>Gestion des
                                fournisseurs</span></a>
                        <ul>
                            <li><a href="../Fournisseur/index.php">liste des fournisseurs</a></li>
                            <li><a href="../Fournisseur/addFournisseur.php">ajouter un fournisseurs</a></li>
                            <li><a href="../Fournisseur/liste_form_excel.php">liste des fournisseurs pour la form
                                    excel</a></li>
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
                    <li class="active">
                        <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-cube"></i></i><span>Les
                                approvisionnements</span></a>
                        <ul>
                            <li><a href="./approvisionnements.php">les approvisionnements</a></li>
                            <li class="active"><a href="./addApprovisionnements.php">ajouter</a></li>
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
                                <h2>Ajouter Votre approvisionnements</h2>
                            </div>
                            <div class="body">
                                <form id="repeater-form" method="POST" action="insert.php">
                                    <div class="form-group">
                                        <label>Numero</label>
                                        <input name="numero" id="numero" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Date d'achat</label>
                                        <input name="date_achat" id="date_achat" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Fournisseur</label>
                                        <select id="idFournisseur" name="idFournisseur">
                                            <?php
                                                $sql = $db->prepare('SELECT * FROM Fournisseur');
                                                $sql->execute();
                                                foreach ($sql as $result) {

                                                ?>
                                            <option value="<?= $result['id'] ?>"><?= $result['nom'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="body items">
                                            <div id="show_item">
                                                <div id="repeater">
                                                    <div class="form-group">
                                                        <label>libelle produit </label>
                                                        <input name="libelleProduit[]" data-skip-name="true"
                                                            data-name="libelleProduit[]" type="text"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Reference produit </label>
                                                        <input name="referenceProduit[]" data-skip-name="true"
                                                            data-name="referenceProduit[]" type="number"
                                                            class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prix achat </label>
                                                        <input name="prix_achat[]" data-skip-name="true"
                                                            data-name="prix_achat[]" type="number" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Quantite achete</label>
                                                        <input name="quantite_achetes[]" data-skip-name="true"
                                                            data-name="quantite_achetes[]" type="number" min="0"
                                                            class="form-control">
                                                    </div>

                                                    <div class="col-md-2 mb-3 d-grid repeater_heading">

                                                        <input type="button" class="btn btn-primary add_item_btn" value="Ajouter autre
                                                        produits">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-success" value="Ajouter">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script>
    $(document).ready(function() {

        $(".add_item_btn").click(function(e) {
            e.preventDefault();
            $("#show_item").prepend(` <div class="body append_item" >
                            <div id="repeater">
                                            <div class="form-group">
                                                <label>libelle produit </label>
                                                <input name="libelleProduit[]" data-skip-name="true"
                                                    data-name="libelleProduit[]" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Reference produit </label>
                                                <input name="referenceProduit[]" data-skip-name="true"
                                                    data-name="referenceProduit[]" type="number"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Prix achat </label>
                                                <input name="prix_achat[]" data-skip-name="true"
                                                    data-name="prix_achat[]" type="number" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Quantite achete</label>
                                                <input name="quantite_achetes[]" data-skip-name="true"
                                                    data-name="quantite_achetes[]" type="number" min="0"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-2 mb-3 d-grid">    
                                                <input type="button" class="btn btn-danger remove_item_btn" value="Remove autre
                                                produits">
                                            </div>
                                        </div>

                            </div>`);
        });
        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });


        $(document).ready(function() {
            // $('#repeater').createRepeater();
            $('#repeater_form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "insert.php",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#repeater_form')[0].reset();
                        $('#repeater').createRepeater();
                        $('#success_result').html(data);

                    }
                })
            })
        });
    });
    </script>



    <?php require "../include/footer.php"; ?>
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/bundles/c3.bundle.js"></script>
    <script src="../assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->

    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/pages/index.js"></script>
    <script src="../assets/js/pages/todo-js.js"></script>
</body>

</html>
<?php } ?>