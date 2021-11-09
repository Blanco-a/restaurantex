<?php
session_start();
// sessie gestart en de database aangeroepen
include '../database/database.php'

//wordt gekeken of iets niet klopt en geeft dan een error aan
if(isset($_POST['submit'])){
	$fields = ['gebruikersnaam', 'wachtwoord'];

	$error = false;
	// als een field verkeerd is dan wordt de error true
	foreach ($fields as $field) {
		if(!isset($_POST[$field]) || empty($_POST[$field])){
			$error = true;
		}
	}
	// geen error kan je inloggen
	if(!$error) {
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$wachtwoord = $_POST['wachtwoord'];

		// connection met database
		$db= new database();
		// functie login en parameters erin worden aangeroepen
		$db->login($gebruikersnaam, $wachtwoord)

	}

 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Login</title>
</head>
<body>
<div class="topnav">
  <a href="#news">Reserveren</a>
  <a href="#contact">Bestellingen</a>
  <a href="#about">Medewerker</a>
  <a class="active" href="../loguit/loguit.php">Log uit</a>
</div>
</body>
</html>