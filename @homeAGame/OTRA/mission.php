<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: 404.php');
        exit();
    } else {
?>

<!doctype html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>Vos Missions</title>
        <link rel="stylesheet" href="../Assets/CSS/style2.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <body>
        <header>
            <h1>Vos Missions</h1>
            <div class="topnav">
                <a  href="../Accueil/Accueil_connecté.php">Home</a>
                <a href="../Divers/about.php">A Propos</a>
                <a class="active" href="#">Mission</a>
                <a href="../Gestion/profil.php">Mon Compte</a>
            </div>
        </header>
        <br/>
		<br/>
		<a class="lien" href="défis_day.php"><p> Défis du jour </p> </a>
		<a class="lien" href="défis_réal.php"><p> Défis réalisés</p> </a>


    </body>
</html> 
<?php
    }
?>