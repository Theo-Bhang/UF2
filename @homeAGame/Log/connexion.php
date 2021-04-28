<?php
session_start();
?>

<!doctype html>
<html>

<head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Profil.css"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Accueil</title>
</head>

<body>
<header>
            <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="../Divers/aboutnc.html">A propos</a></li>
            </ul>
        </nav>
        <a class="cta" href="#"><button>Se connecter</button></a>
        </header>
    <div class="card-header">
        <h4>Login</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="./log.php" class="needs-validation" novalidate="">
            <div class="form-group">
                <label for="mail">Email</label>
                <input id="mail" type="email" class="form-control" name="mail" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Aucun email soumis
                </div>
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="mdp" class="control-label">Mot de passe :</label>
                </div>
                <input id="password" type="password" class="form-control" name="mdp" tabindex="2" required>
                <div class="invalid-feedback">
                    Veuillez renseigner un mot de passe
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>


        <div class="mt-5 text-muted text-center">
            Vous n'avez pas de compte ? <a href="../Log/Enregistrement.php">En créer un</a>
        </div>

</body>

</html>