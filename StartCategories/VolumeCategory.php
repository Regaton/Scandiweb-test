<?php
namespace StartCategories;

require_once 'StartCategories/AddRunnable.php';
require_once 'Categories/Volume.php';

use StartCategories\AddRunnable;
use Categories\Volume;


class VolumeCategory extends Volume implements AddRunnable // Executive class of Volume (created for valid architecture and dynamic defining of the class)
{ 
  public function AddData(array $data) // Adding Data to object
  {
    parent::AddData($data);
  }
  public function AddField(array $params = []) // Adding data from object to DB
  {
    parent::AddField();
  }
  public function DeleteField(array $ItemID) // Deleting data
  {
  	parent::DeleteField($ItemID);
  }
}