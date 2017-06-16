<?php
class Database {
	var $servername;
	var $username;
	var $password;
	var $dbname;
	private $fname;
	private $lname;
	private $uname;
	private $pass;
	private $email;
	private $bday;
	private $gender;
	
	function __construct() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "exercise1";
	
	}
	// setters and getters
	function setFirstName() {
		$this->fname = htmlspecialchars ( $_POST ['firstname'] );
	}
	function getFirstName() {
		return $this->fname;
	}
	function setLastName() {
		$this->lname = htmlspecialchars ( $_POST ['lastname'] );
	}
	function getLastName() {
		return $this->lname;
	}
	function setUserName() {
		$this->uname = htmlspecialchars ( $_POST ['username'] );
	}
	function getUserName() {
		return $this->uname;
	}
	function setPass() {
		$this->pass = htmlspecialchars ( $_POST ['password'] );
	}
	function getPass() {
		return $this->pass;
	}
	function setEmail() {
		$this->email = htmlspecialchars ( $_POST ['email'] );
	}
	function getEmail() {
		return $this->email;
	}
	function setBday() {
		$this->bday = htmlspecialchars ( $_POST ['birthday'] );
	}
	function getBday() {
		return $this->bday;
	}
	function setGender() {
		$this->gender = htmlspecialchars ( $_POST ['gender'] );
	}
	function getGender() {
		return $this->gender;
	}
	
	function addUser() {
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "INSERT INTO `records`(`Username`,`Password`,`Email`, `First Name`, `Last Name`,`Birthdate`,`Gender`)
			VALUES('$this->uname','$this->pass', '$this->email', '$this->fname', '$this->lname', '$this->bday', '$this->gender')";
			// use exec() because no results are returned
			$conn->exec($sql);
			echo "<script> alert('Successfully Created!');
			window.location.href='homepage.php';
		</script>";
			exit ();
		} catch ( PDOException $e ) {
			/*echo "<script> alert('Invalid Input!');
			window.location.href='homepage.php';
			</script>";*/
			echo $e->getMessage();
		}
		
		$conn = null;
	}
	function selectUser(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "SELECT * FROM records";
			// use exec() because no results are returned
			
			foreach ($conn->query($sql) as $row){
				if($this->uname == $row['Username'] && $this->pass == $row['Password']){
					header('Location: viewUsers.php');
					exit ();
				}
				else{
					echo "<script> alert('Invalid Credentials!');
					window.location.href='homepage.php';
					</script>";
				}
			}
			
			
		} catch ( PDOException $e ) {
			echo "<script> alert('ERROR');
			window.location.href='homepage.php';
			</script>";
		}
		
		$conn = null;
	}
	function deleteUser(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$id = $_POST['todelete'];
			$sqlInsert = 'DELETE from test where id=:id';
			$preparedStatement = $conn->prepare($sqlInsert);
			$preparedStatement->execute(array(':id' => $id));
			
			echo "<script> alert('Deleted!');
					window.location.href='viewUsers.php';
					</script>";
				
		} catch ( PDOException $e ) {
			/*echo "<script> alert('ERROR');
			window.location.href='homepage.php';
			</script>";*/
			echo $e->getMessage();
		}
	
		$conn = null;
	}
	function __destruct() {
	}
}
$objDatabase = new Database ();
$objDatabase->setFirstName();
$objDatabase->setLastName();
$objDatabase->setUserName();
$objDatabase->setPass();
$objDatabase->setEmail();
$objDatabase->setBday();
$objDatabase->setGender();
if (isset($_POST['create'])){
	$objDatabase->addUser();
} else if (isset($_POST['login'])){
	$objDatabase->selectUser();
} else if (isset($_POST['delete'])){
	$objDatabase->deleteUser();
}




?>
