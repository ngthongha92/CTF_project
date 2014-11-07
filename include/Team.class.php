<?PHP
	/**
	 * Class make team for web
	 * @
	 */
	
	class team{
		var $point;
		var $result;
		var $timer;
		var $ipclient;
		var $db;
		
		function __construct($db){
			$this->db = $db;
			$this->GetClientIP();
		}
		
		/**
		*
		*
		*/
		public function GetClientIP() {
			if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
				$this->ipclient = getenv("HTTP_CLIENT_IP");
			else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
				$this->ipclient = getenv("HTTP_X_FORWARDED_FOR");
			else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$this->ipclient = getenv("REMOTE_ADDR");
			else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
				$this->ipclient = $_SERVER['REMOTE_ADDR'];
			else
				$this->ipclient = "unknown";
			return $this->ipclient;
		}
		
		
		public function getalluser(){
			$sql = "SELECT * FROM player ORDER BY math DESC ,time DESC";
			return $this->db->fetch_all_array($sql);
		}
		/**
		* 
		* 
		*/
		public function SetclientIP($username){
			$ip=$this->ipclient;
			$sql="Insert into player(ipclient) Values({$ip}) WHERE username={$username}";
			$query=$this->db->QueryDb($sql);
			return $query;
		}
		
		/**
		*
		*
		*/
		public function CheckclientIP($username){
			$sql = "SELECT fullname FROM player WHERE username=".$username;
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			if($this->ipclient==$rows["ipclient"]) $this->logout();
		}
		
		/**
		*
		*
		*/
		public function getname($username){
			$sql = "SELECT * FROM player WHERE username='".$username."'";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["fullname"];
		}
		
		/**
		*
		*
		*/
		public function checklogin($username='aaa', $password='aaa'){
			$sql = "SELECT * FROM player WHERE username='".$username."' AND password='".$password."'";
			$q = $this->db->QueryDB($sql);
			$r = $this->db->Num_row($q);
			if($username==""||$username==null) return "Enter your username.";
			else if($password==""||$password==null) return "Enter your password.";
			if($r>0){
				$this->SetclientIP($user);
				$this->getname($user);
				return "successful";
			}
			else return "The username or password you entered is incorrect.";
		}
		
		/**
		*
		*
		*/
		public function logout(){
			session_start();
			session_destroy();
		}
		
		/**
		*
		*
		*/
		public function getpoint($username){
			$sql = "SELECT math FROM player WHERE username=`{$username}`";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["math"];
		}
		
		/**
		*
		*
		*/
		public function setpoint($user, $point){
			$math = getpoint($user);
			$math += $point;
			$sql="UPDATE player SET math={$math} WHERE username={$user}";
			$query=$this->db->QueryDb($sql);
			return $query;
		}
		
		/**
		*
		*
		*/
		public function getresult($user){
			$sql = "SELECT result FROM player WHERE username=`{$user}`";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["result"];
		}
		
		/**
		*
		*
		*/
		public function setresult($user, $result){
			$rs = getresult($user);
			$rs .= $result;
			$sql="UPDATE player SET result='{$rs}' WHERE username={$user}";
			$query=$this->db->QueryDb($sql);
			return $query;
		}
	}
?>