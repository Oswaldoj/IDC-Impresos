<?php namespace Models\Beans;
	class Area {
		private $id;
		private $name;
		private $description = '';
		private $image;

		public function __construct($name) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function getDescription() {
			return $this->description;
		}

		public function getImage() {
			return $this->image;
		}

		public function setName($name) {
			$this->name=$name;
		}

		public function setDescription($description){
			$this->description = $description;
		}
   }
?>