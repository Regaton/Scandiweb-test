<?php
	session_start(); 


	//8$db = new PDO('mysql:dbname=scandiweb_project;host=localhost;','root');

	class Database {
 		public $dbname = "scandiweb_project";
 		public $host = "localhost";
 		public $user = "root";
 		public $password = "";
 		public $db;
 		public $_token; 


 		public function __construct(){
 			$this->db = new PDO("mysql:dbname=$this->dbname;host=$this->host;",$this->user,$this->password); // Connect to DataBase

			if (empty($_SESSION['token'])) { // Defence from CSFR
				$_token = uniqid(rand());
				$_token = md5($_token.session_name());
				$_SESSION['token'] = $_token;
			}
			else {
			    $_token = $_SESSION['token'];  
			}

 		}

		public function GetAllData() { // Get all data from Database
			$data = $this->db->prepare("
				SELECT id, code, name, price, type, weight, size, width, length, height, date 
				FROM items
			");
			$data->execute();
			$data = $data->rowcount()? $data : []; // if DataBase is empty, return empty array;
			return $data;
		}
	}
?>