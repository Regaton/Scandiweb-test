<?php
namespace Categories; // Namespace includes classes of item types
require_once 'classes/item.php';

use ReloadCategory\TItem;
use StartCategories\WeightedCategory;

    class Weighted extends TItem // Virtual Class with property size
    {
        private $weight;

        public function GetAllData()  // Create SQL query for getting all data of this type from DB
        {
            $sql = "SELECT id, code, name, price, date, type, weight
                    FROM items
                    WHERE type = 'Weighted'  ";

            return $this->select($sql);

        }
        public function AddField(array $params = [])  // Add Weighted type Item to DB
        {
            $params['weight'] = $this->weight;
            parent::AddField($params);
        }
        public function Printing() // Prepare data for Printing 
        {
            $query = $this->GetAllData();

           $arr = [];
           foreach ($query as $key => $value) {
                 if ($value != null) {
                    $arr[$key] = $value;  
                    $arr[$key]['params'] = sprintf('Weight: %s KG', $arr[$key]['weight']);
                    $arr[$key]['checkbox'] = 'weighted[]';
                }
            }
            return $arr;
        }
        public function AddData(array $itemData) // Set data from form to object
        {
          $this->weight = $itemData['weight'];
          parent::AddData($itemData);
        }
        public function makeCategory()
        {
            return new WeightedCategory();
        }
    }