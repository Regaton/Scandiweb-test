<?php

namespace ReloadCategory;

require_once 'dbdriver.php';
use dbdriver\DBDriver;

	abstract class TItem extends DBDriver // abstract Class Item
	{
		private $code;
		private $name;
		private $price;
		private $date;
		private $type;

		abstract public function makeCategory(); 
		abstract protected function GetAllData(); 

		public function __construct() // Connection to DB
		{ 
			parent::__construct();
		}
		public function __set ($property, $value) // Setter
		{
			if (property_exists($this, $property)) {
				$this->$property = trim(htmlspecialchars($value));
			}
		}
		public function __get($property) // Getter
		{
	    	    if (property_exists($this, $property)) {
                       return $this->$property;
                   }
		    else {
                        throw new Exception('Undefined property ' . $property . ' referenced.');
                    }
		}
		public function DeleteField(array $ItemID) // Prepare query to delete Items with id in params
		{
			foreach ($ItemID as $key => $value) {
				$where['id'] = $value;
				$this->delete('items',$where);
			}
		}
		protected function AddField(array $params = []) // Prepare query to add data to DB
		{    
                   $params['code'] = $this->code;
                   $params['name'] = $this->name;
                   $params['price'] = $this->price;
                   $params['date'] = $this->date;
                   $params['type'] = $this->type;
                   $this->insert('items',$params);
		}

		public function getCategory(array $data) // Adding data (with executive class)
		{
		 	$category = $this->makeCategory();
		 	$category->AddData($data);
		 	$category->AddField();
		}
		public function DeleteData(array $ItemID) // Deleting data(with executive class)
		{
			$category = $this->makeCategory();
			$category->DeleteField($ItemID);
		}		
		public function AddData(array $itemData) // Add data to object 
		{
		        $this->type = $itemData['type'];
			$this->name = $itemData['name'];
			$this->code = $itemData['code'];
			$this->price = $itemData['price'];
			$this->date = $itemData['date'];
		}
	}
