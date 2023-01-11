
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {


    if (isset($_POST['submit']) && isset($_FILES['photo'])) {
        include "../include/connexion.php";
        $libelle = $_POST['libelle'];
        // $photo = $_POST['photo'];
        $photo = $_FILES['photo'];

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
                    // $sql = "INSERT INTO categories(photo,libelle) 
                    //         VALUES('$fileNameNew',$libelle) ";
                    $sql = $db->prepare("INSERT INTO categories(photo,libelle) 
                                     VALUES('$fileNameNew','$libelle')");
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