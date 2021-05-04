<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: ../Divers/aboutnc.html');
        exit();
    } 
    elseif($_SESSION['role'] == 'admin') {
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
    
    ?>
      
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Contact info</title>
    <link rel="stylesheet" href="../Assets/CSS/About.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
</head>
<header>
    <img class="logo" src="../img/LOGO-ON-THE-ROAD.png" alt="logo">
    <nav>
        <ul class="nav_links">
            <li><a href="../Accueil/AdminCenter.php">Accueil</a></li>
            <li><a href="../Divers/about.php">Gestion User</a></li>
            <li><a href="../Deco/deco.php">Se déconnecter</a></li>
        </ul>
    </nav>
    <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
</header>

<body>
    <div>
        <h2>A propos de nous !</h2>
        <br/>
        <p>On The Road a game est une entreprise de plus de 7 ans, son activité principale est l’organisation de voyages pour particulier mêlant aventure et jeux. <br/>Le jeu @Home a Game proposera une dizaine de défis permettant à ces joueurs de profiter
            de l’expérience On The Road A Game. De plus, l’équipe qui remportera cette session se verra se qualifier pour un tirage au sort qui permet de gagner un voyage On The Road A Game. À la fin de ces défis, le vainqueur remportera 1 voyage OTR
            et les autres participants pourront gagner, selon leur classement, des goodies.</p>
        <a href="https://www.instagram.com/otragame/" target="_blank"><img src="../img/instagram.png" alt="Instagram"></a>
        <a href="https://www.facebook.com/otragame/" target="_blank"><img src="../img/facebook.png" alt="Facebook"></a>
    </div>
</body>

</html>
    <?php
    }
    
    else {
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Contact info</title>
    <link rel="stylesheet" href="../Assets/CSS/About.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
</head>
<header>
    <img class="logo" src="../img/LOGO-ON-THE-ROAD.png" alt="logo">
    <nav>
        <ul class="nav_links">
            <li><a href="../Accueil/Accueil_connecté.php">Accueil</a></li>
            <li><a href="../OTRA/classement.php">Classement</a></li>
            <li><a href="../OTRA/mission.php">Missions</a></li>
            <li><a href="#">A propos</a></li>
            <li><a href="../Deco/deco.php">Se déconnecter</a></li>
        </ul>
    </nav>
    <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
</header>

<body>
    <div>
        <h2>A propos de nous !</h2>
        <br/>
        <p>On The Road a game est une entreprise de plus de 7 ans, son activité principale est l’organisation de voyages pour particulier mêlant aventure et jeux. <br/>Le jeu @Home a Game proposera une dizaine de défis permettant à ces joueurs de profiter
            de l’expérience On The Road A Game. De plus, l’équipe qui remportera cette session se verra se qualifier pour un tirage au sort qui permet de gagner un voyage On The Road A Game. À la fin de ces défis, le vainqueur remportera 1 voyage OTR
            et les autres participants pourront gagner, selon leur classement, des goodies.</p>
        <a href="https://www.instagram.com/otragame/" target="_blank"><img src="../img/instagram.png" alt="Instagram"></a>
        <a href="https://www.facebook.com/otragame/" target="_blank"><img src="../img/facebook.png" alt="Facebook"></a>
    </div>
</body>

</html>
<?php
    }
?>