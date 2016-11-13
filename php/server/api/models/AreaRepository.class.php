<?php namespace Models\Repositories;
	require_once __DIR__.'/../db/Database.class.php';
	require_once 'SQLRepository.class.php';
	require_once 'Area.class.php';
	use \Database;
	use \Models\Beans as Beans;
	use \Models\Repositories as Repositories;


	class AreaRepository extends Repositories\SQLRepository{

		public function __construct(Database\Database $dbh) {
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

		public function saveArea(Beans\Area $area) { 
			$this->dbhandler->query('INSERT INTO '.$this->tablename.' (name,description,img) VALUES (:name, :description, :image');
			$this->dbhandler->bind(':name',$area->getName());
			$this->dbhandler->bind(':description',$area->getDescription());
			$this->dbhandler->bind(':image',$area->getImage());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateName(Beans\Area $area,$newname) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET name = :newname WHERE name = :oldname');
			$this->dbhandler->bind(':newname',$newname);
			$this->dbhandler->bind(':oldname',$area->getName());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateDescription(Beans\Area $area,$newdescription) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET description = :newdescription WHERE name = :areaname');
			$this->dbhandler->bind(':areaname',$area->getName());
			$this->dbhandler->bind(':newdescription',$newdescription);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateImage(Beans\Area $area,$img_url) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET img = :newimgurl WHERE name = :areaname');
			$this->dbhandler->bind(':areaname',$area->getName());
			$this->dbhandler->bind(':newimgurl',$img_url);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function update(Beans\Area $area,$newname,$newdescription,$img_url){
			$this->updateName($area,$newname);
			$this->updateDescription($area,$newdescription);
			$this->updateImage($area,$img_url);
			return $this->dbhandler->errorExists();
		}
   }
 ?>