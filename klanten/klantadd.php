<?php
include '../database/database.php';
// database oproepen
$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];
$email = $_POST['email'];
$pdo = new database("localhost", "restaurantex", "root", "");
// klant toevoegen
$pdo->klantadd($naam, $telefoon, $email);
header('location:klantenoverzicht.php');
?>