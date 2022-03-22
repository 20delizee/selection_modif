<?php
           
           try
           {
               $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
           }
           catch (Exception $e)
           {
               die('Erreur : ' .$e->getMessage());
           }
        
		   $numcand = $_POST['numcand'];
		   $point_bac = $_POST['point_bac'];
		   $point_travail_serieux = $_POST['point_travail_serieux'];
		   $point_absence = $_POST['point_absence'];
		   $point_attitude = $_POST['point_attitude'];
		   $point_etude_superieure = $_POST['point_etude_superieure'];
		   $point_avis_PP = $_POST['point_avis_PP'];
		   $point_avis_proviseur = $_POST['point_avis_proviseur'];
		   $point_lettre_motivation = $_POST['point_lettre_motivation'];
		   $remarque = $_POST['remarque'];
		   $point_remarque = $_POST['point_remarque'];
		   $statut_dossier = $_POST['statut_dossier'];
		   $total_point = $_POST['total_point'];
		   $annee = $_POST['annee'];

           $req = $bdd->prepare('INSERT INTO grille(numcand, point_bac, point_travail_serieux, point_absence, point_attitude, point_etude_superieure, point_avis_PP, point_avis_proviseur, point_lettre_motivation, remarque, point_remarque, statut_dossier, total_point, annee) 
           VALUES(:numcand, :point_bac, :point_travail_serieux, :point_absence, :point_attitude, :point_etude_superieure, :point_avis_PP, :point_avis_proviseur, :point_lettre_motivation, :remarque, :point_remarque, :statut_dossier, :total_point, :annee)');
		        $req->execute(array(
               'numcand' => $numcand,
               'point_bac' => $point_bac,
               'point_travail_serieux' => $point_travail_serieux,
               'point_absence' => $point_absence,
               'point_attitude' => $point_attitude,
               'point_etude_superieure' => $point_etude_superieure,
               'point_avis_PP' => $point_avis_PP,
               'point_avis_proviseur' => $point_avis_proviseur,
               'point_lettre_motivation' => $point_lettre_motivation,
               'remarque' => $remarque,
               'point_remarque' => $point_remarque,
               'statut_dossier' => $statut_dossier,
               'total_point' => $total_point,
			   'annee' => $annee,

           
		   ));
            

           ?>
<!DOCTYPE html>
<html lang="fr">
	<head>	
		<meta charset="UTF-8" />
	
		<a href="prof.php">Retour accueil RPOF</a>

		

		<title>Sélection dossiers parcoursup BTS SIO- rentrée-2021</title>
		
		<link rel="stylesheet" type="text/css" media="screen" href="style.css">
		
	</head>
	<body>
	<section class="formulaire">
		<form action="#" method="POST">
		 

		<div class="inscription">
		<div class="monge">

		<div><h1> Selection BTS SIO </h1></div>
		<br> 
		<div> <h3> Lycée Gaspard Monge -08000- Charleville-Meziere </h3> </div>
			<br>		
		<div>
			<p><label for="numcand">numero:<input type="text" name="numcand" /></label></p>			
		</div>
			<br>
		<div>
			
			<p><label for="nom">nom:<input type="text" name="nom" /></label></p>
		</div>	
			<br>
		<div>	
			<p><label for="prenom">prenom:<input type="text" name="prenom"/></label></p>		
		</div>			
			<br>
		<div>
			<label for="point_bac">serie: 
			    <select name="point_bac" id="serie">
			       	<option value="0"></option>
			        <option value="12">ES/S (12)</option>
			        <option value="10">STMG (10)</option>
			        <option value="8">PRO (8)</option>
			        <option value="9">L (9)</option>
			        <option value="5">Autres (5)</option>     	
				</select>
			</label>
		</div>
				<br>
		<div>
			<label for="point_travail_serieux">		
				Travail sérieux:
			
				<input type="radio" name="point_travail_serieux" value="1" /> Oui (+1)
		
				<input type="radio" name="point_travail_serieux" value="-1" /> Non (-1)
	
			</label>	
		</div>
		
			<br>

			
		<div>

			<label for="point_absence">	
				Absence:
				<input type="radio" name="point_absence" value="-2" /> Oui (-2 ou dossier refusé)
		
				<input type="radio" name="point_absence" value="0" /> Non (+0)
			
				
			</label>
		</div>			
			<br>
		<div>
				
			<label for="point_attitude">		
				Attitude/Comportement:
				<input type="radio" name="point_attitude" value="0" /> oui (dossier refusé) 
		
				<input type="radio" name="point_attitude"  value="1"/> Non (+1)
			</label>


		</div>
			
			<br>
		<div>
			<label for="point_etude_superieure">
				etude supérieur:
					<input type="radio" name="point_etude_superieure" value="1"  /> Oui (+1)

					<input type="radio" name="point_etude_superieure" value="0" /> Non (+0)
		
			</label>
				
		</div>
			<br>


		<div>

			<label for="point_avis_PP">		
				Avis PP:
				<input type="radio" name="point_avis_PP" value="2" /> B (+2)
		
				<input type="radio" name="point_avis_PP" value="1" /> AB (+1)
			
				<input type="radio" name="point_avis_PP" value="0" /> insuf. (+0)

				<input type="radio" name="point_avis_PP" value="-2" /> Négatif (-2)
			</label>


		</div>
			
			<br>


		<div>

			<label for="point_avis_proviseur">		
				Avis Proviseur:
					<input type="radio" name="point_avis_proviseur" value="2" /> B (+2)
		
					<input type="radio" name="point_avis_proviseur" value="1" /> AB (+1)
			
					<input type="radio" name="point_avis_proviseur" value="0"/> insuf. (+0)

					<input type="radio" name="point_avis_proviseur" value="-2" /> Négatif (-2)
			</label>
				
		</div>
			<br>


		<div>
				
			<label for="point_lettre_motivation">	
				Lettre de motivation:
				<input type="radio" name="point_lettre_motivation" value="2"/>  B(+2)
		
				<input type="radio" name="point_lettre_motivation"  value="1"/> AB (+1)
			
				<input type="radio" name="point_lettre_motivation"  value="0" /> insuf. (+0)

				<input type="radio" name="point_lettre_motivation"  value="-2" /> Négatif (-2)
			</label>
		</div>
			<br>
		<div>
			<label for="remarque">remarque:<br/>
			<textarea name="remarque" rows = 10 cols="65"></textarea></label>	
		</div>
		<br>

		<div>

			<label for="point_remarque">		
				point remarque:

				<input type="radio" name="point_remarque" value="1" /> Oui (+1)

				<input type="radio" name="point_remarque" value="0" /> Non (0)

			</label>	
		</div>
		<div>
			<label for="statut_dossier">		
			statut dossier:
			
				<input type="radio" name="statut_dossier" value="1" /> dossier accepte
		
				<input type="radio" name="statut_dossier" value="0" />dossier refuse
	
			</label>	
		</div>
		<div>
		<p><label for="annee">numero:<input type="date" name="annee" /></label></p>			
		</div>
		<div>
			note sur 20:
			<br>
			<label for="total_point"><input type="text" name="total_point" /></label>	
		</div>
		<div>
			<input type="submit" value="envoyer">
		</div>
		
		</form>
	</section>
	</body>
</html>
