<?php namespace Models\Beans;
	require 'ImpresosObject.class.php';
	require 'Area.class.php';

	use \Models\Beans as Beans;
	
	class ProductCategory extends Beans\ImpresosObject{

		private $area;

		public function __construct($name = '',$description = '',$img = '',$area = null){
			$this->name = $name;
			$this->description = $description;
			$this->img = $img;
			$this->area = !is_null($area) ? $area : new Beans\Area();
		}
		public function loadProperties($array) {
			 parent::loadProperties($array);
			 if (array_key_exists('area_id',$array)){
				$this->area->loadProperties(['id'=> $array['area_id']]);
			}
		}

		public function getArea() {
			return $this->area;
		}

		public function setArea(Bean\Area $area) {
			$this->area = $area;
		}
	}


?>