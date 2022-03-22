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

if(isset($_POST['modif_grille'])){
    
    $numcand= $_POST['numcand'];
    $point_bac= $_POST['point_bac'];
    $point_travail_serieux= $_POST['point_travail_serieux'];
    $point_absence= $_POST['point_absence'];
    $point_attitude= $_POST['point_attitude'];
    $point_etude_superieure= $_POST['point_etude_superieure'];
    $point_avis_PP= $_POST['point_avis_PP'];
    $point_avis_proviseur= $_POST['point_avis_proviseur'];
    $point_lettre_motivation= $_POST['point_lettre_motivation'];
    $remarque= $_POST['remarque'];
    $point_remarque= $_POST['point_remarque'];
    $statut_dossier= $_POST['statut_dossier'];
    $total_point= $_POST['total_point'];

    $req = $bdd->prepare("UPDATE grille SET 
            numcand = :numcand, 
            point_bac = :point_bac , 
            point_travail_serieux = :point_travail_serieux, 
            point_absence = :point_absence, 
            point_attitude = :point_attitude, 
            point_etude_superieure = :point_etude_superieure, 
            point_avis_PP = :point_avis_PP, 
            point_avis_proviseur =  :point_avis_proviseur, 
            point_lettre_motivation= :point_lettre_motivation, 
            remarque= :remarque, 
            point_remarque= :point_remarque, 
            statut_dossier= :statut_dossier, 
            total_point= :total_point
            WHERE id = :id");
            $req->execute(array(
                'id' => $_POST['id'],
                'numcand'=> $numcand, 
                'point_bac'=> $point_bac, 
                'point_travail_serieux'=> $point_travail_serieux, 
                'point_absence'=> $point_absence, 
                'point_attitude'=> $point_attitude, 
                'point_etude_superieure'=> $point_etude_superieure, 
                'point_avis_PP'=> $point_avis_PP, 
                'point_avis_proviseur'=> $point_avis_proviseur, 
                'point_lettre_motivation'=> $point_lettre_motivation, 
                'remarque'=> $remarque, 
                'point_remarque'=> $point_remarque, 
                'statut_dossier'=> $statut_dossier, 
                'total_point'=> $total_point

            ));
            header('Location: ../classement.php');
            sleep(1);
};
?>
<?php
$id = $_GET['id'];
$q = $bdd->query('SELECT * FROM grille  WHERE  id =' . $id . '');

while ($data = $q->fetch()){
?>
<h1>modification des utilisateur</h1>

<form  method="POST"  >
        <label>id :</label>
        <input name="id" class="form-control" type="number" value="<?php echo $_GET['id'] ?>" >
    <br/>

        <label>Numéro de candidat :</label>
        <input name="numcand" class="form-control" type="text" value="<?php echo $data['numcand'] ?>" >
        <br/>

        <label>serie :</label>
        <input name="point_bac" class="form-control" type="text" value="<?php echo $data['point_bac'] ?>" >
        <br/>

        <label>travail serieux :</label>
        <input name="point_travail_serieux" class="form-control" type="text" value="<?php echo $data['point_travail_serieux'] ?>" >
        <br/>

        <label>absence :</label>

        <input name="point_absence" class="form-control" type="text" value="<?php echo $data['point_absence'] ?>" >
        <br/>
        <label>Attitude :</label>

        <input name="point_attitude" class="form-control" type="text" value="<?php echo $data['point_attitude'] ?>" >
        <br/>
        <label>	etude superieur :</label>

        <input name="point_etude_superieure" class="form-control" type="text" value="<?php echo $data['point_etude_superieure'] ?>" >
        <br/>
        <label>avis professeur principal :</label>

        <input name="point_avis_PP" class="form-control" type="text" value="<?php echo $data['point_avis_PP'] ?>" >
        <br/>
        <label>avis proviseur :</label>

        <input name="point_avis_proviseur" class="form-control" type="text" value="<?php echo $data['point_avis_proviseur'] ?>" >
        <br/>
        <label>lettre de motivation :</label>

        <input name="point_lettre_motivation" class="form-control" type="text" value="<?php echo $data['point_lettre_motivation'] ?>" >
        <br/>
        <label>remarque :</label>

        <input name="remarque" class="form-control" type="text" value="<?php echo $data['remarque'] ?>" >
        <br/>
        <label>point remarque :</label>

        <input name="point_remarque" class="form-control" type="text" value="<?php echo $data['point_remarque'] ?>" >
        <br/>
        <label>statut dossier :</label>

        <input name="statut_dossier" class="form-control" type="text" value="<?php echo $data['statut_dossier'] ?>" >
        <br/>
        <label>total point :</label>

        <input name="total_point" class="form-control" type="text" value="<?php echo $data['total_point'] ?>" >
        <br/>
        
<?php
}
?>
    <input name="modif_grille"  type="submit" value="modifier" />

</form>
