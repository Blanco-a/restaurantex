<?php
session_start();
// sessie gestart en de database aangeroepen
include '../database/database.php';

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
		$db->login($gebruikersnaam, $wachtwoord);

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
  <a href="../index.php">Home</a>
</div>
<h1 class="login">Log hier in</h1>

<form class="form" method="post" action="">
	<input type="text" name="geruikersnaam" placeholder="Gebruikersnaam" required><br>
	<input type="text" name="wachtwoord" placeholder="Wachtwoord" required><br>
	<br>
	<input type="submit" name="submit" value="Log in">
</form>
</body>
</html>