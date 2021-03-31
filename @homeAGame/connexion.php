<?php
session_start();
?>

<!doctype html>
<html>

<head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./Assets/CSS/Profil.css"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Accueil</title>
</head>

<body>
<header>
        <h1 class="title">@ HOME A GAME </h1>
		<div class="topnav">
			<a href="./accueil.php">Home</a>
			<a href="./about.php">A Propos</a>
			<a class="active" href="./connexion.php" >Se connecter</a>
			<a href="./Enregistrement.php" >Créer un compte</a>
		  </div>
    </header>
    <div class="card-header">
        <h4>Login</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="log.php" class="needs-validation" novalidate="">
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
        <?php
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "passwordupdated") {
                echo '<p class="signupsucess">Votre mot de passe à été changé!</p>';
            }
        }


        ?>
        

        <div class="mt-5 text-muted text-center">
            Vous n'avez pas de compte ? <a href="enregistrement.php">En créer un</a>
        </div>

</body>

</html>