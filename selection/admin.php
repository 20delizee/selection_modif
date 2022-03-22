<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
if (isset($_POST['envoie'])){

			$mdp= $_POST['mdp'];
			$type_de_compte =$_POST['type_de_compte'];
			$identifiant = $_POST['identifiant'];


			$req = $bdd->prepare('INSERT INTO utilisateur( identifiant, mdp, type_de_compte) VALUES(:identifiant, :mdp, :type_de_compte)');
			$req->execute(array(
				'identifiant' => $identifiant,
				'mdp' => $mdp,
				'type_de_compte' => $type_de_compte
			));
		}
			?>

<?php
if (isset($_POST['deleteId'])){
    $q = $bdd->query('DELETE FROM utilisateur WHERE id = ' . $_POST['deleteId']);
}
if(isset($_GET['modif_adhesions'])){
    
    header('Location: modif_user.php/?id=' . $_GET['modif_adhesions'] .'');
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>admin</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
	<a href="index.php">Retour accueil </a>

		<div class="inscription">
			<div class="monge">
			<div>
			<form action="#" method="POST">
				<div>	
					<h1>Creation d'un nouveau compte</h1>
				<br>
				<label for="identifiant">identifiant:<input type="text" name="identifiant" /></label>
				<br>
				<label for="mdp">mot de passe:<input type="text" name="mdp" /></label>
				<br>
				<label for="type_de_compte">type de compte:
				    <select name="type_de_compte" id="type_de_compte">
				       	<option value="0"></option>
				        <option value="prof">prof</option>
				        <option value="secretaire">secretaire</option>
				        <option value="admin">admin</option>         	
					</select>
				</label>
		</div>
				
				</div>

				<div>
					<a href="creation.php"><input type="submit"  name="envoie" value="Creer le compte" /></a>
				</div>
			</form>
				<br>
				<div>
				<table>
        <tr>
			<td>id</td>
            <td>Date début</td>     
            <td>Nom Situation</td>         
            <td>Contexte</td>     

        </tr>
        <?php
        $q = $bdd->query('SELECT * FROM utilisateur');
        while ($data = $q->fetch()){
            
        
        ?>
        
        <tr>
		<td><?php echo $data['id']; ?></td> 

            <td><?php echo $data['identifiant']; ?></td> 
            <td><?php echo $data['mdp']; ?></td> 
            <td><?php echo $data['type_de_compte']; ?></td>
            <td>
            <form method="POST" action="admin.php" >
                <input type="hidden" name="deleteId" value="<?php echo  $data['id'];?>" />
                <input type="submit" value="Supprimer" />
            </form>
            </td>
            <td>
			<form method="GET">
                <input type="hidden" name="modif_adhesions" value="<?php echo $data['id'];?>" />
                <input type="submit" value="modifier" />
            </form>            
		</td>
        </tr>
        <?php
        }
        ?>
    </table> 
</div>
				

	</body>

</html>