<?php namespace Models;
  class User {
  		protected $name = '';

  		public function __construct() {
  			$this->name = "Cesar";
  		}

  		public function getName(){
  			return $this->name;
  		}
   } 


   class APIKey {
	    public function __construct() {
  		}
   } 
?>