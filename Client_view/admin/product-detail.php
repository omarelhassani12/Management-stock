<?php

	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	require ("../config.php"); 
	
    try{
		$idd=$_SESSION["id"];
		$stmt2 = $db->prepare("SELECT COUNT(id) FROM cart where user=$idd ");
		$stmt2->execute();
		
		$stmt3 = $db->prepare("SELECT COUNT(id) FROM wishes where user=$idd ");
		$stmt3->execute();

		if(isset($_POST['submit'])){
            if (isset ($_POST['id'])){
				$id = $_POST['id'];
				$sql= "SELECT * FROM produits WHERE id =$id" ;
			}
		}
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }

	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="help.php" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="profile.php" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="../images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="shoping-cart.php">Features</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
							
							<li>
								<a href="../gestion/index.php">Admin</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?=$stmt2->fetchColumn()?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="listwishes.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?=$stmt3->fetchColumn()?>">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
						<li class="nav-item dropdown pe-3">

							<a class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " href="#" data-bs-toggle="dropdown">
								<i class="zmdi zmdi-account"></i>
							</a><!-- End Profile Iamge Icon -->

							<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
								<li>
								<a class="dropdown-item d-flex align-items-center" href="profile.php">
									<i class="bi bi-person"></i>
									<span>My Profile</span>
								</a>
								</li>
								<li>
								<hr class="dropdown-divider">
								</li>

								<li>
								<a class="dropdown-item d-flex align-items-center" href="help.php">
									<i class="bi bi-question-circle"></i>
									<span>Need Help?</span>
								</a>
								</li>
								<li>
								<hr class="dropdown-divider">
								</li>

								<li>
								<a class="dropdown-item d-flex align-items-center" href="../deconnexion.php">
									<i class="bi bi-box-arrow-right"></i>
									<span>Sign Out</span>
								</a>
								</li>

							</ul><!-- End Profile Dropdown Items -->
						</li><!-- End Profile Nav -->

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="../images/icons/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?=$stmt2->fetchColumn()?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="listwishes.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?=$stmt3->fetchColumn()?>">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="help.php" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="profile.php" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
				
				<li>
					<a href="../gestion/index.php">Admin</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<?php	
							$total=0;						
							$idd=$_SESSION["id"];						
							$sql = $db->prepare("SELECT * FROM cart where user=$idd");
							$sql->execute();
							foreach ($sql as $result) {
								$total=$total+$result["total"];
						?>
						<div class="header-cart-item-img">
							<img src="<?=$result["image"]?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?=$result["libelle"]?>
							</a>

							<span class="header-cart-item-info">
								<?=$result["quantite"]?> x <?=$result["prix"]?>$
							</span>
						</div>
						<?php }?>
					</li>

				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $<?=$total?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<?php							
					$sql = $db->prepare("SELECT * FROM produits WHERE id =$id");
					$sql->execute();
					foreach ($sql as $result) { 
				?>

				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?= $result['photo']?>">
									<div class="wrap-pic-w pos-relative">
										<?php echo '<img src='.$result["photo"].' alt="IMG-PRODUCT">';?>

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= $result['photo']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?= $result['photo']?>">
									<div class="wrap-pic-w pos-relative">
										<img src=<?=$result["photo"]?> alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= $result['photo']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?= $result['photo']?>">
									<div class="wrap-pic-w pos-relative">
										<img src=<?= $result['photo']?> alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= $result['photo']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $result['libelle']?>
						</h4>

						<span class="mtext-106 cl2">
							<?= $result['prix_vente']?>$
						</span>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<form action="card.php" method="post">
									<span>Quantite</span>
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantite" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<div>
											<input type="hidden" name="title" value="<?=$result["libelle"]?>">
											<input type="hidden" name="id" value="<?=$result["id"]?>">
											<input type="hidden" name="prix" value="<?=$result["prix_vente"]?>">
											<input type="hidden" name="image" value="<?=$result["photo"]?>">
											<input type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" value="add to cart">
										</div>
									</div>
								</form>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<form action="addwishes.php" method="post">
									<input type="hidden" name="title" value="<?=$result["libelle"]?>">
			
									<input type="hidden" name="prix" value="<?=$result["prix_vente"]?>">
									<input type="hidden" name="image" value="<?=$result["photo"]?>">
									<button type="submit" class="btn-addwish-b2 dis-block pos-relative ">
										<img class="icon-heart1 dis-block trans-04" src="../images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../images/icons/icon-heart-02.png" alt="ICON">
									</button>
								</form>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sed reprehenderit, nihil quibusdam labore perspiciatis, deleniti voluptatibus quos doloremque voluptate laborum quidem impedit, corporis accusamus. Praesentium optio numquam repellat cupiditate.
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											
											<?php							
												$user_id=$_SESSION['id'];
												$sql = $db->prepare("SELECT * FROM reviews where id_product='$id'");
												$sql->execute();
												foreach ($sql as $result) { 
											?>
											
											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?=$result['name']?>
													</span>
													<span class="fs-18 cl11">
														<?php 
															$stars=1;
															while($stars<=5){
																if($result['rating']<$stars){
														?>
														<i class="zmdi zmdi-star-o"></i>
														<?php
																}else{
														?>
														<i class="zmdi zmdi-star"></i>
														<?php
																}
																$stars++;
															} 
														?>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?=$result['review']?>
												</p>
											</div>
											<?php } ?>
										</div>
										
										<!-- Add review -->
										<form class="w-full" action="add-review.php" method="post">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
													<input  type="hidden" name="id" value="<?=$user_id?>">
													<input  type="hidden" name="avatar" value="<?=$avatar?>">
													<input  type="hidden" name="id_product" value="<?=$id?>">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" type="submit" name="submit">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->

			<div class="wrap-slick2">		
				<div class="slick2">
					<?php							
						$sql = $db->prepare("SELECT * FROM produits ");
						$sql->execute();
						foreach ($sql as $result) { 
					?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<?php echo '<img src='.$result["photo"].' alt="IMG-PRODUCT" width="200px" height="200px">';?>

								<form action="product-detail.php" method="post">
									<input type="hidden" name="id" value="<?=$result["id"]?>">
									<button  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" type="submit" name="submit">
										Details
									</button>
								</form>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<form action="product-detail.php" method="post">
										<input type="hidden" name="id" value="<?=$result["id"]?>">
										<button  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" type="submit" name="submit">
											<?php echo $result["libelle"];?>
										</button>
									</form>

									<span class="stext-105 cl3">
										<?php echo $result["prix_vente"];?>$
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<form action="addwishes.php" method="post">
										<input type="hidden" name="title" value="<?=$result["libelle"]?>">
				
										<input type="hidden" name="prix" value="<?=$result["prix_vente"]?>">
										<input type="hidden" name="image" value="<?=$result["photo"]?>">
										<button type="submit" class="btn-addwish-b2 dis-block pos-relative ">
											<img class="icon-heart1 dis-block trans-04" src="../images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../images/icons/icon-heart-02.png" alt="ICON">
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>
		

	<?php require "footer.php"; ?>