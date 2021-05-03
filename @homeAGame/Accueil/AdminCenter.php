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
                <li><a href="../Deco/deco.php">Se déconnecter</a></li>
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
    </header>
    <body>
        <br />
        <br />
        <a class="lien" href="../OTRA/classement.php">
            <p> Classement général </p>
        </a>
    </body>

    </html>
<?php
}
?>