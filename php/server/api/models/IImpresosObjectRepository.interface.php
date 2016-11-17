<?php namespace Models\Repositories;
	require_once 'ImpresosObject.class.php';
	use \Models\Beans as Beans;	

	interface IImpresosObjectRepository { 
		public function getInstance(String $name);
		public function getAll();
		public function save(Beans\ImpresosObject $obj);
		public function updateName(Beans\ImpresosObject $obj,$newname);
		public function updateDescription(Beans\ImpresosObject $obj,$newdescription);
		public function updateImage(Beans\ImpresosObject $obj,$img_url);
		public function update(Beans\ImpresosObject $obj,$newname,$newdescription,$img_url);
	}
?>