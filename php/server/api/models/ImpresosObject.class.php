<?php namespace Models\Beans;
	/* Impresos Object describes the common structure of api objects*/
	abstract class ImpresosObject {
		private $id;
		private $name;
		private $description = '';
		private $img;

		public function __construct($name = '',$description = '',$img = ''){
			$this->name = $name;
			$this->description = $description;
			$this->img = $img;
		}

		public function loadProperties($array) {
			if (array_key_exists('id',$array)){
				$this->id = $array['id'];
			}

			if (array_key_exists('name',$array)) { 
				$this->setName($array['name']);
			}

			if (array_key_exists('description',$array)) { 
				$this->setDescription($array['description']);
			}

			if (array_key_exists('img',$array)) { 
				$this->setImage($array['img']);
			}
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			return $this->name;
		}

		public function getDescription() {
			return $this->description;
		}

		public function getImage() {
			return $this->img;
		}

		public function setName($name) {
			$this->name=$name;
		}

		public function setDescription($description){
			$this->description = $description;
		}

		public function setImage($image) {
			$this->img = $image;
		}

		public function asArray() {
			return [
				'id' => $this->id,
				'name' => $this->name,
				'description' => $this->description,
				'img' => $this->img
			];
		}
   }
?>