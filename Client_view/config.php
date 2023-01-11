<?php
try{
    $username ="root";
    $password = "root";
    $db = new PDO('mysql:host=localhost;dbname=izzyshop;charset=utf8',$username,$password);

    // echo"Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

