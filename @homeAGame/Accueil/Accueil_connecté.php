<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
    header('Location: ../Accueil/accueil.php');
    exit();
}elseif ($_SESSION['role'] == 'admin') {
    header('Location: ../Accueil/AdminCenter.php');
    exit();
} 
else {
    $db_params = parse_ini_file('../db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

?>
    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>@Home a game</title>
        <link rel="stylesheet" href="../Assets/CSS/Accueil.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>

    <body>
        <header>
            <h1 class="title">@ HOME A GAME </h1>
            <h2 class="title">Bonjour <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?> </h2>
            <div class="topnav">
                <a class="active" href="#">Home</a>
                <a href="../Divers/about.php">A Propos</a>
                <a href="../OTRA/mission.php">Mission</a>
                <a href="../Gestion/profil.php">Mon Compte</a>
                <a href="../Deco/deco.php">Se déconnecter</a>
            </div>
        </header>

        <br />
        <br />
        <a class="lien" href="classement.php">
            <p> Classement général </p>
        </a>
        <a class="inscription_defi.php">
            <p> S'inscrire</p>
        </a>
    </body>

    </html>
<?php
}
?>
