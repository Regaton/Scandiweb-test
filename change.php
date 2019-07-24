<?php 
  require_once('classes/item.php'); 

  $item = new TItem();// Creating object with connection to DataBase

  if (isset($_POST['action'])) { // User pressed button APLY 
  	  $act = htmlspecialchars($_POST['action']);
  	  if ($act == "Insert") {  // if SELECT option = Insert -> go to add.php
  	  	header("Location: add.php");
  	  }
   	  elseif ($act == "Delete") { // if SELECT option = Delete -> delete items in array check_list (values - Items' id)
   	  	if (!empty($_POST['check_list'])) {
	   	  	foreach($_POST['check_list'] as $ItemID) {
	   	  		$item->deleteElement($ItemID);
	   	  	}
	     	}
        Header("Location: index.php");
  	  }
  } 




?>