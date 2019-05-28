<?php
require 'flight/Flight.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

function userExists($username){
  $conn = Flight::db();

  //prepared statements for added security
  $sql = "SELECT * FROM users WHERE username = '$username'";

  //execute the query
  $sth = $conn->query($sql);
  $rows = $sth->fetch(PDO::FETCH_ASSOC);
  
  //if a row is returned...user already exists
  if($rows > 0){
      return true;
  }else{
      return false;
  }
}

function emailExists($email){
  $conn = Flight::db();

  //prepared statements for added security
  $sql = "SELECT * FROM users WHERE email = '$email'";

  //execute the query
  $sth = $conn->query($sql);
  $rows = $sth->fetch(PDO::FETCH_ASSOC);
  
  //If true, user already exists
  if($rows > 0){
      return true;
  }else{
      return false;
  }
}

//Register database connection
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=sssd','root',''),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

Flight::route('POST /register', function() {
  
    $conn = Flight::db();

      $name = Flight::request()->data->name;
      $username = Flight::request()->data->username;
      $email = Flight::request()->data->email;
      $phone = Flight::request()->data->phone;
      $pass = Flight::request()->data->pass;
      $rpass = Flight::request()->data->rpass;
      $msg = array();
      $passHash = password_hash($pass, PASSWORD_DEFAULT);
      $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

      //Validations
      if (!preg_match("/^[0-9a-zA-Z ]*$/",$username)) {
        $msg['status'] = "usernameErr";
      } elseif(userExists($username)){
        $msg['status'] = "usernameExists";
      } elseif(emailExists($email)){
        $msg['status'] = "emailExists";
      } elseif (empty($name) || empty($username)|| empty($email) || empty($phone) || empty($pass) || empty($rpass)){
        $msg['status'] = 'empty';
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg['status'] = 'invalidEmail';  
      } elseif(strlen($pass) < 6 || !preg_match("#[0-9]+#",$pass) || !preg_match("#[A-Z]+#", $pass) || !preg_match($pattern, $pass)){
        $msg['status'] = 'passwordErr';
      }  elseif($pass != $rpass){
        $msg['status'] = 'notSame';
      } else {
        //Register user
        $sql = "INSERT INTO users (name, username, email, phone_number, password)
        VALUES ('$name', '$username', '$email', '$phone', '$passHash')";
        $sth = $conn->query($sql);
      }

      //Send json to ajax
      echo json_encode($msg);
});

Flight::start();
