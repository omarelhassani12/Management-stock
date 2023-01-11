<?php
try {
  $username = "root";
  $password = "root";
  $db = new PDO('mysql:host=localhost;dbname=izzyshop;charset=utf8', $username, $password);
} catch (PDOException $e) {
  print "Connection failed : " . $e->getMessage() . "<br/>";
  die;
}
