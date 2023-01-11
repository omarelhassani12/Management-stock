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
            if (isset ($_POST['email']) && isset($_POST['review'])&& isset($_POST['rating'])&& isset($_POST['name'])&& isset($_POST['id'])){
                $email = $_POST['email'];
                $rating = $_POST['rating'];
                $name = $_POST['name'];
                $id = $_POST['id'];
                $review = $_POST['review'];
                $avatar = $_POST['avatar'];
                $id_product = $_POST['id_product'];
                $sql = 'INSERT INTO reviews(id_user,id_product,name,rating,review,email,avatar) VALUES(:id, :id_product, :name, :rating, :review, :email,:avatar)';
                $statement = $db->prepare($sql);
                if ($statement->execute([':id' => $id,':id_product' => $id_product, ':name' => $name, ':rating' => $rating, ':review' => $review,':email' => $email, ':avatar' => $avatar])) {
                    $message = 'Thank you for your review';
                }
            }
        }
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }

    $stmt2 = $db->prepare("SELECT COUNT(id) FROM cart");
	$stmt2->execute();

	$stmt3 = $db->prepare("SELECT COUNT(id) FROM wishes");
	$stmt3->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>review Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
<!--===============================================================================================-->
</head>
<body>
    <form action="product-detail.php" method="post">
		<input type="hidden" name="id" value="<?=$id_product?>">
		<button  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" type="submit" name="submit">
		    << Go Back
		</button>
	</form>
    <div class="alert alert-success" role="alert">
        Thank you for your review
    </div>
</body>