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

	function checkPerms($desiredaccess, $strict = true){
		if (in_array($desiredaccess, $this->userRoles)){
			return True;
		}else{
			if ($strict != true){
				if ($desiredaccess >= min($this->userRoles)){
					return True;
				}else{
					return False;
				}
			}else{
				return False;
			}
		}
	}

	function getFirstName(){
		return $this->firstName;
	}

	function getEmail(){
		return $this->email;
	}

	function getRolesAsStrings(){
		$theroles = "";
		foreach ($this->userRoles as $role){
			$theroles += $this->getRoleName($role)." ";
		}
		return trim($theroles);
	}

	function getRoleName($role){
		$db = buildDBObject();
		$db->where('RoleID', $role);
		$results = $db->get('Roles');
		$results = $results[0];
		print_r($results);
		return $results['RoleName'];
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
				->where('IPAddress', $this->userIP)
				->where('LoggedOut', '0')
				->where('Type', 'Session')
				->get('Sessions');
			
			if (count($results) > 0){
				$results = $results[0];
				return $results['UserID'];
			}else{
				return False;
			}
		}elseif(isset($_COOKIE['CSA'])){
			$session = $_COOKIE['CSA'];
			
			$results = $db
				->where('SessionContent', $session)
				->where('IPAddress', $this->userIP)
				->where('LoggedOut', '0')
				->where('Type', 'Cookie')
				->get('Sessions');
			
			if (count($results) > 0){
				$results = $results[0];
				return $results['UserID'];
			}else{
				return False;
			}
		}else{
			return False;
		}
	}

	function buildObject($userid){
		$db = buildDBObject();
		$db->where("UserID", $userid);
		$user = $db->get("Users", 1);
		if (!empty($user)){
			$user = $user[0];
			$this->userID = $user["UserID"];
			$this->userName = $user["Username"];
			$this->email = $user["Email"];
			$this->firstName = $user["FirstName"];
			$this->lastName = $user["LastName"];

			$cols = Array("RoleID");
			$roles = $db->get("User_Role", null, $cols);
			//print_r($roles);
			if (empty($roles)){
				$this->userRoles = Array("Guest");
			}else{
				$this->userRoles = array();
				foreach ($roles as $role){
					array_push($this->userRoles, $role['RoleID']);
				}
			}

			$db->where("UserID", $this->userID);
			$user_auth = $db->get("User_Auth");
			$user_auth = $user_auth[0];

			$this->activeEnabled = $user_auth["AccountEnabled"];
			$this->lastLogin = $user_auth["LastLogin"];
			$this->emailToken = $user_auth['EmailToken'];
			$this->resetToken = $user_auth["ResetToken"];
			return True;
		}else{
			return False;
		}

	}

	function destroySession(){
		$db = buildDBObject();
		$data = array (
		    'LoggedOut' => '1'
		);
		$db->where('SessionContent', $_SESSION['user']);
		if ($db->update('Sessions', $data)){
			$_SESSION['user'] = Null;
		}else{
			echo "Error logging you out";
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
		    'Type' => "Session"
		);

		$result = $db->insert('Sessions', $data);
		if ($result){
			$_SESSION['user'] = $this->sessionContent;
			return True;
		}else{
			return False;
		}
	}

	function buildCookie(){
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
		    'Type' => "Cookie"
		);

		$result = $db->insert('Sessions', $data);
		if ($result){
			setcookie("CSA", $this->sessionContent, time()+60*60*24*7, "/", "csa.nebriv.com");
			return True;
		}
	}

	function getAccountStatus($username = NULL){
		if ($username == NULL){
			$username = $this->userName;
		}
	}
	
	function getRoleID($role){
		$db = buildDBObject();
		$db->where('RoleName', $role);
		$results = $db
			->get('Roles');
		$results = $results[0];
		return $results['RoleID'];
	}

	function checkCredentials($username = NULL, $password){
		$db = buildDBObject();

		if ($username == NULL){
			$username = $this->userName;
		}

		$results = $db
			->where('Username', $username)
			->get('Users');

		if (count($results) == 0){
			return False;
		}else{
			$results = $results[0];

			if (count($results) > 0){
				$id = $results['UserID'];
				$results2 = $db
					->where("UserID", $id)
					->get("User_Auth");
				$results2 = $results2[0];
				if (password_verify($password, $results2['PasswordHash'])){
					$data = array (
						'LastLogin' => date("Y-m-d H:i:s"),
						);
					$db->where('UserID', $id);
					$db->update('User_Auth', $data);
					return $id;
				}else{
					return False;
				}
			}else{
				return False;
			}
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
				$user = $db
					->where("Username", $newusername)
					->get("Users");
				$user = $user[0];
				$this->UserID = $user['UserID'];
				$hash = password_hash($newpassword, PASSWORD_DEFAULT);
				if ($hash){
					$data = array(
					    'UserID' => $this->UserID,
					    'PasswordHash' => $hash,
					);
					$id = $db->insert('User_Auth', $data);
					if ($id){
						$data = array(
							'UserRoleID' => NULL,
							'UserID' => $this->UserID,
							'RoleID' => $this->getRoleID("Guest")
						);
						$id = $db->insert('User_Role', $data);
						if ($id){
							return "Successfully made user";
						}else{
							return "Error giving user a role";
						}
					}else{
						return "Error making user2";
					}
				}else{
					return "Error hashing password";
				}

			}else{
				return "Error making user";
			}
		}else{
			return "This user already exists";
		}
	}

	

}

?>