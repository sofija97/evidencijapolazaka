<?php
include "init.php";

if(isset($_POST['login'])){
    $ime = $_POST['ime'];
    $sifra = $_POST['sifra'];
    $korisnik = $db->login($ime,$sifra);

    if($korisnik){
        $_SESSION['korisnik'] = $korisnik;
        header("Location: polasci.php");
    }else{
        header("Location: index.php?poruka=Greska pri logovanju na sistem");
    }
}