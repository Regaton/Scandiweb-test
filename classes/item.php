<?php

 	require_once 'database.php';

	class TItem extends Database { // Item - 1 Field in DataBase
		private $id;
		private $code;
		private $name;
		private $price;
		private $type;
		private $date;
		private $weight = 0;
		private $size = 0;
		private $width = 0;
		private $height = 0;
		private $length = 0;


		public function __construct() { // Connect to Database
			parent::__construct();
		}

		public function AddDataToDB() { // Add Object to DataBase with SQL-injection defence
			$data = $this->db->prepare("
				INSERT INTO items (code, name, price, type, weight, size, width, height, length, date)
				VALUES (:code,:name,:price,:type,:weight,:size,:width,:height,:length, :date)
			");



			$data->execute([
				'code' => $this->code,
				'name' => $this->name,
				'price' => $this->price,
				'type' => $this->type,
				'weight' => $this->weight,
				'size' => $this->size,
				'width' => $this->width,
				'height' => $this->height,
				'date' => $this->date,
				'length' => $this->length
			]);
		}


		public function SetData($itemData) { // Set data to object with XXS-attack defence
			if (isset($itemData['id'])) {
				$this->id = trim(htmlspecialchars($itemData['id']));
			}
			if (isset($itemData['code'])) {
				$this->code = trim(htmlspecialchars($itemData['code']));
			}
			if (isset($itemData['name'])) {
				$this->name = trim(htmlspecialchars($itemData['name']));
			}
			if (isset($itemData['price'])) {
				$this->price = trim(htmlspecialchars($itemData['price']));
			}
			if (isset($itemData['type'])) {
				$this->type = trim(htmlspecialchars($itemData['type']));
			}
			if (isset($itemData['date'])) {
				$this->date = trim(htmlspecialchars($itemData['date']));
			}
			if (isset($itemData['weight'])) {
				$this->weight = trim(htmlspecialchars($itemData['weight']));
			}
			if (isset($itemData['size'])) {
				$this->size = trim(htmlspecialchars($itemData['size']));
			}
			if (isset($itemData['width'])) {
				$this->width = trim(htmlspecialchars($itemData['width']));
			}
			if (isset($itemData['height'])) {
				$this->height = trim(htmlspecialchars($itemData['height']));
			}
			if (isset($itemData['length'])) {
				$this->length = trim(htmlspecialchars($itemData['length']));
			}
		}


		public function GetData($itemID){ // Get field from DataBase by received ID
			$data = $this->db->prepare("
				SELECT id, code, name, price, type, weight, size, width, length, height, date
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