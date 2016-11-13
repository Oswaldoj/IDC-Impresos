<?php namespace Database;
	require_once 'Database.class.php';
	use \Database;
	class DatabaseBuilder {  
		private $host;
		private $user;
		private $password;
		private $dbname;

		public function __construct(){
		}

		public function host($host){
			$this->host = $host;
			return $this;
		}

		public function user($user){
			$this->user = $user;
			return $this;
		}

		public function password($password){
			$this->password = $password;
			return $this;
		}

		public function dbName($dbname){
			$this->dbname = $dbname;
			return $this;
		}

		public function getHost(){
			return $this->host;
		}

		public function getUser(){
			return $this->user;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getDbName(){
			return $this->dbname;
		}

		public function isProperlyBuilt(){
			return ($this->isHostSet() && $this->isUserSet() && $this->isPasswordSet() && $this->isDbNameSet());
		}

		public function isHostSet(){
			return (isset($this->host) && trim($this->host)!=='');
		}

		public function isUserSet(){
			return (isset($this->user) && trim($this->user)!=='');
		}

		public function isPasswordSet(){
			return (isset($this->password) && trim($this->password)!=='');
		}

		public function isDbNameSet(){
			return (isset($this->dbname) && trim($this->dbname)!=='');
		}

		public function getDatabaseInstance(){
			if (!$this->isProperlyBuilt()){
				throw new Exception('Database parameters missing');
			}
			return new Database\Database($this);
		}

	}
?>
