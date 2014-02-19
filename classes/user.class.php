<?php

class User {

	function __construct($id = NULL, $newusername = NULL, $newemail = NULL, $newfirstname = NULL, $newlastname = NULL, $newrole = "Guest"){
		
		$this->userID = $id;
		$this->userName = $newusername;
		$this->email = $newemail;
		$this->firstName = $newfirstname;
		$this->lastName = $newlastname;
		$this->userRoles = $newrole;
		$this->userIP = $_SERVER['REMOTE_ADDR'];

		$db = buildDBObject();
	}

	function __destruct(){
		$db = NULL;
	}

	function getUsername(){
		//Returns the Username or Null if it's not set.
		if (isset($this->userName)){
			return $this->userName;
		}else{
			return NULL;
		}
	}

	function setUsername($newusername){
		$this->userName = $newusername;
	}

	function getID(){
		//Returns the User's ID or Null if it's not set.
		if (isset($this->userID)){
			return $this->userID;
		}else{
			return NULL;
		}
	}

	function setID($newid){
		$this->userID = $newid;
	}

	function checkSession(){
		$db = buildDBObject();
		if (isset($_SESSION['user'])){
			$session = $_SESSION['user'];
			
			$results = $db
				->where('SessionContent', $session)
				->where('UserID', $this->userID)
				->where('IPAddress', $this->userIP)
				->get('Sessions');
			
			if (count($results) > 0){
				return True;
			}else{
				return False;
			}

		}else{
			return False;
		}
	}

	function buildSession(){
		$this->sessionToken = sha1(bin2hex(openssl_random_pseudo_bytes(16)));
		$this->sessionContent = sha1($this->sessionToken.$this->userIP);

		$db = buildDBObject();

		$data = array(
			'SessionID' => NULL,
		    'UserID' => $this->userID,
		    'SessionContent' => $this->sessionContent,
		    'IPAddress' => $this->userIP,
		    'LastActive' => NULL,
		    'Token' => $this->sessionToken,
		);

		$result = $db->insert('Sessions', $data);
		if ($result){
			$_SESSION['user'] = $this->sessionContent;
		}
	}

	function checkCredentials($username = NULL, $password){
		$db = buildDBObject();

		if ($username == NULL){
			$username = $this->userName;
		}

		$results = $db
			->where('Username', $username)
			->get('Users');

		if (count($results) > 0){
			$id = $results['UserID'];
			echo $id;
			$results2 = $db
				->where("UserID", $id)
				->get("User_Auth");
			if (password_verify($password, $results2['PasswordHash'])){
				return True;
			}else{
				return False;
			}
		}else{
			return False;
		}
	}

	function registerUser($newusername, $newpassword, $newemail, $newfirstname, $newlastname){
		$db = buildDBObject();
		$params = array($newusername, $newemail);
		$results = $db->rawQuery("SELECT UserID FROM Users WHERE Username = ? OR Email = ?", $params);

		if (count($results) == 0){
			$this->userName = $newusername;
			$this->email = $newemail;
			$this->firstName = $newfirstname;
			$this->lastName = $newlastname;

			$data = array(
			    'UserID' => NULL,
			    'Username' => $newusername,
			    'Email' => $newemail,
			    'FirstName' => $newfirstname,
			    'LastName' => $newlastname,
			);
			$id = $db->insert('Users', $data);
			if($id){
				$db->reset();

				$db->where ("Username", $newusername);
				$user = $db->getOne ("Users");
				$this->UserID = $user['UserID'];
				$hash = password_hash($newpassword);
				if ($hash){
					$data = array(
					    'UserID' => $this->UserID,
					    'PasswordHash' => $hash,
					    'AccountEnable' => 0,
					);
					$id = $db->insert('User_Auth', $data);
				}else{
					echo "Error hashing password";
				}

			}else{
				echo "Error making user";
			}
		}else{
			echo "This user already exists";
		}
	}



}

?>