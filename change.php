<?php 
  require_once 'init.php'; 

  if (isset($_POST['action'])) { 
    switch ($_POST['action']) {
      case 'Insert': 
        header("Location: add.php");
        break;
      case 'Delete': 
          if (isset($_POST['virtual'])) $Virtual->DeleteData($_POST['virtual']); // Delete Checked Virtual Items 
          if (isset($_POST['weighted'])) $Weighted->DeleteData($_POST['weighted']); // Delete Checked Weighted Items 
          if (isset($_POST['volume'])) $Volume->DeleteData($_POST['volume']); // Delete Checked Volume Items 
          header("Location: index.php");
        break;
    }
  } 
  else header("Location: index.php");