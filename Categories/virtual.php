<?php
namespace Categories; // Namespace includes classes of item types
require_once 'classes/item.php'; 

use ReloadCategory\TItem;
use StartCategories\VirtualCategory;

	class Virtual extends TItem // Virtual Class with property size
    {
        private $size;

        public function GetAllData()  // Create SQL query for getting all data of this type from DB
        {

            $sql = "SELECT id, code, name, price, date, type, size
                    FROM items
                    WHERE type = 'Virtual' ";
            return  $this->select($sql);
        }
        public function AddField(array $params = []) // Add Virtual type Item to DB
        {      
            $params['size'] = $this->size;
            parent::AddField($params);
        }
        public function Printing() // Prepare data for Printing 
        {
            $query = $this->GetAllData();

           $arr = [];
           foreach ($query as $key => $value) {
                 if ($value != null) {
                    $arr[$key] = $value;  
                    $arr[$key]['params'] = sprintf('Size: %s MB', $arr[$key]['size']);
                    $arr[$key]['checkbox'] = 'virtual[]';
                }
            }
            return $arr;
        }
        public function AddData(array $itemData) // Set data from form to object
        {
          $this->size = $itemData['size'];
          parent::AddData($itemData);
        }
        public function makeCategory() // Create executive class
        {
            return new VirtualCategory();
        }

    }




















