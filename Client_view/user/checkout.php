
<?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	require ("../config.php"); 
	$id=$_SESSION["id"];
	$stmt2 = $db->prepare("SELECT COUNT(id) FROM cart where user=$id ");
	$stmt2->execute();
	
	$stmt3 = $db->prepare("SELECT COUNT(id) FROM wishes where user=$id ");
	$stmt3->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


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

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =================================================================== -->
</head>

<body>

<!-- Header -->
<header>
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

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="../images/icons/logo.png"  alt="IMG-LOGO">
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

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?=$stmt3->fetchColumn()?>">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>

						<li class="nav-item dropdown pe-3 ">

							<a class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  " href="#" data-bs-toggle="dropdown">
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

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?=$stmt3->fetchColumn()?>">
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
					<a href="index.php">Home</a>
					
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
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
							$id=$_SESSION["id"];						
							$sql = $db->prepare("SELECT * FROM cart where user=$id");
							$sql->execute();
							foreach ($sql as $result) {
								$total=$total+$result["total"];
						?>
						<div class="header-cart-item-img">
							<img src="<?=$result["image"]?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?=$result["title"]?>
							</a>

							<span class="header-cart-item-info">
								<?=$result["quantite"]?> x <?=$result["prix"]?>
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


	<main id="main" class="main">

<section class="section profile">
  <div class="row">

	<div class="col-xl-10">

	  <div class="card">
		<div class="card-body pt-3">
		  <!-- Bordered Tabs -->
		  <ul class="nav nav-tabs nav-tabs-bordered">

			<li class="nav-item">
			  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Contact Informations</button>
			</li>
			<li class="nav-item">
			  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-pay">Payement Settings</button>
			</li>

		  </ul>
		  <div class="tab-content pt-2">
			

			<div class="tab-pane fade show active profile-overview" id="profile-edit">
				<?php		
					$l=	$_SESSION["login"];			
					$sql = $db->prepare("SELECT * FROM user where login='$l'");
					$sql->execute();
					foreach ($sql as $result) { 
				?>

			  <!-- Profile Edit Form -->
				<form action="update-profile.php" method="post" enctype="multipart/form-data">

					<div class="row mb-3">
						<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
						<div class="col-md-8 col-lg-9">
							<input name="lastname" type="text" class="form-control" id="fullName" value="<?=$result["lastname"]?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
						<div class="col-md-8 col-lg-9">
							<input name="firstname" type="text" class="form-control" id="fullName" value="<?=$result["firstname"]?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
						<div class="col-md-8 col-lg-9">
							<input name="country" type="text" class="form-control" id="Country" value="<?=$result["country"]?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="Adress" class="col-md-4 col-lg-3 col-form-label">Address</label>
						<div class="col-md-8 col-lg-9">
							<input name="adress" type="text" class="form-control" id="Adress" value="<?=$result["adress"]?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
						<div class="col-md-8 col-lg-9">
							<input name="phone" type="text" class="form-control" id="Phone" value="<?=$result["phone"]?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
						<div class="col-md-8 col-lg-9">
							<input name="email" type="email" class="form-control" id="Email" value="<?=$result["email"]?>">
							<input type="hidden" name="id" value="<?=$result["id"]?>">
						</div>
					</div>

					<div class="text-center">
						<button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
						
					</div>
				</form><!-- End Profile Edit Form -->
				
				<?php }?>
			</div>

			<div class="tab-pane fade profile-edit pt-3" id="profile-pay">

				<!-- Profile pay Form -->
				<section>
					<div>
						<div>
							<div>
								<div>
									<div class="text-center mb-4">
										<h3>Settings</h3>
										<h6>Payment</h6>
									</div>
									<form action="addcard.php" method="post" enctype="multipart/form-data">
										<p class="fw-bold mb-4 pb-2">Saved cards:</p>
										<?php		
											$iduser=$_SESSION["id"];			
											$sql = $db->prepare("SELECT * FROM saved_card where user=$iduser");
											$sql->execute();
											foreach ($sql as $res) { 
										?>
										
										<div class="d-flex flex-row align-items-center mb-4 pb-1">
											<img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
											<img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" />
											<div class="flex-fill mx-3">
												<div class="form-outline">
													<label class="form-label" for="formControlLgXs">Card Number</label>
													<input type="text" id="formControlLgXs" class="form-control form-control-lg" value="<?=$res["card_num"]?>" />
												</div>
											</div>
											<a href="delete_savedcard.php?id=<?=$res['id']?>"  class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
										</div>
											<?php } ?>
										<p class="fw-bold mb-4">Add new card:</p>

										<div class="form-outline mb-4">
											<label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
											<input type="text" name="name" class="form-control form-control-lg" value="Anna Doe" />
										</div>

										<div class="row mb-4">
											<div class="col-7">
												<div class="form-outline">
													<label class="form-label" for="formControlLgXM">Card Number</label>
													<input type="text" name="number" class="form-control form-control-lg" value="1234 5678 1234 5678" />
												</div>
											</div>
											<div class="col-3">
												<div class="form-outline">
													<label class="form-label" for="formControlLgExpk">Expire</label>
													<input type="password" name="expire" class="form-control form-control-lg" placeholder="MM/YYYY" />
												</div>
											</div>
											<div class="col-2">
												<div class="form-outline">
													<label class="form-label" for="formControlLgcvv">Cvv</label>
													<input type="password" name="cvv" class="form-control form-control-lg" placeholder="Cvv" />
												</div>
											</div>
										</div>
										<div class="text-center">
											<button class="btn btn-primary">Add card</button>
											<a href="../dompdf/buy.php" class="btn btn-primary">DONE</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- End Profile pay Form -->
			</div>
		  </div><!-- End Bordered Tabs -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->



<?php require "footer.php"; ?>