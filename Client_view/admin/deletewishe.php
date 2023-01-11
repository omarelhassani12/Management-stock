<?php 

session_start();
if(@$_SESSION["autoriser"]!="oui"){
    header("location:../login.php");
    exit();
}

require ("../config.php");
try{
    $id= $_GET['id'];
    $sql= 'DELETE FROM wishes WHERE id =:id';
    $statement = $db->prepare($sql);
    if($statement->execute([':id'=> $id])){
        header("Location:listwishes.php");
    }
}catch(Exeception $e){
    echo "Erreur". $e->getmessage();
    exit();
}
