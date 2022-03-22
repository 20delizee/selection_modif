<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['supp'])){
    $q = $bdd->query("DELETE  FROM grille " );
}
?>       
<!DOCTYPE htlm>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
        <div class="inscription">
			<div class="monge">

        <div>Que voulez vous faire?</div>
        <br>
        <div><a href="classement_secretaire.php"> <input type="submit" value="voir classement"/> </a></div>
        <div>
		<button><a href="export_csv.php">exporter le classement</a></button></div>
		
		<div>
		<button><a href="export_csv2.php">exporter l'archive</a></button></div>
		<div>
		<form type="submit" action="secretaire.php" method="post">			
			<button name="supp" class="menuG" submit>supprimer le classement </button>
		</form>
		</div>
        </div>

	</body>

</html>