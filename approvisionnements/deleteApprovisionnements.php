<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php?yourSessionExpired');
} else {

    require '../include/connexion.php';

    $id = $_GET['id'];
    $req = $db->prepare('DELETE FROM approvisionnements where id = ?');
    $req->execute([$id]);

    header('location: ./approvisionnements.php?message=Deleted');
}