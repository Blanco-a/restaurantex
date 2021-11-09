<?php
include '../database/database.php';
// als er staat dat dit gekopieerd is, het komt van klantadd.php, :)

$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];
$email = $_POST['email'];
$pdo = new database("localhost", "restaurantex", "root", "");

$pdo->oberaddreservering($naam, $telefoon, $email);
header('location:reserveringoverzicht.php')
?>