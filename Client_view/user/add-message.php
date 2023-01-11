<?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	
	require ("../config.php"); 
    $message = '';
    try{
        if(isset($_POST['submit'])){
            if (isset ($_POST['email']) && isset($_POST['message'])){
                $email = $_POST['email'];
                $message = $_POST['message'];
                $sql = 'INSERT INTO client_messages(email, message) VALUES(:email, :message)';
                $statement = $db->prepare($sql);
                if ($statement->execute([':email' => $email, ':message' => $message])) {
                    $message = 'Thank you for your feedback';
                    header("location:contact.php");
                }
            }
        }
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }


?>