<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {
?>
<?php require "../include/header_listes.php"; ?>
<?php include('../include/connexion.php'); ?>
<?php
    $id = $_SESSION['username'];

    if (isset($_POST['update']) && isset($_FILES['photo'])) {
        include "../include/connexion.php";
        $nom = $_POST['nom'];
        $email = $_POST['email'];

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
                    header("Location: profile.php?updatesuccess");

                    //update into database

                    $sql = $db->prepare("UPDATE users SET nom='$nom',email='$email',photo='$fileNameNew' WHERE id='$id'");
                    $sql->execute();
                    header('Location: profile.php?erro');
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
}
    ?>