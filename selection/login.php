<!DOCTYPE htlm>
<html lang="fr">
	<head>


		<meta charset="UTF-8">

		<title>portail d'identification</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
        <section class="login">
            <form action="home.php" method="POST">
                <div class="inscription">
                <div class="monge">
            
                <div>

                    identifiant
                    <input type="text" name="loginID">

                </div>

                    <br>
            
                <div>

                    mot de passe
                    <input type="password" name="loginPWD">

                </div>
                <input type="submit" value="Envoyer" />
                <br>
                </form>
                <div>
                    <a href="prof.php"><input type="submit" value="OK prof"/></a>

                
                    <a href="secretaire.php"><input type="submit" value="OK secretaire"/></a>

                
                    <a href="admin.html"><input type="submit" value="OK admin"/></a>

                <div>

        </section>
	</body>

</html>