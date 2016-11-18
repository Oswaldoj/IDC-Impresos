<?php namespace Models\Repositories;
	require_once __DIR__.'/../db/Database.class.php';
	require_once 'ImpresosObjectRepository.class.php';
	require_once 'IProductCategoryRepository.interface.php';
	require_once 'Area.class.php';
	require_once 'ProductCategory.class.php';
	use \Models\Repositories as Repositories;
	use \Models\Beans as Beans;
	use \Database;



	class ProductCategoryRepository extends Repositories\ImpresosObjectRepository 
									implements Repositories\IProductCategoryRepository {

		public function __construct(Database\Database $dbh) {
			parent::__construct($dbh,'impresos_productcategory');
		}

		public static function arrayToProductCategory(Array $array){
			$product_category = new Beans\ProductCategory();
			$product_category ->loadProperties($array);
			return $product_category;
		}
	  
	  	public function updateArea(Beans\ProductCategory $product_category, Beans\Area $area) {
			$this->dbhandler->query('UPDATE '.$this->tablename.' SET area_id = :newareaid WHERE id = :id');
			$this->dbhandler->bind(':id',$product_category->getId());
			$this->dbhandler->bind(':newareaid',$area->getId());
			$this->dbhandler->execute();
			return $this->dbhandler->errorExists();
		}

		public function getProductCategoriesOfArea(Beans\Area $area) {
			$this->dbhandler->query('SELECT * FROM '.$this->tablename.' WHERE area_id = :areaid');
			$this->dbhandler->bind(':areaid',$area->getId());
			$rows = $this->dbhandler->getResultSet();
			return array_map(array($this,'arrayToProductCategory'),$rows);
		}

	}
?>