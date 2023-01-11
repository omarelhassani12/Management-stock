
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
    if (
        isset($_POST['submit']) && isset($_POST['reference'])
        && isset($_POST['libelle']) && isset($_POST['prix_achat']) && isset($_POST['prix_vente'])
        && isset($_POST['quantite_stock']) && isset($_POST['idCategorie'])
    ) {
        include "../include/connexion.php";
        $photo = $_FILES['photo'];
        $reference = $_POST['reference'];
        $libelle = $_POST['libelle'];
        $prix_unitaire = $_POST['prix_unitaire'];
        $prix_achat = $_POST['prix_achat'];
        $prix_vente = $_POST['prix_vente'];
        $quantite_stock = $_POST['quantite_stock'];
        $idCategorie = $_POST['idCategorie'];

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
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php?uploadsuccess");

                    //insert into database

                    $sql = $db->prepare("INSERT INTO produits(reference,photo,libelle,prix_unitaire,prix_achat,prix_vente,quantite_stock,idCategorie) 
                                     VALUES('$reference','$fileNameNew','$libelle','$prix_unitaire','$prix_achat','$prix_vente','$quantite_stock','$idCategorie')");
                    $sql->execute();
                    header('Location: index.php');
                } else {
                    echo " Your file is too big!";
                }
            } else {
                echo " there was an error  uploading your files";
            }
        } else {
            echo " You cannot  upload files of this type";
        }
    }
}
?>