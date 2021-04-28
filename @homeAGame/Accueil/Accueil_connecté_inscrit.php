<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: ../Acceuil/accueil.php');
        exit();
    } else {
?>
<!doctype html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>@ Home A Game </title>
        <link rel="stylesheet" href="../Assets/CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <body>
        <header>
            <h1 class="title">@ Home A Game </h1>
            <div class="topnav">
                <a class="active" href="Accueil_connecté.php">Home</a>
                <a href="about.html">A Propos</a>
                <a href="mission.php">Mission</a>
                <a href="profil.php">Mon Compte</a>
            </div>
        </header>
        <br/>
		<br/>
		<a class="lien" href="classement.php"><p> Classement général </p> </a>
		<a class="lien" href="mission_à_réal.php"><p> Mission à réaliser</p> </a>


    </body>
</html> 
<?php
    }
?>