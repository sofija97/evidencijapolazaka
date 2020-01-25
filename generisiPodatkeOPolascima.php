<?php
include "init.php";

$polasci = $db->vratiPolaskeZaLiniju($_GET['linijaID']);

$nizPodataka = [];

foreach ($polasci as $polazak){
    if(isset($nizPodataka[$polazak->sat])){
        $nizPodataka[$polazak->sat]['minuti'][] = $polazak->minut;
    }else{
        $nizPodataka[$polazak->sat] = [
          'minuti' => [$polazak->minut],
          'linija' => $polazak->brojLinije . " : (" . $polazak->od . " - " . $polazak->do . ")"
        ];
    }
}
?>

<table class="table table-responsive" >
    <thead>
    <tr>
        <th>Linija</th>
        <th>Sat</th>
        <th>Minuti</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($nizPodataka as $sat => $item){
        ?>
        <tr>
            <td><?= $item['linija']; ?></td>
            <td><?= $sat; ?></td>
            <td><?= implode(' ',$item['minuti']); ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
