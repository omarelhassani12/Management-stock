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
    if (isset ($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['renewpassword']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
        $password = validate($_POST['password']);
        $newpassword = validate($_POST['newpassword']);
        $renewpassword  = validate($_POST['renewpassword']);
        // hashing the password
    	$password = md5($password);
    	$newpassword = md5($newpassword);
    	$renewpassword = md5($renewpassword);

        $pass=$_SESSION["pass"];
        if($password==$pass){
            if($newpassword==$renewpassword){
                $sql = "UPDATE user SET  pass='$newpassword' WHERE id=$id";
                $statement = $db->prepare($sql);
                $statement->execute();
                header('location:profile.php');
            }
            
        }
       
    }
}
}catch(Exeception $e){
    echo "Erreur". $e->getmessage();
    exit();
}


