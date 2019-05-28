<?php

require './vendor/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=sssd','root',''),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

Flight::route('/', function() {
    $conn = Flight::db();
    $data = $conn->query("SELECT * FROM users");

    foreach($data as $row) {
            echo (json_encode($row));
    }
});


Flight::start();
