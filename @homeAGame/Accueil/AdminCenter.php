<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
    header('Location: ../Accueil/accueil.php');
    exit();
} elseif ($_SESSION['role'] == 'user') {
    header('Location: ../Divers/Accueil_connecté.php');
    exit();
}elseif($_SESSION['role'] == 'admin') {
    $db_params = parse_ini_file('../db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

?>
   <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>@Home a game</title>
        <link rel="stylesheet" href="../Assets\CSS/Accueil.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>

    
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Accueil</a></li>
				<li><a href="../Gestion/GestionCRUD.php">Gestion User</a></li>
                <li><a href="../Admin/Points.php">Attribuer Points</a></li>
                <li><a href="../Deco/deco.php">Se déconnecter</a></li>
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
    </header>
    <body>
        <br />
        <br />
        <?php 
            $numb = 5;
            $db_params = parse_ini_file('../db.ini', true);
            $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

            $rqt = <<<SQL
                        SELECT nom,prenom,c.score
                        FROM user
                        INNER JOIN Classement AS c ON c.id = user.id
                        ORDER BY c.score DESC , nom ASC
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
        if($i==0){
            ?>
            <img class="num<?php  print($i+1);?>" src="../Img/couronne.png" alt="number one"/>
            <p> <?php print($i+1);print(" -- "); print_r($array[$i]['nom']);print_r(" ");print_r($array[$i]['prenom']);print_r(" : ");?></p>
            <p class="score"> <?php print_r($array[$i]['score']); ?></p>
            <?php 
        }
        elseif($i==1){
            ?>
            <img class="num<?php  print($i+1);?>" src="../img/silver.png" alt="second"/>
            <p> <?php print($i+1);print(" -- "); print_r($array[$i]['nom']);print_r(" ");print_r($array[$i]['prenom']);print_r(" : ");?></p>
            <p class="score"> <?php print_r($array[$i]['score']); ?></p>
             <?php 
        }
        elseif($i==2){
            ?>
            <img class="num<?php  print($i+1);?>" src="../img/bronze.png" alt="third"/>
            <p> <?php print($i+1);print(" -- "); print_r($array[$i]['nom']);print_r(" ");print_r($array[$i]['prenom']);print_r(" : ");?></p>
            <p class="score"> <?php print_r($array[$i]['score']); ?></p>
             <?php 
        }else{
        ?>
       <p class="<?php  print($i+1);?>"> <?php print($i+1);print(" -- "); print_r($array[$i]['nom']);print_r(" ");print_r($array[$i]['prenom']);print_r(" : ");?></p>
       <p class="score"> <?php print_r($array[$i]['score']); ?></p>
        <?php 
        }
    }
                ?>
        </div>
        </a>
    </body>
</html> 
<?php
}
?>