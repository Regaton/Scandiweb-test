<?php
namespace Categories; // Namespace includes classes of item types
require_once 'classes/item.php';


use ReloadCategory\TItem;
use StartCategories\VolumeCategory;

    class Volume extends TItem // Volume Class with properties width, height, lenght;
    {
        private $width;
        private $height;
        private $length;

        public function GetAllData() // Create SQL query for getting all data of this type from DB
         {
            $sql = "SELECT id, code, name, price, date, type, width, height, length
                    FROM items
                    WHERE type = 'Volume' ";
            return  $this->select($sql);
        }
        public function AddField(array $params = []) // Add Volume type Item to DB
         {
            $params['width'] = $this->width;
            $params['height'] = $this->height;
            $params['length'] = $this->length;
            parent::AddField($params);
        }
        public function Printing() // Prepare data for Printing 
        {
            $query = $this->GetAllData();

           $arr = [];
           foreach ($query as $key => $value) {
                 if ($value != null) {
                    $arr[$key] = $value;  
                    $arr[$key]['params'] = sprintf('%sx%sx%s',$arr[$key]['width'],$arr[$key]['height'],$arr[$key]['length']);
                    $arr[$key]['checkbox'] = 'volume[]';
                }
            }
            return $arr;
        }
        public function AddData(array $itemData) // Set data from form to object
        {
          $this->width = $itemData['width'];
          $this->height = $itemData['height'];
          $this->length = $itemData['length'];
          parent::AddData($itemData);
        }
        public function makeCategory()  // Create executive class
        {
          return new VolumeCategory();
        }
    }