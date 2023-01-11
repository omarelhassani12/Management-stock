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
        $id = $_POST['id'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        $image = $_POST['image'];
        $total=$prix*$quantite;
        $user=$_SESSION["id"];
        $sql = "SELECT * FROM cart";
        $statement = $db->prepare($sql);
        $statement->execute();
        foreach($statement as $res){

            $id_pro=$res["id_pro"];
            if($id_pro==$id){
                $sql = "UPDATE cart SET quantite='$quantite',total='$total'  WHERE id_pro=$id";
                $statement = $db->prepare($sql);
                $statement->execute();
                header("location:shoping-cart.php");
            }
        }
        $sql = 'INSERT INTO cart(id_pro,user,title,prix, quantite,image,total) VALUES(:id_pro, :user, :title, :prix, :quantite, :image,  :total)';
        $statement = $db->prepare($sql);
        if ($statement->execute([':id_pro' => $id, ':user' => $user, ':title' => $title, ':prix'=>$prix, ':quantite' => $quantite, ':image' => $image, ':total'=>$total])) {
            $message = 'data inserted successfully';
            header("location:shoping-cart.php");
        }
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }


?>
