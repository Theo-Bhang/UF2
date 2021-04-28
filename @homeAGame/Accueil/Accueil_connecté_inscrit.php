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
        <link rel="stylesheet" href="../Assets\CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="../OTRA/mission.php">Mission</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>	
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
    </header>
        <body>
        <br/>
		<br/>
		<a class="lien" href="../OTRA/classement.php"><p> Classement général </p> </a>
		<a class="lien" href="../OTRA/mission.php"><p> Mission à réaliser</p> </a>


    </body>
</html> 
<?php
    }
?>