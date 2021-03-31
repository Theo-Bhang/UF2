<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: aboutnc.html');
        exit();
    } else {
?>
    <!doctype html>

    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>Contact info</title>
        <link rel="stylesheet" href="./Assets/CSS/About2.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <h1 class="title">A propos de nous ! </h1>
        <div class="topnav">
            <a href="Accueil_connecté.php">Home</a>
            <a class="active" href="#">A Propos</a>
            <a href="mission.php">Mission</a>
            <a href="profil.php">Mon Compte</a>
            <a href="deco.php">Se déconnecter</a>
        </div>
    </header>

    <body>
        <div>
            <h2 class="title">On The Road A Game</h2>
            <br/>
            <p>On The Road a game est une entreprise de plus de 7 ans, son activité principale est l’organisation de voyages pour particulier mêlant aventure et jeux. <br/><br/>Le jeu @Home a Game proposera une dizaine de défis permettant à ces joueurs de
                profiter de l’expérience On The Road A Game. De plus, l’équipe qui remportera cette session se verra se qualifier pour un tirage au sort qui permet de gagner un voyage On The Road A Game.<br/><br/> À la fin de ces défis, le vainqueur remportera
                1 voyage OTR et les autres participants pourront gagner, selon leur classement, des goodies. </p>
            <a href="https://www.instagram.com/otragame/" target="_blank"><img src="img/instagram.png" alt="Instagram"></a>
            <a href="https://www.facebook.com/otragame/" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
        </div>
    </body>

</html>
<?php
    }
?>