<?php
session_start();
//after this session start here
unset($_SESSION["nom"]);
unset($_SESSION["email"]);
unset($_SESSION["password"]);
session_unset();
///after this the id and variable are deleted from the session variable
session_destroy();
//after this session destroy
echo 'You have cleaned session';
header('location: login.php');
