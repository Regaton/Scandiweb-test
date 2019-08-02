<?php

require_once 'init.php';

  if (!empty($_POST['code'])) {  
  	if ($_POST['_token'] == $_SESSION['token']) { // defence from CSRF

	    $_POST['date'] = date("Y-m-d H:i:s");

	   switch($_POST['type']) { // define type and add data to DB
	   	  case 'Virtual':
	   	  	$Virtual->getCategory($_POST);
	   	    break;
	   	  case 'Weighted':
	   	  	$Weighted->getCategory($_POST);
	   	    break;
	   	  case 'Volume':
			$Volume->getCategory($_POST);
	   	    break;
	   }
	}
  }

  header("Location: index.php"); 
