<?php

session_start();

if(!isset($_SESSION['korisnik'])){
    $_SESSION['korisnik'] = null;
}