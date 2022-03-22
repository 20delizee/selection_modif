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
<?php

if(isset($_POST['modif_user'])){
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];
    $type_de_compte = $_POST['type_de_compte'];




    $req = $bdd->prepare("UPDATE utilisateur SET 
            identifiant = :identifiant, 
            mdp = :mdp, 
            type_de_compte = :type_de_compte
            WHERE id = :id");
            $req->execute(array(
                'id' => $_POST['id'],
                'identifiant' => $identifiant,
                'mdp' => $mdp,
                'type_de_compte' => $type_de_compte

            ));
            header('Location: ../admin.php');
            sleep(1);
};
?>
<?php
$id = $_GET['id'];
$q = $bdd->query('SELECT * FROM utilisateur  WHERE  id =' . $id . '');

while ($data = $q->fetch()){
?>
<h1>modification des utilisateur</h1>

<form  method="POST"  >
        <label>id :</label>
        <input name="id" class="form-control" type="number" value="<?php echo $_GET['id'] ?>" >
    
        <label>identifiant :</label>
        <input name="identifiant" class="form-control" type="text" value="<?php echo $data['identifiant'] ?>" >
   
        <label>mdp :</label>
        <input name="mdp" class="form-control" type="text" value="<?php echo $data['mdp'] ?>" >
        <label>type_de_compte :</label>
        <input name="type_de_compte" class="form-control" type="text" value="<?php echo $data['type_de_compte'] ?>" >
<?php
}
?>
    <input name="modif_user"  type="submit" value="modifier" />

</form>
