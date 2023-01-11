<?php require "./include/header_login.php"; ?>
<?php require "./include/connexion.php";
?>
<?php
session_start();
require_once "./include/connexion.php";

if (isset($_POST['Register'])) {
    if ($_POST['nom'] != "" || $_POST['email'] != "" || $_POST['password'] != "") {
        try {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            // $password = $_POST['password'];
            // md5 encrypted
            $password = md5($_POST['password']);
            $sql = "INSERT INTO users(nom,email,password) VALUES ('$nom', '$email', '$password')";
            $db->exec($sql);
            header('location: login.php?createdAccount');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
    }
}
?>

<head>
    <style>
    body {
        background-color: #F0F0F0;
    }

    .col-lg-6 {
        position: relative;
        left: 28%;
        top: 20%;
    }

    .card-title {
        text-align: center;
        font-weight: 900;
        font-size: 40px;
        color: navy;
    }

    .text-center {
        position: relative;
        top: 15px;
        left: 40%;
        padding-bottom: 20px;
        padding-top: 20px;
    }

    .title_site {
        text-align: center;
        font-weight: 900;
        font-size: 50px;
        color: blue;
        padding-bottom: 20px;
    }

    .row .form-label {
        font-size: 20px;
        padding-top: 10px;
    }
    </style>
</head>
<div class="col-lg-6">
    <h2 class="title_site">IZZYSHOP</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sign Up</h5>
            <form class="row g-3" method="POST">

                <div class="col-12">
                    <label for="name" class="form-label">User Name</label>
                    <input name="nom" type="text" class="form-control" id="name" placeholder="admin">
                </div>

                <div class="col-12">
                    <label for="Email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="Email" placeholder="admin@admin.com"
                        required>
                </div>
                <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="Password" placeholder="password"
                        required>
                </div>
                <!-- <div class="col-12">
                    <label for="Password" class="form-label">Repeat your password</label>
                    <input name="repeatpassword" type="password" class="form-control" id="Password"
                        placeholder="password" required>
                </div> -->
                <div class="text-center">
                    <button name="Register" type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="col-12">Aleardy Have An Acount <a href="./login.php">Sign in </a>Now</div>
            </form>

        </div>
    </div>

    <?php require "include/footer.php"; ?>