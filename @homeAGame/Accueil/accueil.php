<?php
session_start();
if (!empty($_SESSION)) {
    if ($_SESSION['role'] == 'admin') {

		header('Location: ../Accueil/AdminCenter.php');
		exit();
	} elseif ($_SESSION['role'] == 'user') {
		header('Location: ../Accueil/Accueil_connecté.php');
		exit();
	}
}


?>
<!doctype html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>@ccueil</title>
        <link rel="stylesheet" href="../Assets/CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Accueil</a></li>
				<li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>
            </ul>
        </nav>
        <a class="cta" href="../Log/connexion.php"><button>Se connecter</button></a>
    </header>
	<body>
		<br/>
		<br/>
		<a class="lien" href="../OTRA/classement.php"><p> Classement général </p> </a> 
    </body>
</html> 