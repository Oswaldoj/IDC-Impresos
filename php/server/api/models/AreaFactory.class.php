<?php namespace Models\Factories;
	require_once __DIR__. '/../db/DatabaseBuilder.class.php';
	require_once __DIR__. '/../db/DatabaseConfiguration.class.php';
	require_once 'AreaRepository.class.php';
	require_once 'AreaRepositoryContainer.class.php';
	use \Database;
	use \Models\Repositories as Repositories;
	use \Models\Containers as Containers;

	class AreaFactory { 
		private $db_configuration;
		private $db_builder;

		public function __construct(Database\DatabaseBuilder $db_builder = null,
									Database\DatabaseConfiguration $db_configuration = null) {
			if (is_null($db_builder)) {
				$db_builder = new Database\DatabaseBuilder();
			}

			if (is_null($db_configuration)) {
				$db_configuration = new Database\DatabaseConfiguration();
			}
			$this->db_builder = $db_builder;
			$this->db_configuration = $db_configuration;
		}

		public function getAreaRepositoryContainer() {
			$db_builder = $this->db_builder;
			$db_builder->host($this->db_configuration->getHost())
					   ->user($this->db_configuration->getUser())
					   ->password($this->db_configuration->getDBPassword())
					   ->dbName($this->db_configuration->getDBName());
			$pdo = $db_builder->getDatabaseInstance();
			$repository = new Repositories\AreaRepository($pdo);
			return new Containers\AreaRepositoryContainer($repository);
		}
	}
?>