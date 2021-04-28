<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: ../Divers/404.php');
        exit();
    } else {
?>

<!doctype html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>Vos Missions</title>
        <link rel="stylesheet" href="../Assets\CSS/style2.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="#">Mission</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>
				
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
    </header>

    <body>
    <br/>
    <br/>
	<a class="lien" href="défis_day.php"><p> Défis du jour </p> </a>
	<a class="lien" href="défis_réal.php"><p> Défis réalisés</p> </a>


    </body>
</html> 
<?php
    }
?>