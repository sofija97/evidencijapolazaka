<?php
require 'flight/Flight.php';
include '../init.php';

Flight::register('db',$db);

Flight::route('GET /linije', function(){
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    echo json_encode($db->vratiLinije());
});

Flight::route('GET /tipovi', function(){
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    echo json_encode($db->vratiTipove());
});

Flight::start();
