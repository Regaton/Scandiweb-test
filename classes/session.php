<?php
namespace Classes;

class Session {
  private $_token;

  public function __construct() // Creating session
  {
  	session_start();
  }
  public function CreateToken() // Creating Token
  {
  	$_token = uniqid(rand());
  	$_token = md5($_token.session_name());
  	$_SESSION['token'] = $_token;	
  }

  public function Token() // defence from CSRF
  {
    if (empty($_SESSION['token'])) { 
      $this->CreateToken();
    }
    else {
      $_token = $_SESSION['token'];
      return $_token;
    }
  }
}