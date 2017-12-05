<?php
include('password.php');
session_start();
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();
    	$this->_db = $db;
    }

	private function get_user_hash($username){	

		try {
			// echo "username : $username";
			$stmt = $this->_db->prepare('SELECT password FROM members WHERE username = :username ');
			$stmt->execute(array('username' => $username));
			// print_r($stmt);
			$row = $stmt->fetch();
			// print_r($row);
			// echo "string";
			return $row[0];

			// $hasil  = mysql_query("SELECT password FROM members WHERE username = $username AND active='Yes'");
			// $hitung = mysql_num_rows($hasil);
			// $data   = mysql_fetch_array($hasil);
			// print_r($data);

		} catch(PDOException $e) {
			// echo 'test';
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function get_user_id($username){
		
		try {
			$stmt = $this->_db->prepare('SELECT memberId FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['memberId'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">A'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){
		// echo "username : $username";
		// echo " password : $password";
		$hashed = $this->get_user_hash($username);
		$test = $this->password_verifyed($password,$hashed);
		// echo $test;
		// print_r($test);
		// echo " password : $password";
		// echo " hashed : $hashed";
		// print_r($hashed);

		if($this->password_verifyed($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	public function gerusername(){
		return $_SESSION['username'];
		// print_r($_SESSION);
				
	}

	public function get_user($memberID){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM members WHERE memberID = :memberID');
			$stmt->execute(array('memberID' => $memberID));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">A'.$e->getMessage().'</p>';
		}
    }

    public function get_user_profile($username){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">B'.$e->getMessage().'</p>';
		}
    }

	public function get_request($reqID){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM request WHERE reqID = :reqID');
			$stmt->execute(array('reqID' => $reqID));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">C'.$e->getMessage().'</p>';
		}
    }

}

?>