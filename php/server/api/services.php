<?php namespace Services;
	require_once 'models/AreaFactory.class.php';
	use \Models\Factories as Factories;

	class ImpresosService {

		private $area_repository_container;

		public function __construct($area_factory = null){
			if (is_null($area_factory)) {
				$area_factory = new Factories\AreaFactory();
			}
			$this->area_repository_container = $area_factory->getAreaRepositoryContainer();
		}

		public function getArea($name){
			 return $this->area_repository_container->getAreaRepository()->getArea($name);
		}

		public function getAllAreas(){
			 return $this->area_repository_container->getAreaRepository()->getAllAreas();
		}
	}


?>