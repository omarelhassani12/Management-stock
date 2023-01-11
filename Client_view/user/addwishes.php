<?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	
	require ("../config.php"); 
    $message = '';
    try{

        $title = $_POST['title'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $image = $_POST['image'];
        $id=$_SESSION["id"];
        $sql = 'INSERT INTO wishes(user,title, description,prix,image1) VALUES(:user, :title, :description,:prix, :image)';
        $statement = $db->prepare($sql);
        if ($statement->execute([':user' => $id, ':title' => $title, ':description' => $description,':prix'=>$prix, ':image' => $image])) {
            $message = 'Product inserted successfully in your list wishe';
            header("location:listwishes.php");
        }
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }


?>