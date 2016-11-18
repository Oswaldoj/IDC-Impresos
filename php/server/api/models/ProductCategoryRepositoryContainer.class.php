<?php namespace Models\Containers;
	require_once 'IProductCategoryRepository.interface.php';
	use \Models\Repositories as Repositories;

	class ProductCategoryRepositoryContainer {
			private $repository;
			public function __construct(Repositories\IProductCategoryRepository $product_category_repository) {
				$this->repository = $product_category_repository; 
			}
			public function getProductCategoryRepository() { 
				return $this->repository; 
			}
		}
?>