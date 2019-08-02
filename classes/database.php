<?php
namespace database; 

class DatabaseConnect // Database connecting class
{
	private static $instance; // Show PDO object;

	public static function getConnect()  // check state of connection to DB and connect
	{ 
		if (self::$instance === null) { 
			self::$instance = self::connectPDO(); 
		} 
		return self::$instance; // Return PDO object
	} 

	public static function connectPDO() // Connect to DB
	{
		return new \PDO("mysql:dbname=scandiweb_project;host=localhost;","root",""); 
	}
}