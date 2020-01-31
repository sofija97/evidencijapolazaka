<?php
include "init.php";

$id = $_POST['id'];

$uspesno = $db->obrisi($id);

if($uspesno){
    echo sprintf("Uspesno ste obrisali liniju sa id-em %s",$id);
}else{
    echo "doslo je do greske";
}