<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

    ?>
<?php

header("content-type:application/csv;charset=UTF-8");

header("Content-Disposition: attachment;Filename=archive.csv");
header("Pragma: no-cache");
header("Expires: 0");

$q = $bdd->query('SELECT  numcand, point_bac, point_travail_serieux, point_absence, point_attitude, point_etude_superieure, point_avis_PP, point_avis_proviseur, point_lettre_motivation, remarque, point_remarque, statut_dossier, total_point FROM grille ');
$handle = fopen('./download/classement.csv', 'c+');$text=utf8_encode("�a�!"); 

fputcsv($handle, array( 'numcand', 'point_bac', 'point_travail_serieux', 'point_absence', 'point_attitude', 'point_etude_superieure', 'point_avis_PP', 'point_avis_proviseur', 'point_lettre_motivation', 'remarque', 'point_remarque', 'statut_dossier', 'total_point'), ';' ); 

    echo " numcand".";" ; 
    ?>
    <?php
    echo "point_bac".";" 
    ?>
    <?php
    echo"point_travail_serieux".";" ; 
    ?>
    <?php
    echo"point_absence".";" ; 
    ?>
    <?php
    echo"point_attitude".";" ;
    ?>
    <?php
    echo"point_etude_superieure".";" ; 
    ?>
    <?php
    echo"point_avis_PP".";" ; 
    ?>
    <?php
    echo"point_avis_proviseur".";" ; 
    ?>
    <?php
    echo"point_lettre_motivation".";" ; 
    ?>
    <?php
    echo"remarque".";" ; 
    ?>
    <?php
    echo"point_remarque".";" ; 
    ?>
    <?php
    echo"statut_dossier".";" ;
    ?>
    <?php
    echo "total_point".";" ;
    
echo"\n";
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = mb_convert_encoding('ISO-8859-1', 'UTF-8');

while($row = $q->fetch()) {
    fputcsv($handle, $row, ';');
    if($row['total_point'] > 9){
    echo $row['numcand'].";" ;
    ?>
    <?php
    echo $row['point_bac'].";" ;

    ?>
    <?php
    echo $row['point_travail_serieux'].";" ;

    ?>
    <?php
    echo $row['point_absence'].";" ;

    ?>
    <?php
    echo $row['point_attitude'].";" ;

    ?>
    <?php
    echo $row['point_etude_superieure'].";" ;
    ?>
    <?php
    echo $row['point_avis_PP'].";" ;
    ?>
    <?php
    echo $row['point_avis_proviseur'].";" ;
    ?>
    <?php
    echo $row['point_lettre_motivation'].";" ;
    ?>
    <?php
    echo $row['remarque'].";" ;
    ?>
    <?php
    echo $row['point_remarque'].";" ;
    ?>
    <?php
    echo $row['statut_dossier'].";" ;
    ?>
    <?php
    echo $row['total_point'].";" ;
    ?>
    <?php
    
   
    echo"\n";    
    }else{

    }
}

$q->closeCursor();
fclose($handle);
