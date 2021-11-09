<?php

class databse {

	// properties = variabelen van een class
	private $host;
	private $username;
	private $password;
	private $database;
	private $conn;

	// constructor

	public function __construct(){
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->database = 'restaurantex';

		try{
			$dsn = "mysql:host=.$this->host;dbname=$this->database";
			$this->conn = new PDO($dsn, $this->username, $this->password);

		} catch (\PDOException $e) {
			echo "Database connection failed <br>". $e->getMessage();
		}
	}


 // als ik tijd heb verander ik dit naar registreren
 // admin toevoegen
public function insert_admin(){
	// insert into is de gegevens die erin komen
	$sql = "INSERT INTO admin VALUES(:id, :gebruikersnaam, :wachtwoord);";
	// sql wordt klaar gemaakt om naar db te sturen
	$stmt = $this->conn->perpare($sql);
	// hier wordt het uitgevoerd
	$stmt->execute([
		'id'=> NULL,
		'gebruikersnaam' => 'admin',
		'wachtwoord' => 'admin'
	]);
}

// login admin
public function loginAdmin($gebruikersnaam, $wachtwoord){
	$sql = "SELECT id, gebruikersnaam, wachtwoord FROM admin WHERE gebruikersnaam = :gebruikersnaam";

	$stmt = $this->conn->perpare($sql);

	$stmt->execute([
		'gebruikersnaam' => $gebruikersnaam,
	]);

	$result = $stmt->fetch(PDO::FETCH_ASOC);


	if(is_array($result)){
		if(count($result) > 0){

			if($gebruikersnaam == $result['gebruikersnaam'] && password_verify($wachtwoord, $result['wachtwoord'])){
				session_start();
				$_SESSION['id'] = result ['id'];
				$_SESSION['gebruikersnaam'] = result ['gebruikersnaam'];

				header("location: ../index.php");
			}
		}
	}else{
		echo "error";
	}
}
}