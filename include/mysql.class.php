<?PHP
	/**
	 * Class make database for web
	 * @
	 */
	class database_class{
		/**
		 * 
		 */
		var $dbhost;
		var $dbuser;
		var $dbpass;
		var $dbname;
		var $dbtype;
		var $dbmycon;
		var $dbmyerror;
		var $dbmyerrno;
		var $lquery;
		
		// 
		function __construct($dbhost, $dbuser, $dbpass, $dbname, $dbtype="UTF-8"){
			$this->dbhost = $dbhost;
			$this->dbuser = $dbuser;
			$this->dbpass = $dbpass;
			$this->dbname = $dbname;
			$this->dbtype = $dbtype;
			$this->OpenConnectToDb();
		}
		// 
		function __destruct() {
			@mysqli_close($this->dbmycon);
		}
		/**
		 * function connect to database using mysqli
		 * @ Function return conect database

		 */
		public function OpenConnectToDb(){
			$this->dbmycon = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			
			//--Check connection
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}
			else{
				mysqli_set_charset($this->dbmycon, $this->dbtype);
			}
		}
		
		/**
		 * function close database
		 */
		public function CloseConnectToDb(){
			mysqli_close($this->dbmycon);
		 }
		 
		/**
		 * function query execution data
		 */
		public function QueryDb($sql){
			if($this->lquery = mysqli_query($this->dbmycon, $sql)){
				return $this->lquery;
			}
			else{
				$this->exception("Could not query database!");
				return false;
			}
		 }
		 
		/**
		 * Query get number of rows from database
		 */
		public function Num_row($queryid){
			if(empty($queryid)){
				$this->exception("Could not get number of rows because no query id was supplied!");
				return false;
			}
			else{
				return mysqli_num_rows($queryid);
			}
		}
		 
		/**
		 * 
		 */
		public function Fetch_array($queryid){
			if(empty($queryid)){
				$this->exception("Could not fetch array because no query id was supplied!");
				return false;
			}
			else{
				$data_fetch_arrary = mysqli_fetch_array($queryid);
			}
			return $data_fetch_arrary;
		}
		 
		/**
		 * 
		 */
		public function Fetch_array_assoc($queryid){
			if(empty($queryid)){
				$this->exception("Could not fetch array assoc because no query id was supplied!");
				return false;
			}
			else{
				$data_fetch_assoc = mysqli_fetch_assoc($queryid);
			}
			return $data_fetch_assoc;
		 }
		 
		/**
		 * get all data in table data
		 */
		public function Fetch_all_array($sql, $assoc = true){
			$data_temp = array();
			if($queryid = $this->QueryDb($sql)){
				if($assoc){
					while($row = $this->Fetch_array_assoc($queryid)){
						$data_temp[] = $row;
					}
				}
				else{
					while($row = $this->Fetch_array($queryid)){
						$data_temp[] = $row;
					}
				}
			}
			else{
				return false;
			}
			return $data_temp;
		}
		
		/**
		 *Assume that the Persons table has an auto-generated id field
		 *Return the id used in the last query
		 */
		public function Last_id(){
			if($id = mysqli_insert_id()){
				return $id;
			}
			else{
				return false;
			}
		}
		
		/**
		 *Function catch error to exception
		 */
		private function exception($message){
			if($this->dbmycon){
				$this->dbmyerror = mysqli_error($this->dbmycon);
				$this->dnmyerrno = mysqli_errno($this->dbmycon);
			}
			else{
				$this->dbmyerror = mysqli_error();
				$this->dbmyerrno = mysqli_errno();
			}
			
			if(PHP_SAPI !== "cli"){
				return $this->dbmyerror;
			}
			else{
				return $this->dbmyerror;
			}
		}
		
		/**
		 * MySQLResult Data Fetching Class
		 * @access public
		 * @package SPLIB
		 */
		
	}
?>