<?php
session_start();
if(@$_SESSION["autoriser"]!="oui"){
    header("location:../login.php");
    exit();
}

require ("../config.php"); 
try{
    $id = $_POST['id'];
    $sql = "SELECT * FROM cart WHERE id=$id";
    $statement = $db->prepare($sql);
    $statement->execute();
    $act = $statement->fetch(PDO::FETCH_OBJ);
    if(isset($_POST['submit'])){
        if (isset ($_POST['prix']) && isset($_POST['quantite'])){
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            $total=$prix*$quantite;
            $sql = "UPDATE cart SET quantite='$quantite',total='$total'  WHERE id=$id";
            $statement = $db->prepare($sql);
            $statement->execute();
            header('location:index.php');
        
        }
    }
}catch(Exeception $e){
    echo "Erreur". $e->getmessage();
    exit();
}