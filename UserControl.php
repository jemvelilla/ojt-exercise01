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
		if (isset($_POST['create']) || isset($_POST['addUser']) 
				|| isset($_POST['updateUser']) || isset($_POST['addAnother'])){
		$this->fname = htmlspecialchars ( $_POST ['firstname'] );
		}
	}
	function getFirstName() {
		return $this->fname;
	}
	function setLastName() {
		if (isset($_POST['create'])|| isset($_POST['addUser']) 
				|| isset($_POST['addAnother']) || isset($_POST['updateUser'])){
		$this->lname = htmlspecialchars ( $_POST ['lastname'] );
		}
	}
	function getLastName() {
		return $this->lname;
	}
	function setUserName() {
		if (isset($_POST['create']) || isset($_POST['login']) 
				|| isset($_POST['addAnother']) || isset($_POST['addUser']) ||  isset($_POST['updateUser'])){
		$this->uname = htmlspecialchars ( $_POST ['username'] );
		}
	}
	function getUserName() {
		return $this->uname;
	}
	function setPass() {
		if (isset($_POST['create']) || isset($_POST['login']) 
				|| isset($_POST['addAnother']) || isset($_POST['addUser']) || isset($_POST['updateUser'])){
		$this->pass = htmlspecialchars ( $_POST ['password'] );
		}
	}
	function getPass() {
		return $this->pass;
	}
	function setEmail() {
		if (isset($_POST['create'])|| isset($_POST['addUser']) 
				|| isset($_POST['addAnother']) || isset($_POST['updateUser'])){
		$this->email = htmlspecialchars ( $_POST ['email'] );
		}
	}
	function getEmail() {
		return $this->email;
	}
	function setBday() {
		if (isset($_POST['create']) || isset($_POST['addUser']) 
				|| isset($_POST['addAnother']) || isset($_POST['updateUser'])){
		$this->bday = htmlspecialchars ( $_POST ['birthday'] );
		}
	}
	function getBday() {
		return $this->bday;
	}
	function setGender() {
		if (isset($_POST['create']) || isset($_POST['addUser']) 
				|| isset($_POST['addAnother']) || isset($_POST['updateUser'])){
			$this->gender = htmlspecialchars ( $_POST ['gender'] );
		}
	}
	function getGender() {
		return $this->gender;
	}
	
	function addUser() {
		try {
			$encrypt = sha1($this->pass);
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "INSERT INTO `records`(`Username`,`Password`,`Email`, `First_Name`, `Last_Name`,`Birthdate`,`Gender`)
			VALUES('$this->uname','$encrypt', '$this->email', '$this->fname', '$this->lname', '$this->bday', '$this->gender')";
			// use exec() because no results are returned
			$conn->exec($sql);
			
			if (isset($_POST['create'])){
				echo "<script> alert('Successfully Created!');
					window.location.href='index.php';
					</script>";
				exit ();
			} else if(isset($_POST['addUser'])){
				echo "<script> alert('Successfully Created!');
					window.location.href='viewUsers.php';
					</script>";
				exit ();
			} else if (isset($_POST['addAnother'])){
				echo "<script> alert('Successfully Created!');
					window.location.href='addUsers.php';
					</script>";
				exit ();
			}
			
		} catch ( PDOException $e ) {
			if (isset($_POST['create'])){
				/*echo "<script> alert('User already exists!');
					window.location.href='index.php';
					</script>";*/
				$e->getMessage();
			} else if(isset($_POST['addUser']) || isset($_POST['addAnother'])){
				echo "<script> alert('User already exists!');
					window.location.href='addUsers.php';
					</script>";
			}
		}
		$conn = null;
	}
	function selectUser(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "SELECT * FROM records";
			
			foreach ($conn->query($sql) as $row){
					
				if($this->uname == $row['Username'] && sha1($this->pass) == $row['Password']){
					session_start();
					$_SESSION['login'] = "active";
					header('Location: viewUsers.php');
					exit ();
				}
				else{
					echo "<script> alert('Invalid Credentials!');
					window.location.href='index.php';
					</script>";
				}
			}
			
		} catch ( PDOException $e ) {
			echo "<script> alert('ERROR');
			window.location.href='index.php';
			</script>";
		}
		
		$conn = null;
	}
	function deleteUser(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$todelete = $_POST['todelete']; 

			if (is_array($todelete))
			{
				for ($i=0;$i< sizeof($todelete);$i++)
				{
					$stmt = "DELETE FROM records WHERE id =". $todelete[$i];
					$conn->exec($stmt);
				}
			} else{
				echo "not an array";
			}
			if ($todelete != null){
				echo "<script> alert('Deleted!');
					window.location.href='viewUsers.php';
					</script>";
			} else{
				echo "<script> alert('Select an item to delete!');
					window.location.href='viewUsers.php';
					</script>";
			}
		} catch ( PDOException $e ) {
			echo "<script> alert('ERROR');
			window.location.href='index.php';
			</script>";
		}
	
		$conn = null;
	}
	
	function updateUser(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
			$toupdate = $_POST['todelete'];
			
			if (sizeof($toupdate) == 1) {
					for ($i=0;$i< sizeof($toupdate);$i++) {
						$sql = "SELECT * FROM records where id=" . $toupdate[$i];
						$conn->exec($sql);
					}
					
					session_start();
					$_SESSION['query'] = $sql;
					$_SESSION['selected'] = $toupdate;
						
					header('Location: updateUsers.php');
			} else if (sizeof($toupdate) == null){
				echo "<script> alert('Select an item to update!');
					window.location.href='viewUsers.php';
					</script>";
			} else {
					echo "<script> alert('Please update one at a time!');
					window.location.href='viewUsers.php';
					</script>";
			}
			
		} catch ( PDOException $e ) {
		/*echo "<script> alert('ERROR');
			window.location.href='index.php';
			</script>";*/
			$e->getMessage();
		}
	
		$conn = null;
	}
	function printUpdated(){
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			session_start();
			
			$toupdate = $_SESSION['selected'];
			
			$encryptedOldPass = sha1($_POST['oldpassword']);
			$encrypted = sha1($this->pass);
			
			$sql= $_SESSION['query'];
			foreach ($conn->query($sql) as $row){
				if($encryptedOldPass == $row['Password']){
					if (is_array($toupdate)) {
						for ($i=0;$i< sizeof($toupdate);$i++) {
							$sql = "UPDATE records SET Username = :username, Password= :password, Email= :email,
							`First_Name` = :firstname, `Last_Name` = :lastname, Birthdate = :bday, Gender = :gender
							WHERE id = :id";
					  		$stmt = $conn->prepare($sql);
							$stmt->bindValue(':id', $toupdate[$i]);
							$stmt->bindValue(':username', $this->uname);
							$stmt->bindValue(':password', $encrypted);
							$stmt->bindValue(':email', $this->email);
							$stmt->bindValue(':firstname', $this->fname);
							$stmt->bindValue(':lastname', $this->lname);
							$stmt->bindValue(':bday', $this->bday);
							$stmt->bindValue(':gender', $this->gender);
							$update = $stmt->execute();
						}
					} else{
						echo "not an array";
					}
					echo "<script> alert('Updated!');
						window.location.href='viewUsers.php';
					</script>";
				} else{
					echo "<script> alert('Current password incorrect!');
						window.location.href='updateUsers.php';
					</script>";
				}
			}
			
		} catch ( PDOException $e ) {
				/*echo "<script> alert('ERROR');
						window.location.href='index.php';
					</script>";*/
						$e->getMessage();
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
if (isset($_POST['create']) || isset($_POST['addUser']) || isset($_POST['addAnother'])){
	$objDatabase->addUser();
} else if (isset($_POST['login'])){
	$objDatabase->selectUser();
} else if (isset($_POST['delete'])){
	$objDatabase->deleteUser();
} else if (isset($_POST['update'])){
	$objDatabase->updateUser();
} else if (isset($_POST['updateUser'])){
	$objDatabase->printUpdated();
}

if (isset($_POST['cancel'])){
	header('Location: viewUsers.php');
} else if (isset($_POST['add'])){
	header('Location: addUsers.php');
} else if (isset($_POST['logout'])){
	unset($_SESSION['login']);
	header('Location: index.php');
} 
?>
