<?php

session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
    header('Location: ../Accueil/accueil.php');
    exit();
} elseif ($_SESSION['role'] == 'user') {
    header('Location: ../Divers/Accueil_connecté.php');
    exit();
} elseif ($_SESSION['role'] == 'admin') {
?>

    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>Attribution</title>
        <link rel="stylesheet" href="../Assets\CSS/CRUD.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
        <ul class="nav_links">
                <li><a href="../Accueil/AdminCenter.php">Accueil</a></li>
				<li><a href="../Gestion/GestionCRUD.php">Gestion User</a></li>
                <li><a href="#">Attribuer Points</a></li>
                <li><a href="../Deco/deco.php">Se déconnecter</a></li>
            </ul>
        </nav>
        <a class="cta" href="../Gestion/profil.php"><button>Mon compte</button></a>
    </header>

    <body>
        <form method="post" class="needs-validation">
            <h4>ID du participant : </h4>
            <input class="input" type="number" name="i" />
            <button class="btn btn-primary">Chercher</button>
        </form>
        <br />
        <br />
        <?php
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

        if (isset($_POST["i"]) || isset($_POST["id"]) ) {
            if (isset($_POST["id"])) {
                $idc = $_POST["id"];
            }elseif(!isset($_POST["id"])){
                $idc = $_POST["i"];
            }
            
            $rqt = <<<SQL
            SELECT user.id,nom,prenom,c.score
            FROM user
            INNER JOIN Classement AS c ON c.id = user.id
            WHERE user.id = :id
            SQL;
            $stmt = $pdo->prepare($rqt);
            $stmt->execute(["id" => $idc]);
            $array = $stmt->fetchAll();
            if (empty($array)) {
        ?>
                <p>Cet utilisateur n'existe pas !</p>
            <?php
            } else {
            ?>
                <div class="div">
                    <br>
                    <p><?php print_r($array[0]['prenom']);
                        print_r(" ");
                        print_r($array[0]['nom']);  ?></p>

                    <p><?php   ?></p>
                    <br>
                    <p></p>
                    <form class='formu' method='POST' action='#'>
                        <p><?php print_r("Score : ");print_r($array[0]['score']); ?></p>
                        <label for="add">Valeur à ajouter :</label>
                        <input type="number" class="input" name="add" id="add" />
                        <label for="addscore">Etes vous sur d'ajouter cela ?</label>
                        <input type="checkbox" name="addscore" />
                        <input type="hidden" name="id" value="<?php print($array[0]['id']); ?>" />
                        <input type="hidden" name="score" value="<?php print($array[0]['score']); ?>" />
                        <button type='submit'> Ajouter</button>
                    </form>
            <?php
            }
            
        }
        if (isset($_POST['addscore'])) {
                $oldscore = $_POST['score'];
                $addscore = $_POST['addscore'];
                $newVal = $oldscore + $_POST['add'];
                $id = $_POST["id"];
                if (isset($addscore)) {
                    $sql = "UPDATE `classement` SET `score`=? WHERE id=?";
                    $pdo->prepare($sql)->execute([$newVal, $id]);
                    print("Score mis à jour !");
                }
            }
            ?>
                </div>
                <br>
    </body>

    </html>
<?php
}
?>