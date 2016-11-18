<?php namespace Services;
	require_once 'models/AreaFactory.class.php';
	require_once 'models/ProductCategoryFactory.class.php';
	use \Models\Factories as Factories;

	class ImpresosService {

		private $area_repository_container;
		private $product_category_repository_container;

		public function __construct($area_factory = null,
									$product_category_factory =null){
			if (is_null($area_factory)) {
				$area_factory = new Factories\AreaFactory();
			}
			if (is_null($product_category_factory)) {
				$product_category_factory = new Factories\ProductCategoryFactory();
			}
			$this->area_repository_container = $area_factory->getAreaRepositoryContainer();
			$this->product_category_repository_container = $product_category_factory->getProductCategoryRepositoryContainer();
		}

		public function getArea($name){
			 return $this->area_repository_container->getAreaRepository()->getArea($name);
		}

		public function getAllAreas(){
			 $area_repository = $this->area_repository_container->getAreaRepository();
			 $areas = $area_repository->getAllAreas();
			 $product_category_repository = $this->product_category_repository_container->getProductCategoryRepository();
			 foreach ($areas as $area) {
			 	$product_categories = $product_category_repository->getProductCategoriesOfArea($area);
			 	$area->addProductCategories($product_categories);
			 }
			 return $areas;
		}
	}


?>