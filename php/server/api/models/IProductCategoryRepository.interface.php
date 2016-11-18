<?php namespace Models\Repositories;
	require_once 'IImpresosObjectRepository.interface.php';
	require_once 'Area.class.php';
	require_once 'ProductCategory.class.php';
	use \Models\Repositories as Repositories;
	use \Models\Beans as Beans;	

	interface IProductCategoryRepository extends Repositories\IImpresosObjectRepository {  
		public function updateArea(Beans\ProductCategory $product_category, Beans\Area $area);
		public function getProductCategoriesOfArea(Beans\Area $area);
	}
?>