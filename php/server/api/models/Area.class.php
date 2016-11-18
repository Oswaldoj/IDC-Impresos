<?php namespace Models\Beans;
	require_once 'ImpresosObject.class.php';
	require_once 'ProductCategory.class.php';
	use \Models\Beans as Beans;
	use \JsonSerializable;

	class Area extends Beans\ImpresosObject implements JsonSerializable{

		private $product_categories;

		public function __construct($name = '',$description = '',$img = '',$pc = null){
			parent::__construct($name,$description,$img);
			$this->product_categories = array();
		}

		public function addProductCategory(Beans\ProductCategory $product_category){
			$this->product_categories[] = $product_category;
		}

		public function addProductCategories(Array $product_category_array){
			foreach ($product_category_array as $product_category) {
				$this->addProductCategory($product_category);
			}
		}

		public function getProductCategories(){
			return $this->product_categories;
		}

		public function asArray(){
			$area_array = parent::asArray();
			$product_category_array = array();
			foreach ($this->product_categories as $product_category) {
				$product_category_array[] = $product_category->asArray();
			}
			$area_array['product_categories'] = $product_category_array;
			return $area_array;
		}

		public function jsonSerialize() {
        	return $this->asArray();
    	}
   	}
?>