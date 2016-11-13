<?php namespace Models\Factories;
	require_once __DIR__. '/../db/DatabaseBuilder.class.php';
	require_once 'AreaRepository.class.php';
	require_once 'AreaRepositoryContainer.class.php';
	use \Database;
	use \Models\Repositories as Repositories;
	use \Models\Containers as Containers;

	// Define DB configuration
	define("DB_HOST", "127.0.0.1");
	define("DB_USER", "idcconsultores");
	define("DB_PASS", "consultores");
	define("DB_NAME", "impresos");

	class AreaFactory { 
		private $db_builder;

		public function __construct(Database\DatabaseBuilder $db_builder = null) {
			if (is_null($db_builder)) {
				$db_builder = new Database\DatabaseBuilder();
			}
			$this->db_builder = $db_builder;
		}

		public function getAreaRepositoryContainer() {
			$db_builder = $this->db_builder;
			$db_builder->host(DB_HOST)->user(DB_USER)->password(DB_PASS)->dbName(DB_NAME);
			$pdo = $db_builder->getDatabaseInstance();
			$repository = new Repositories\AreaRepository($pdo);
			return new Containers\AreaRepositoryContainer($repository);
		}
	}
?>