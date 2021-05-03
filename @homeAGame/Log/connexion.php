<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Assets/CSS/connect1.css"" />
        <title>Fomulaire d'inscription</title>
    </head>
    <header>
            <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="../Divers/aboutnc.html">A propos</a></li>
            </ul>
        </nav>
        </header>
    <body>
        <form class="formu" method="POST" action="./log.php" novalidate="">
            <h2>Connectez vous </h2>
            <br/>
            <br/>
            <label> Email</label>
            <input type="email" placeholder="Email" name="mail" class="inputbasic mail" />
            <label> Mot de passe</label>
            <input type="password" placeholder="Mot de passe" name="mdp" class="inputbasic password" />
            <br/>
            <input type="submit" name="connecter" value="Se connecter"/>
            <p>
                Vous n'avez pas de compte ? <a href="formulaire.php">Créer un compte</a>
            </p>
        </form>
    </body>
</html>