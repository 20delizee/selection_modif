        <?php
           
           try
           {
               $bdd = new PDO('mysql:host=;dbname=selection;charset=utf8', 'root', 'root');
           }
           catch (Exception $e)
           {
               die('Erreur : ' . $e->getMessage());
           }
        
           $req = $bdd->prepare('INSERT INTO grille(numcand, point_bac, point_travail_serieux, point_absence, point_attitude, point_etude_superieure, point_avis_PP, point_avis_proviseur, point_lettre_motivation, remarque, point_remarque, statut_dossier, total_point) 
           VALUES(:numcand, :point_bac, :point_travail_serieux, :point_absence, :point_attitude, :point_etude_superieure, :point_avis_PP, :point_avis_proviseur, :point_lettre_motivation, :remarque, :point_remarque, :statut_dossier, :total_point)');
           $req->execute([
               'numcand' => $_POST['numero'],
               'point_bac' => $_POST['serie'],
               'point_travail_serieux' => $_POST['case'],
               'point_absence' => $_POST['abs'],
               'point_attitude' => $_POST['attitude'],
               'point_etude_superieure' => $_POST['etude'],
               'point_avis_PP' => $_POST['pp'],
               'point_avis_proviseur' => $_POST['avis'],
               'point_lettre_motivation' => $_POST['lettre'],
               'remarque' => $_POST['texte'],
               'point_remarque' => $_POST['rem'],
               'statut_dossier' => $_POST['dos'],
               'total_point' => $_POST['note'],
           
           ]);
            

           ?>
<!DOCTYPE htlm>
<html lang="fr">
	<head>


		<meta charset="UTF-8">


​		

		<title>classement</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
        <table>


<?php
     
    include_once("footer.html");
?>