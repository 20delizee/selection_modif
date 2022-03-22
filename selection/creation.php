<!DOCTYPE htlm>
<html lang="fr">
	<head>


		<meta charset="UTF-8">


​		

	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>

<?php
           
           try
           {
               $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
           }
           catch (Exception $e)
           {
               die('Erreur : ' . $e->getMessage());
           }
           
           $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);


        $req = $bdd->prepare('INSERT INTO utilisateur(identifiant, mdp, type_de_compte)
         VALUES(:identifiant, :mdp, :type_de_compte)');
        $req->execute(array(
            'identifiant' => $_POST['iden'],
            'mdp' => $_POST['mdp'],
            'type_de_compte' => $_POST['compte']
        ));
        
        
        
        
        ?>
        <?php
            $req = $bdd->prepare('UPDATE utilisateur SET identifiant = :nident, mdp = :nmdp compte = ncompte ');
            $req->execute(array(
                'nident' => $_POST['nident'],
                'nmdp' => $_POST['nmdp'],
                
                ));
?>


</body>

</html>

