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
        <title>Défis du jour</title>
        <link rel="stylesheet" href="../Assets\CSS/style2.css"/>
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|s)no-js(s|$)/,"$1js$2")})(document,window,0);</script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="./mission.php">Mission</a></li>
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
            SELECT titre,description
            FROM defis
        SQL;
        $stmt = $pdo->prepare($rqt);
        $stmt->execute();
        $array = $stmt->fetchAll();

        $rqt2 = <<<SQL
        SELECT DATE_FORMAT(date_valide, "%d/%m/%Y") AS date_val
        FROM valide_defi
        WHERE id = :id
        SQL;
        $stmt2 = $pdo->prepare($rqt2);
        $stmt2->execute(["id" => $id]);
        $array2 = $stmt2->fetchAll();

        $rqt3 = <<<SQL
        SELECT COUNT(*) AS nbmax
        FROM defis
        SQL;
        $stmt3 = $pdo->prepare($rqt3);
        $stmt3->execute();
        $array3= $stmt3->fetchAll();
        $nbmax = $array3[0]["nbmax"];
        ?>
      
        <?php 

if (!empty($array)) {
    ?> 
    <h1 class="welc">Voici vos défis  : </h1>
    <br>
    <?php
    for ($i=0; $i < $nbmax  ; $i++) { 

    ?>
    <div>
        <h2 class= "welc"><?php print($array[$i]["titre"]); ?></h2>
        <br>
        <h2 class="desc"><?php print_r($array[$i]["description"]); ?></h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="file-input">
                <input type="file" id="file" class="file">
                <label for="file">
                    Select file
                    <p class="file-name"></p>
                </label>
            </div>
            <div class="button">
                <input id="but" type="submit" value="Envoyer" >
            </div>
            <script>
                const file = document.querySelector('#file');
                file.addEventListener('change', (e) => {
                const [file] = e.target.files;
                const { name: fileName, size } = file;
                const fileSize = (size / 1000).toFixed(2);
                const fileNameAndSize = `${fileName} - ${fileSize}KB`;
                document.querySelector('.file-name').textContent = fileNameAndSize;
                });
            </script>
        </form>
    </div>
    <?php
       if (!empty($array2) && isset($array2[$i]["date_val"])) {
        ?>
            <p class="real">Ce defis a déjà été réalisé le : <?php print_r($array2[$i]["date_val"]); ?></p>

        <?php
    }
    }
}else{
    ?>
    <h1 class="welc">Pas de défi pour aujourd'hui...</h1>
    <br>
    <h2 class="desc">Revenez demain !</h2>
    <?php
    
}

 
?>
    </body>
</html> 
<?php
    }
?>