<?php

 	require_once 'database.php';

	abstract class TItem extends { 
		private $id;
		private $code;
		private $name;
		private $price;
		private $type;
		private $date;


		public function __construct() { 
			parent::__construct();
		}

		public function __set($property, $value) { 
			if(property_exists($this,$property)) {
				$this->$property = trim(htmlspecialchars($value));

				$addProperty = $db->prepare("
					INSERT INTO items (:property)
					VALUES (:value)
					");

				$addProperty->execute([
					"property" => $property,
					"value" => $value
				]);
			}
		}

		public function __get($itemID){ 
			$data = $this->db->prepare("
				SELECT id, code, name, price, type, weight, size, date
				FROM items
				WHERE id=:id
			");
			$data->execute([
				'id' => $itemID
			]);
			$data = $data->rowcount()? $data : [];
			return $data;
		}


		public function DeleteElement($itemID){ // Delete field from DataBase by received ID
			$data = $this->db->prepare("
				DELETE 
				FROM items
				WHERE id = :itemID
			");

			$data->execute([
				'itemID' => $itemID
			]);
		}

	}










?>