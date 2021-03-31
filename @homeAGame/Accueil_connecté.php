<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
    header('Location: accueil.php');
    exit();
} else {
    $db_params = parse_ini_file('db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
/*
    $mail = $_SESSION['mail'];
    $rqt = <<<SQL
            SELECT id,imgProfil
            FROM User
            WHERE email = :mail
            SQL;
    $stmt = $pdo->prepare($rqt);
    $stmt->execute(['mail' => $mail]);
    $array = $stmt->fetchAll();
    $id = $array[0]['id'];
    $img = $array[0]['imgProfil'];
    $_SESSION['img'] = $img;*/

?>
    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>@Home a game</title>
        <link rel="stylesheet" href="./Assets/CSS/Accueil.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>

    <body>
        <header>
            <h1 class="title">@ HOME A GAME </h1>
            <h2 class="title">Bonjour <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?> </h2>
            <div class="topnav">
                <a class="active" href="Accueil_connecté.php">Home</a>
                <a href="about.php">A Propos</a>
                <a href="mission.php">Mission</a>
                <a href="profil.php">Mon Compte</a>
                <a href="deco.php">Se déconnecter</a>
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


        <a href='continu.php'>
            <p>Voulez-vous vous continuer ?</p>
        </a>
    </body>

    </html>
<?php
}
?>

</body>

</html>