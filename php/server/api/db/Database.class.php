<?php namespace Database;
	require_once 'DatabaseBuilder.class.php';
	use \PDO;
	class Database{	
		protected $host;
		protected $user;
		protected $password;
		protected $dbname;

		protected $dbhandler;
		protected $dberror;

		public function __construct(DatabaseBuilder $db_builder){
			$this->host = $db_builder->getHost();
			$this->user = $db_builder->getUser();
			$this->password = $db_builder->getPassword();
			$this->dbname = $db_builder->getDbName();
			$this->initDbHandler($this->host,$this->user,$this->password,$this->dbname);
		}

		protected function initDbHandler($host,$user,$password,$dbname){
			// build Database Source Name
			$dsn = 'pgsql:host=' . $this->host . ' dbname=' . $this->dbname;
			$options = array(
				PDO::ATTR_PERSISTENT => true, 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			try {
				$this->dbhandler = new PDO($dsn, $this->user, $this->password, $options);
			}
			catch (PDOException $e) {
				$this->error = $e->getMessage();
			}
		}

		public function query($query){
			$this->statement = $this->dbhandler->prepare($query);
		}

		public function errorExists(){
			return (isset($this->error) && trim($this->error)!=='');
		}

		public function bind($param, $value, $type = null){
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->statement->bindValue($param, $value, $type);
		}

		public function execute(){
			try {
				return $this->statement->execute();
			}
			catch(PDOException $e) {
				$this->error = $e->getMessage();
			}
		}

		public function getResultSet(){
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleRow(){
			$this->execute();
			return $this->statement->fetch(PDO::FETCH_ASSOC);
		}

		public function getLastInsertedId(){
			return $this->dbhandler->lastInsertId();
		}

		public function beginTransaction(){
			return $this->dbhandler->beginTransaction();
		}

		public function endTransaction(){
			return $this->dbhandler->commit();
		}

		public function cancelTransaction(){
			return $this->dbhandler->rollBack();
		}

		public function debugDumpParams(){
			return $this->statement->debugDumpParams();
		}
	}

?>
