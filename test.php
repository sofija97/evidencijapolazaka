<?php
include "init.php";

$db = new KomunikacijaSaBazom();

$korisnik = $db->login('sole','sole');

var_dump($korisnik);
