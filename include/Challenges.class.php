<?PHP
	/**
	 * Class make challenge for web
	 * @
	 */
	class challenge {
		
		var $db;
		
		public function challenge($db){
			$this->db = $db;
		}
		
		public function gettitle($id){
			$id = (int)$id;
			$sql = "SELECT challtitle FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["challtitle"];
		}
		
		public function getid($cid){
			$cid = (int)$cid;
			$sql = "SELECT * FROM challenges WHERE catid={$cid}";
			return $this->db->fetch_all_array($sql);
		}
		
		public function getcontent($id){
			$id = (int)$id;
			$sql = "SELECT challcontent FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["challcontent"];
		}
		
		public function getflag($id){
			$id = (int)$id;
			$sql = "SELECT flag FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["flag"];
		}
		
		public function getpoint($id){
			$id = (int)$id;
			$sql = "SELECT point FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["point"];
		}
		
		public function getcatid($id){
			$id = (int)$id;
			$sql = "SELECT catid FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Fetch_array_assoc($query);
			return $rows["catid"];
		}
		
		public function getcat(){
			$sql = "SELECT * FROM categories";
			return $this->db->fetch_all_array($sql);
		}
		
		public function checkID($id){
			$id = (int)$id;
			$sql = "SELECT challtitle FROM challenges WHERE challid={$id}";
			$query = $this->db->QueryDb($sql);
			$rows = $this->db->Num_row($query);
			if($rows > 0){
				return 1;
			}
			else return 0;
		}
		
		public function checkflag($flag, $id){
			$id = (int)$id;
			if($this->getflag($id) == null) return -1;
			else if($flag == $this->getflag($id)) return 1;
			else return 0;
		}
	}
?>