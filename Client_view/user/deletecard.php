<?php 

session_start();
if(@$_SESSION["autoriser"]!="oui"){
    header("location:../login.php");
    exit();
}

require ("../config.php");
try{
    $sql= "TRUNCATE cart ";
    $statement = $db->prepare($sql);
    if($statement->execute()){
        header("Location:shoping-cart.php");
    }
}catch(Exeception $e){
    echo "Erreur". $e->getmessage();
    exit();
}

