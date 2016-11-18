<?php namespace Models\Beans;
	require_once 'ImpresosObject.class.php';
	require_once 'Area.class.php';

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

		public function asArray() {
			$product_category_array = parent::asArray();
        	$product_category_array['area_id'] = $this->area->getId();
        	return $product_category_array;
    	}

		public function jsonSerialize() {
        	return $this->asArray();
    	}
	}


?>