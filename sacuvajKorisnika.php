<?php
include "init.php";

$imePrezime = $_POST['imePrezime'];
$username = $_POST['username'];
$password = $_POST['password'];

$uspesno = $db->sacuvajKorisnika($imePrezime,$username,$password);

if($uspesno){
    echo sprintf("Uspesno ste sacuvali korisnika %s ",$imePrezime);
}else{
    echo "doslo je do greske";
}