<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location: login.php?yourSessionExpired');
} else {
	require '../include/connexion.php';

	$id = $_GET['id'];
	$req = $db->prepare('DELETE FROM fournisseur where id = ?');
	$req->execute([$id]);

	header('location: ./index.php?message=Deleted');
}
