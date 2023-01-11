<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {

    require '../include/connexion.php';

    $id = $_GET['id'];
    $req = $db->prepare("DELETE FROM caisse where id = '$id'");

    $req->execute();

    header('location: ./caisse.php?message=Deleted');
}