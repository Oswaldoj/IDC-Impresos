<?php namespace Models\Repositories;
	require_once __DIR__.'/../db/Database.class.php';
	require_once 'ImpresosObjectRepository.class.php';
	require_once 'IAreaRepository.interface.php';
	require_once 'Area.class.php';
	use \Database;
	use \Models\Repositories as Repositories;
	use \Models\Beans as Beans;


	class AreaRepository extends Repositories\ImpresosObjectRepository
						 implements Repositories\IAreaRepository{

		public function __construct(Database\Database $dbh) {
			parent::__construct($dbh,'impresos_area');
		}

		public static function arrayToArea(Array $array){
			$area = new Beans\Area();
			$area->loadProperties($array);
			return $area;
		}

		/* Checks if the given objet is of type area*/
		private function isAreaType($obj){
			return ($obj instanceof Beans\Area);
		}

		private function checkAreaType($obj){
			if (!$this->isAreaType($obj)) {
				throw Exception ('Expected Area type, got: ' . gettype($value));
			}
		}

		public function getInstance(String $name) { 
			$row = parent::getInstance($name);
			return (new Beans\Area())->loadProperties($row);
		}

		public function arrayToAreas(Array $array){
			// casts all rows to Area
			return array_map(array($this,"arrayToArea"),$array);
		}

		public function getAllAreas(){
			$rows = parent::getAll();
			return $this->arrayToAreas($rows);
		}

		public function save(Beans\ImpresosObject $area) { 
			$this->checkAreaType($area);
			return parent::save($area);
		}

		public function updateName(Beans\ImpresosObject $area,$newname) {
			$this->checkAreaType($area);
			return parent::updateName($area,$newname);
		}
		
		public function updateDescription(Beans\ImpresosObject $area,$newdescription) {
			$this->checkAreaType($area);
			return parent::pdateDescription($area,$newdescription);
		}

		public function updateImage(Beans\ImpresosObject $area,$img_url) {
			$this->checkAreaType($area);
			return parent::updateImage($area,$img_url);
		}

		public function updateArea(Beans\ImpresosObject $area,$newname,$newdescription,$img_url){
			$this->checkAreaType($area);
			return parent::updateObject($area,$img_url);
		}
	}
?>