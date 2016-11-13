<?php namespace Models\Repositories;
	require_once 'Area.class.php';
	use \Models\Beans as Beans;	

	interface IAreaRepository { 
		public function getArea($name);
		public function getAllAreas();
		public function saveArea(Beans\Area $area);
		public function updateName(Beans\Area $area,$newname);
		public function updateDescription(Beans\Area $area,$newdescription);
		public function updateImage(Beans\Area $area,$img_url);
		public function update(Beans\Area $area,$newname,$newdescription,$img_url);
	}
?>