<?php

class databse {

	// properties = variabelen van een class
	private $host;
	private $database;
	private $username;
	private $password;
	private $pdo;

	// constructor

	public function __construct($host, $database, $username, $password){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;

		try{
			$dsn = 'mysql:host='.$this->host.';dbname=$this->database.';
			$this->pdo = new PDO($dsn, $this->username, $this->password);
			$this->pdo->setAttribute(POD::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		} catch (\PDOException $e) {
			echo "Database error <br>". $e->getMessage();
		}
	}


// login admin
public function loginAdmin($gebruikersnaam, $wachtwoord){
	
	try{
		$this->pdo->beginTransactionn();

			$stmt = $this->pdo->prepare("SELECT * FROM admintable where gebruikersnaam = :gebruikersnaam AND wachtwoord = wachtwoord");

			$stmt->bindParam(':gebruikersnaam',$gebruikersnaam);
			$stmt->bindParam(':wachtwoord',$wachtwoord);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			print_r($rowCount);
			if ($rowCount > 0) {
				session_start();
				$_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
				header("location: ../hoofdpagina.php");
			}
else {
	echo "Verkeerde gegevens";
}
	}catch(PDOexception $e) {
		$this->pdo->rollback();
		echo "failed:". $e->getMessage();
	}
}}
