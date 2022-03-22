<?php
           
        
           try
           {
               $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
           }
           catch (Exception $e)
           {
               die('Erreur : ' .$e->getMessage());
           }
        ?>

<br>




      
<!DOCTYPE htlm>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>classement</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
    <a href="secretaire.php">Retour accueil secretaire</a>

    <br/>
    <br/>
        <table>

        
             <tr>   
                <td>Numéro de candidat</td>
                <td>serie</td>
                <td>travail serieux</td>
                <td>absence</td>
                <td>Attitude</td>
                <td>etude superieur</td>
                <td>avis professeur principal</td>
                <td>avis proviseur</td>
                <td>lettre de motivation</td>
                <td>remarque</td>
                <td>point remarque</td>
                <td>statut dossier</td>
                <td>total point </td>
                <td>Année </td>

            </tr>
            <?php
            $q = $bdd->query('SELECT * FROM grille');
            while ($data = $q->fetch()){

            ?>
            <tr>
                <td><?php echo $data['numcand']; ?></td>
                <td><?php echo $data['point_bac'];?></td>
                <td><?php echo $data['point_travail_serieux'];?></td>
                <td><?php echo $data['point_absence'];?></td>
                <td><?php echo $data['point_attitude'];?></td>
                <td><?php echo $data['point_etude_superieure'];?></td>
                <td><?php echo $data['point_avis_PP'];?></td>
                <td><?php echo $data['point_avis_proviseur'];?></td>
                <td><?php echo $data['point_lettre_motivation'];?></td>
                <td><?php echo $data['remarque'];?></td>
                <td><?php echo $data['point_remarque'];?></td>
                <td><?php echo $data['statut_dossier'];?></td>
                <td><?php echo $data['total_point'];?></td>
                <td><?php echo $data['date'];?></td>

            </tr>
            <?php
            }
            ?>
        </table>
<?php
        
    include_once("footer.html");
?>