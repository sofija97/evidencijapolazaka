<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "logovi.log");

include "KomunikacijaSaBazom.php";
include "domenskeklase/KorisnickaRola.php";
include "domenskeklase/Korisnik.php";
include "domenskeklase/TipLinije.php";
include "domenskeklase/Linija.php";
include "sesija.php";

$db = new KomunikacijaSaBazom();

