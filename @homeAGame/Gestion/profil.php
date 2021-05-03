<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
  header('Location: ../Divers/404.php');
  exit();
} elseif ($_SESSION['role'] == 'admin') {
?>
  <!doctype html>
  <html>

  <head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Profil.css" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Profil</title>
  </head>

  <body>
    <header>
      <img class="logo" src="../img/LOGO-ON-THE-ROAD.png" alt="logo">


      <nav>
        <ul class="nav_links">
          <li><a href="../Accueil/AdminCenter.php">Accueil</a></li>
          <li><a href="../Divers/about.php">Gestion User</a></li>
          <li><a href="../Deco/deco.php">Se déconnecter</a></li>
        </ul>
      </nav>
    </header>

    <?php
    $db_params = parse_ini_file('../db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

    $mail = $_SESSION['mail'];
    $rqt = <<<SQL
                SELECT id
                FROM user
                WHERE email = :mail
                SQL;
    $stmt = $pdo->prepare($rqt);
    $stmt->execute(['mail' => $mail]);
    $array = $stmt->fetchAll();
    if (empty($array)) {
      $rqt = <<<SQL
        SELECT idAdmin
        FROM `admin`
        WHERE email = :mail
      SQL;
      $stmt = $pdo->prepare($rqt);
      $stmt->execute(['mail' => $mail]);
      $array = $stmt->fetchAll();
      $id = $array[0]['idAdmin'];


      if (isset($_POST['nom'])) {
        $change = $_POST['nom'];

        $sql = "UPDATE `admin` SET `nom`=? WHERE idAdmin=?";
        $pdo->prepare($sql)->execute([$change, $id]);
        $_SESSION['nom'] = $change;
      }
      if (isset($_POST['prenom'])) {
        $change = $_POST['prenom'];

        $sql = "UPDATE `admin` SET `prenom`=? WHERE idAdmin=?";
        $pdo->prepare($sql)->execute([$change, $id]);
        $_SESSION['prenom'] = $change;
      }
      if (isset($_POST['mdp'])) {
        $change = $_POST['mdp'];
        $hash = password_hash($change, PASSWORD_BCRYPT);
        $sql = "UPDATE `admin` SET `mdp`=? WHERE idAdmin=?";
        $pdo->prepare($sql)->execute([$hash, $id]);
      }
    } elseif (!empty($array)) {
      $id = $array[0]['id'];


      if (isset($_POST['nom'])) {
        $change = $_POST['nom'];

        $sql = "UPDATE `user` SET `nom`=? WHERE id=?";
        $pdo->prepare($sql)->execute([$change, $id]);
        $_SESSION['nom'] = $change;
      }
      if (isset($_POST['prenom'])) {
        $change = $_POST['prenom'];

        $sql = "UPDATE `user` SET `prenom`=? WHERE id=?";
        $pdo->prepare($sql)->execute([$change, $id]);
        $_SESSION['prenom'] = $change;
      }
      if (isset($_POST['mdp'])) {
        $change = $_POST['mdp'];
        $hash = password_hash($change, PASSWORD_BCRYPT);
        $sql = "UPDATE `user` SET `mdp`=? WHERE id=?";
        $pdo->prepare($sql)->execute([$hash, $id]);
      }
    }
    ?>

    <h2 class="clearfix">Mail</h2>
    <p> <?php echo $_SESSION['mail'] ?></p>

    <form method="post" class="needs-validation">
      <h4>Changer Prénom</h4>
      <label>Prénom</label>
      <input type="text" class="form-control" name="prenom" placeholder='<?php echo $_SESSION['prenom'] ?>' />
      <button class="btn btn-primary">Changer</button>
    </form>
    <form method="post" class="needs-validation">
      <h4>Changer Nom</h4>
      <label>Nom</label>
      <input type="text" class="form-control" name="nom" placeholder='<?php echo $_SESSION['nom'] ?>' />
      <button class="btn btn-primary">Changer</button>
    </form>
    <form method="post" class="needs-validation">
      <h4>Changer Mdp</h4>
      <label>Mdp</label>
      <input type="password" class="form-control" name="mdp" />
      <button class="btn btn-primary">Changer</button>
    </form>

  </body>

  </html>
<?php
} else {


?>
  <!doctype html>
  <html>

  <head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets\CSS/Profil.css" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Profil</title>
  </head>


  <header>
    <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
    <nav>
      <ul class="nav_links">
        <li><a href="../Accueil/accueil.php">Accueil</a></li>
        <li><a href="../OTRA/classement.php">Classement</a></li>
        <li><a href="../Divers/about.php">A propos</a></li>
        <li><a href="../Deco/deco">Se déconnecter</a></li>
      </ul>
    </nav>
    <a class="cta" href="#"><button>Mon compte</button></a>
  </header>

  <body>

    <?php

$db_params = parse_ini_file('../db.ini', true);
$pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

$mail = $_SESSION['mail'];
$rqt = <<<SQL
            SELECT id
            FROM user
            WHERE email = :mail
            SQL;
$stmt = $pdo->prepare($rqt);
$stmt->execute(['mail' => $mail]);
$array = $stmt->fetchAll();
if (empty($array)) {
  $rqt = <<<SQL
    SELECT idAdmin
    FROM `admin`
    WHERE email = :mail
  SQL;
  $stmt = $pdo->prepare($rqt);
  $stmt->execute(['mail' => $mail]);
  $array = $stmt->fetchAll();
  $id = $array[0]['idAdmin'];


  if (isset($_POST['nom'])) {
    $change = $_POST['nom'];

    $sql = "UPDATE `admin` SET `nom`=? WHERE idAdmin=?";
    $pdo->prepare($sql)->execute([$change, $id]);
    $_SESSION['nom'] = $change;
  }
  if (isset($_POST['prenom'])) {
    $change = $_POST['prenom'];

    $sql = "UPDATE `admin` SET `prenom`=? WHERE idAdmin=?";
    $pdo->prepare($sql)->execute([$change, $id]);
    $_SESSION['prenom'] = $change;
  }
  if (isset($_POST['mdp'])) {
    $change = $_POST['mdp'];
    $hash = password_hash($change, PASSWORD_BCRYPT);
    $sql = "UPDATE `admin` SET `mdp`=? WHERE idAdmin=?";
    $pdo->prepare($sql)->execute([$hash, $id]);
  }
} elseif (!empty($array)) {
  $id = $array[0]['id'];


  if (isset($_POST['nom'])) {
    $change = $_POST['nom'];

    $sql = "UPDATE `user` SET `nom`=? WHERE id=?";
    $pdo->prepare($sql)->execute([$change, $id]);
    $_SESSION['nom'] = $change;
  }
  if (isset($_POST['prenom'])) {
    $change = $_POST['prenom'];

    $sql = "UPDATE `user` SET `prenom`=? WHERE id=?";
    $pdo->prepare($sql)->execute([$change, $id]);
    $_SESSION['prenom'] = $change;
  }
  if (isset($_POST['mdp'])) {
    $change = $_POST['mdp'];
    $hash = password_hash($change, PASSWORD_BCRYPT);
    $sql = "UPDATE `user` SET `mdp`=? WHERE id=?";
    $pdo->prepare($sql)->execute([$hash, $id]);
  }
}
    ?>

    <h2 class="clearfix">Mail</h2>
    <p> <?php echo $_SESSION['mail'] ?></p>

    <form method="post" class="needs-validation">
      <h4>Changer Prénom</h4>
      <label>Prénom</label>
      <input type="text" class="form-control" name="prenom" placeholder='<?php echo $_SESSION['prenom'] ?>' />
      <button class="btn btn-primary">Changer</button>
    </form>
    <form method="post" class="needs-validation">
      <h4>Changer Nom</h4>
      <label>Nom</label>
      <input type="text" class="form-control" name="nom" placeholder='<?php echo $_SESSION['nom'] ?>' />
      <button class="btn btn-primary">Changer</button>
    </form>
    <form method="post" class="needs-validation">
      <h4>Changer Mdp</h4>
      <label>Mdp</label>
      <input type="password" class="form-control" name="mdp" />
      <button class="btn btn-primary">Changer</button>
    </form>
  </body>

  </html>
<?php
}
?>