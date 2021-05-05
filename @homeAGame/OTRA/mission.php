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
    <?php
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

        $id = $_SESSION['id'];
        $rqt = <<<SQL
            SELECT c.score
            FROM user
            INNER JOIN Classement AS c ON c.id = user.id
            WHERE user.id = :id
        SQL;
        $stmt = $pdo->prepare($rqt);
        $stmt->execute(['id' => $id]);
        $array = $stmt->fetchAll();
        ?>
        <h1 class="welc">Bienvenue <?php print($_SESSION["username"]); ?></h1>
        <br>
        <h2 class="score">Votre Score :  <?php print_r($array[0]["score"]); ?> OTR@coins</h2>
        <h2 class="miss">Voici vos missions : </h2>
	<a class="lien1" href="défis_day.php"><p> Défis du jour </p> </a>
	<a class="lien2" href="défis_réal.php"><p> Défis</p> </a>


    </body>
</html> 
<?php
    }
?>