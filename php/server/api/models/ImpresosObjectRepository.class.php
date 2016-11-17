<?php namespace Models\Repositories;
	require_once __DIR__.'/../db/Database.class.php';
	require_once 'SQLRepository.class.php';
	require_once 'IImpresosObjectRepository.interface.php';
	require_once 'Area.class.php';
	use \Database;
	use \Models\Beans as Beans;
	use \Models\Repositories as Repositories;


	class ImpresosObjectRepository extends Repositories\SQLRepository 
											implements Repositories\IImpresosObjectRepository {

		public function __construct(Database\Database $dbh,$tablename) {
			parent::__construct($dbh,$tablename);
		}

		public function getInstance(String $name) { 
			$this->dbhandler->query('SELECT * FROM ' . $this->tablename . ' WHERE name= :name');
			$this->dbhandler->bind(':name',$this->name);
			$row = $this->dbhandler->getSingleRow();
			return $row;
		}

		public function getAll() { 
			$this->dbhandler->query('SELECT * FROM ' . $this->tablename);
			//$this->dbhandler->bind(':tablename',$this->tablename);
			$rows = $this->dbhandler->getResultSet();
			return $rows;
		}

		public function save(Beans\ImpresosObject $obj) { 
			$this->dbhandler->query('INSERT INTO ' . $this->tablename . ' (name,description,img) VALUES (:name, :description, :image');
			$this->dbhandler->bind(':name',$obj->getName());
			$this->dbhandler->bind(':description',$obj->getDescription());
			$this->dbhandler->bind(':image',$obj->getImage());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateName(Beans\ImpresosObject $obj,$newname) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET name = :newname WHERE name = :oldname');
			$this->dbhandler->bind(':newname',$newname);
			$this->dbhandler->bind(':oldname',$obj->getName());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateDescription(Beans\ImpresosObject $obj,$newdescription) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET description = :newdescription WHERE name = :name');
			$this->dbhandler->bind(':name',$obj->getName());
			$this->dbhandler->bind(':newdescription',$newdescription);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function updateImage(Beans\ImpresosObject $obj,$img_url) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET img = :newimgurl WHERE name = :name');
			$this->dbhandler->bind(':name',$obj->getName());
			$this->dbhandler->bind(':newimgurl',$img_url);
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function update(Beans\ImpresosObject $obj,$newname,$newdescription,$img_url){
			$this->updateName($obj,$newname);
			$this->updateDescription($obj,$newdescription);
			$this->updateImage($obj,$img_url);
			return $this->dbhandler->errorExists();
		}
   }
 ?>