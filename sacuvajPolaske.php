<?php
include "init.php";
/** @var Korisnik $korisnik */
$korisnik = $_SESSION['korisnik'];

$korisnikID = $korisnik->getKorisnikID();

$linija = $_POST['linija'];
$sat = $_POST['sat'];
$minuti = $_POST['minuti'];

$nizMinuta = explode(" ",$minuti);

foreach ($nizMinuta as $minut){
    $minuIntVal = (int)$minut;
    if($minuIntVal > 59 || $minuIntVal < 0){
        continue;
    }
    $db->sacuvajPolazak($linija,$sat,$minut,$korisnikID);
}
echo "Izvrsen je unos polazaka";