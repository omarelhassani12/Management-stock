<?php
session_start();
if(@$_SESSION["autoriser"]!="oui"){
    header("location:../login.php");
    exit();
}

require ("../config.php"); 
$message = '';
try{
    $id = $_POST['id'];
    $sql = "SELECT * FROM user WHERE id=$id";
    $statement = $db->prepare($sql);
    $statement->execute();
    $act = $statement->fetch(PDO::FETCH_OBJ);
    if(isset($_POST['submit'])){
    if (isset ($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['about'])  && isset($_POST['country']) && isset($_POST['adress'])&& isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['twitter'])&& isset($_POST['facebook'])&& isset($_POST['instagram'])&& isset($_POST['linkedin'])) {

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $about = $_POST['about'];
        $country = $_POST['country'];
        $adress = $_POST['adress'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $twitter=$_POST['twitter'];
        $facebook=$_POST['facebook'];
        $instagram=$_POST['instagram'];
        $linkedin=$_POST['linkedin'];
        $sql = "UPDATE user SET  firstname='$firstname',lastname='$lastname',email='$email',about='$about', country='$country',phone='$phone',adress='$adress',linkedin='$linkedin',instagram='$instagram',facebook='$facebook',twitter='$twitter' WHERE id=$id";
        $statement = $db->prepare($sql);
        $statement->execute();

       
        header('location:profile.php');
       
    }
}
}catch(Exeception $e){
    echo "Erreur". $e->getmessage();
    exit();
}

