<?php namespace Models\Containers;
	require_once 'IAreaRepository.interface.php';
	use \Models\Repositories as Repositories;

	class AreaRepositoryContainer {
			private $repository;
			public function __construct(Repositories\IAreaRepository $area_repository) {
				$this->repository = $area_repository; 
			}
			public function getAreaRepository() { 
				return $this->repository; 
			}
		}
?>