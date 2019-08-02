<?php
 use Categories\Virtual;
 use Categories\Weighted;
 use Categories\Volume;
 use Classes\Session;


function __autoload ($classname) {
  require_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
}

 $Weighted = new Weighted();
 $Virtual = new Virtual();
 $Volume = new Volume(); 
 
 $session = new Session();