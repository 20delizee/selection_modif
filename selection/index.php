<?php
    include_once("header.html");
?>

<h2>Accueil</h2>
<nav>
    <a href="index.php">Retour accueil</a>
</nav>
<br>
<main>
    <?php
        if(isset($_POST['loginID']) && isset($_POST['loginPWD'])){

            $varLoginID = $_POST["loginID"];
            $varLoginPWD = $_POST["loginPWD"];

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
            }
            catch (Exception $e){
                die('Erreur : ' . $e->getMessage());
            }

            // On récupère tout le contenu de la table jeux_video
            $reponse = $bdd->prepare('SELECT mdp, type_de_compte FROM utilisateur WHERE identifiant = ? ');
            $reponse->execute(array($varLoginID));

            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()){
                $pwdBDD = $donnees['mdp'];
                $tdcBDD = $donnees['type_de_compte'];
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            if($varLoginPWD === $pwdBDD){
                $pageName = $tdcBDD . ".php";
                include_once($pageName);
            } else {
                echo "Erreur ID ou MPD";
            }
        } else {
    ?>
    <section class="login">
        <form action="index.php" method="POST">

            <div>
                <span>Identifiant</span>
                <br>
                <input type="text" name="loginID">
            </div>
            <br>
            <div>
                <span>Mot de passe</span>
                <br>
                <input type="password" name="loginPWD">
            </div>
            <br>
            <input type="submit" value="se connecter" />
        </form>
        <br>    
    </section>
</main>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['update'])){
    $q = $bdd->query('UPDATE situation WHERE id = ' . $_POST['update']);
}
?>       
    <table>
        <tr>
            <td>iden</td>     
            <td>mdp</td>         
            <td>type_compte</td>     
        </tr>
        <?php
        $q = $bdd->query('SELECT * FROM utilisateur');
        while ($data = $q->fetch()){
            
        
        ?>
        <tr>
            <td><?php echo $data['identifiant']; ?></td> 
            <td><?php echo $data['mdp']; ?></td> 
            <td><?php echo $data['type_de_compte']; ?></td>
            <td>
            <form type="submit" action="modifier_situation.php" method="post"><button name="modif_situation" class="menuG" submit>modifier</button></form>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>                  



<?php
        }
    include_once("footer.html");
?>