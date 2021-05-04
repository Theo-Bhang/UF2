<?php
session_start();
if (!empty($_SESSION && isset($_SESSION['role']))) {
    if ($_SESSION['role'] == 'admin') {

		header('Location: ../Accueil/AdminCenter.php');
		exit();
	} elseif ($_SESSION['role'] == 'user') {
		header('Location: ../Accueil/Accueil_connecté.php');
		exit();
	}
}else{


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
        <?php 
            $numb = 5;
            $db_params = parse_ini_file('../db.ini', true);
            $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

            $rqt = <<<SQL
                        SELECT nom,prenom,c.score
                        FROM user
                        INNER JOIN Classement AS c ON c.id = user.id
                        ORDER BY c.score DESC
                        SQL;
            $stmt = $pdo->prepare($rqt);
            $stmt->execute();
            $array = $stmt->fetchAll();

            $rqt2 = <<<SQL
            SELECT COUNT(*) AS nb_max
            FROM classement
            SQL;
            $stmt2 = $pdo->prepare($rqt2);
            $stmt2->execute();
            $array2 = $stmt2->fetchAll();
            $nbmax = $array2[0]['nb_max'];
        ?>
        <a class="lien" href="../OTRA/classement.php">
        <div>
        <?php
   if($numb>$nbmax)
    {
        $numb = $nbmax;
    }
            for($i=0;$i<$numb;$i++)
            {
                ?>
               <p> <?php print($i+1);print(" -- "); print_r($array[$i]['nom']);print_r(" ");print_r($array[$i]['prenom']);print_r(" : ");?></p>
               <p class="score"> <?php print_r($array[$i]['score']); ?></p>
                <?php 
            }
                ?>
        </div>
        </a>
    </body>
</html> 
<?php
}
?>