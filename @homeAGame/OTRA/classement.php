<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
?>
<!DOCTYPE html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>Classement </title>
        <link rel="stylesheet" href="../Assets\CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    
    <header>
            <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="#">Classement</a></li>
                <li><a href="../OTRA/mission.php">Mission</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>
				
            </ul>
        </nav>
        <a class="cta" href="../Log/connexion.php"><button>Se connecter</button></a>
        </header>

        <body>
        <br/>
		<br/>
        <a class="lien">
            <p> 
                <ul>
                    <li> 1er : </li>
                    <li> 2eme : </li>
                    <li> 3eme : </li>
                    <li> 4eme : </li>
                    <li> 5eme : </li>
                    <li> XXX : </li>
                </ul>
            </p> 
        </a>

    </body>
</html>
<?php
    } 
    else{
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
    
    ?>
    
<!DOCTYPE html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>Classement </title>
        <link rel="stylesheet" href="../Assets\CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    
    <header>
            <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="#">Classement</a></li>
                <li><a href="../OTRA/mission.php">Mission</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>
				
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
        </header>

        <body>
        <br/>
		<br/>
        <a class="lien">
            <p> 
                <ul>
                    <li> 1er : </li>
                    <li> 2eme : </li>
                    <li> 3eme : </li>
                    <li> 4eme : </li>
                    <li> 5eme : </li>
                    <li> XXX : </li>
                </ul>
            </p> 
        </a>

    </body>
</html>
    <?php
    }
?>
