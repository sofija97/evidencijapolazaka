<?php
include "init.php";

$rez = $db->vratiPodatkeZaGrafik();

echo json_encode($rez);