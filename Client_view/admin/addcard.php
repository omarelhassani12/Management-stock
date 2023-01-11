<?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	
	require ("../config.php"); 
    $message = '';
    try{

        $name = $_POST['name'];
        $number = $_POST['number'];
        $expire = $_POST['expire'];
        $cvv = $_POST['cvv'];
        $id=$_SESSION["id"];
        $sql = 'INSERT INTO saved_card(user,name, card_num,expire,cvv) VALUES(:user, :name, :number,:expire, :cvv)';
        $statement = $db->prepare($sql);
        if ($statement->execute([':user' => $id, ':name' => $name, ':number' => $number,':expire'=>$expire, ':cvv' => $cvv])) {
            $message = 'Product inserted successfully in your list wishe';
            header("location:checkout.php");
        }
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }


?>