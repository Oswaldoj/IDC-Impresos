<?php namespace Database;

	// TODO: read values from private configuration file
	// Define DB configuration
	define("DB_HOST", "127.0.0.1");
	define("DB_USER", "idcconsultores");
	define("DB_PASS", "consultores");
	define("DB_NAME", "impresos");

	class DatabaseConfiguration {

		private $DB_HOST;
		private $DB_USER;
		private $DB_PASS;
		private $DB_NAME;

		public function __construct() {
			$this->DB_HOST = DB_HOST;
			$this->DB_USER = DB_USER;
			$this->DB_PASS = DB_PASS;
			$this->DB_NAME = DB_NAME;
		}

		public function getHost(){
			return $this->DB_HOST;
		}

		public function getUser(){
			return $this->DB_USER;
		}

		public function getDBPassword(){
			return $this->DB_PASS;
		}

		public function getDBName(){
			return $this->DB_NAME;
		}

	}

?>