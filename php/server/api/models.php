<?php namespace Models;	
	require_once 'database.class.php';
	use DatabaseLayer;
	// Define DB configuration
	define("DB_HOST", "127.0.0.1");
	define("DB_USER", "idcconsultores");
	define("DB_PASS", "consultores");
	define("DB_NAME", "impresos");

	class User {
		protected $name = '';

		public function __construct() {
			$this->name = "Cesar";
		}

		public function getName(){
			return $this->name;
		}
	} 


	class APIKey {
	    public function __construct() {
		}
	} 

	class Area {
		private $id;
		private $name;
		private $description = '';
		private $image;

		public function __construct($name) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function getDescription() {
			return $this->description;
		}

		public function getImage() {
			return $this->image;
		}

		public function setName($name) {
			$this->name=$name;
		}

		public function setDescription($description){
			$this->description = $description;
		}
   }

	interface IAreaRepository { 
		public function getArea($name);
		public function getAllAreas();
		public function saveArea(Area $area);
		public function updateName(Area $area,$newname);
		public function updateDescription(Area $area,$newdescription);
		public function updateImage(Area $area,$img_url);
		public function update(Area $area,$newname,$newdescription,$img_url);
	}

	abstract class SQLRepository implements IAreaRepository{
		protected $dbhandler;
		protected $tablename;

		public function __construct(DatabaseLayer\Database $dbhandler,$tablename = '') {
			$this->dbhandler = $dbhandler;
			$this->tablename = $tablename;
		}

		protected function tablenameIsSet(){
			return (isset($this->tablename) && trim($this->tablename)!=='');
		}

		protected function setTableName($tablename){
			$this->tablename = $tablename;
		}

		protected function setDBHandler($dbhandler){
			$this->dbhandler = $dbhandler;
		}
	}

	class AreaRepository extends SQLRepository{

		public function __construct(DatabaseLayer\Database $dbh) {
			parent::__construct($dbh,'impresos_area');
		}

		public function getArea($name) { 
			$this->dbhandler->query('SELECT * FROM '.$this->tablename.' WHERE name= :areaname');
			$this->dbhandler->bind(':areaname',$this->name);
			$row = $this->dbhandler->getSingleRow();
			return $row;
		}

		public function getAllAreas() { 
			$this->dbhandler->query('SELECT * FROM '.$this->tablename);
			//$this->dbhandler->bind(':tablename',$this->tablename);
			$row = $this->dbhandler->getResultSet();
			return $row;
		}

		public function saveArea(Area $area) { 
			$this->dbhandler->query('INSERT INTO '.$this->tablename.' (name,description,img) VALUES (:name, :description, :image');
			$this->dbhandler->bind(':name',$area->getName());
			$this->dbhandler->bind(':description',$area->getDescription());
			$this->dbhandler->bind(':image',$area->getImage());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateName(Area $area,$newname) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET name = :newname WHERE name = :oldname');
			$this->dbhandler->bind(':newname',$newname);
			$this->dbhandler->bind(':oldname',$area->getName());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateDescription(Area $area,$newdescription) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET description = :newdescription WHERE name = :areaname');
			$this->dbhandler->bind(':areaname',$area->getName());
			$this->dbhandler->bind(':newdescription',$newdescription);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateImage(Area $area,$img_url) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET img = :newimgurl WHERE name = :areaname');
			$this->dbhandler->bind(':areaname',$area->getName());
			$this->dbhandler->bind(':newimgurl',$img_url);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function update(Area $area,$newname,$newdescription,$img_url){
			$this->updateName($area,$newname);
			$this->updateDescription($area,$newdescription);
			$this->updateImage($area,$img_url);
			return $this->dbhandler->errorExists();
		}
   }

	class AreaRepositoryContainer {
		private $repository;
		public function __construct(IAreaRepository $area_repository) {
			$this->repository = $area_repository; 
		}
		public function getAreaRepository() { 
			return $this->repository; 
		}
	}


	class AreaFactory { 
		private $db_builder;

		public function __construct(DatabaseBuilder $db_builder = null) {
			if (is_null($db_builder)) {
				$db_builder = new DatabaseLayer\DatabaseBuilder();
			}
			$this->db_builder = $db_builder;
		}
	
		public function getAreaRepositoryContainer() {
			$db_builder = $this->db_builder;
			$db_builder->host(DB_HOST)->user(DB_USER)->password(DB_PASS)->dbName(DB_NAME);
			$pdo = $db_builder->getDatabaseInstance();
			$repository = new AreaRepository($pdo);
			return new AreaRepositoryContainer($repository);
		}
	}
?>
