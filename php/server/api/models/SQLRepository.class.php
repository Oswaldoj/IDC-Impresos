<?php namespace Models\Repositories;
	require_once __DIR__.'/../db/Database.class.php';
	require_once __DIR__.'/IAreaRepository.interface.php';
	use \Database;
	use \Models\Repositories as Repositories;

	abstract class SQLRepository implements Repositories\IAreaRepository{
		protected $dbhandler;
		protected $tablename;

		public function __construct(Database\Database $dbhandler,$tablename = '') {
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
?>