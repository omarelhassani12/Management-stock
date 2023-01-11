<?php require "./include/header_login.php"; ?>

<?php
session_start();

require_once './include/connexion.php';

if (isset($_POST['login'])) {
    if ($_POST['email'] != "" || $_POST['password'] != "") {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE email=? AND password=? ";
        $query = $db->prepare($sql);
        $query->execute([$email, $password]);
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if ($row > 0) {
            $_SESSION['username'] = $fetch['nom'];
            $_SESSION['id'] = $fetch['id'];
            header("location: index.php?success");
        } else {
            echo "
				<script>alert('Invalid email or password')</script>
				<script>window.location = 'login.php'</script>
				";
        }
    } else {
        echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'login.php'</script>
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
        bottom: 20px;
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
            <h5 class="card-title">Sign In</h5>
            <?php
            if (isset($message)) {
                echo '<label class="text-danger">' . $message . '</label>';
            }
            ?>
            <form class="row g-3" method="POST">

                <div class="col-12">
                    <label for="Email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="Email" placeholder="admin@admin.com"
                        value="admin@admin.com" required>
                </div>

                <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="Password" placeholder="admin"
                        value="admin" required>
                </div>

                <div class="text-center">
                    <button name="login" type="submit" class="btn btn-primary">Log In</button>
                </div>
                <!-- <div class="col-12">Forget Your Password !<a href="./Forget_password.php"> Forget password </a></div>-->
                <div class="col-12">Don't Have An Acount <a href="./register.php">Sign Up </a>Now</div>
            </form>

        </div>
    </div>

    <?php require "include/footer.php"; ?>