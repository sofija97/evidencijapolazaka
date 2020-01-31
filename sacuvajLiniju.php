<?php
include "init.php";

$brojLinije = $_POST['broj'];
$od = $_POST['od'];
$do = $_POST['doLinija'];
$tip = $_POST['tip'];

$uspesno = $db->sacuvajLiniju($brojLinije,$od,$do,$tip);

if($uspesno){
    echo sprintf("Uspesno ste unesli liniju broj %s koja ide od %s do %s ",$brojLinije,$od,$do);
}else{
    echo "doslo je do greske";
}