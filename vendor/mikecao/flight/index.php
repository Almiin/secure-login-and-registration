<?php
require 'flight/Flight.php';
<<<<<<< HEAD
<<<<<<< HEAD

error_reporting(E_ALL);
ini_set('display_errors', 1);


Flight::route('GET /', function() {
  echo "";
});
=======
use OTPHP\TOTP;
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
use OTPHP\TOTP;
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e

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
<<<<<<< HEAD
<<<<<<< HEAD
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=sssd','root',''),
=======
Flight::register('db', 'PDO', array('mysql:host=ibu-db-server.adnan.dev;dbname=db_almin_p','almin-p','YKX9r7kr'),
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
Flight::register('db', 'PDO', array('mysql:host=ibu-db-server.adnan.dev;dbname=db_almin_p','almin-p','YKX9r7kr'),
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
Flight::route('POST /googleAuth', function(){
  session_start();
  $code = Flight::request()->data->code;
  $msg = array();
  $otp = $_SESSION['otp'];
  if(strlen($code) < 6 || strlen($code) > 6) {
    $msg['status'] = "codeLength";
  } else {
    if(!($otp == $code)){
      $msg['status'] = 'notMatch';
    } else {
      $msg['status'] = 'match';
    }
  }
  
  echo json_encode($msg);
});

Flight::route('POST /forgotPassword', function(){
  $email = Flight::request()->data->email;
  $msg = array();

  if(empty($email)){
    $msg['status'] = 'emptyEmail';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg['status'] = 'invalidEmail';  
  } else if(!emailExists($email)){
    $msg['status'] = 'notExists';
  } else {
    header('Location: ../home.php');
    exit();
  }

  echo json_encode($msg);
});

Flight::route('POST /login', function(){
  session_start();

  $conn = Flight::db();
  $usernameOrEmail = Flight::request()->data->usernameOrEmail;
  $pass = Flight::request()->data->pass;
  $msg = array();

  if(empty($usernameOrEmail)){
    $msg['status'] = "emptyUser";
  } elseif(empty($pass)){
    $msg['status'] = "emptyPass";
  } else {
    $sql ="SELECT * FROM users WHERE username='$usernameOrEmail' OR email='$usernameOrEmail'";
    $sth = $conn->query($sql);
    $rows = $sth->fetch(PDO::FETCH_ASSOC);
    if($rows > 0) {
      if(password_verify($pass, $rows['password'])){
        $msg['status'] = "match";
        if(isset(Flight::request()->data['g-recaptcha-response']) && !empty (Flight::request()->data['g-recaptcha-response'])){
          include '../../../captcha.php';
          $_SESSION['luser'] = $rows['username'];
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
         } else {
          $msg['status'] = 'captcha';
        }
      } else {
        $msg['status'] = "notMatch";
      }
    } else {
      $msg['status'] = "notExists";
    }
  }

  echo json_encode($msg);

});

<<<<<<< HEAD
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
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
