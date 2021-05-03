<?php
    session_start();
    if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
        header('Location: ../Accueil/accueil.php');
        exit();
    } 
    if($_SESSION['role'] == 'admin') {
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
        
        $db_params = parse_ini_file('../db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
        if(isset($_POST['i']) && !isset($_POST['numb']) && !isset($numb)){
            $numb = $_POST['i'];
        }elseif(isset($_POST['numb']) && !isset($numb)){
            $numb = $_POST['numb'];
        }else{
            $numb = 1;
        }
        
        $rqt = <<<SQL
        SELECT nom,prenom,email
        FROM user
        SQL;
        $stmt = $pdo->prepare($rqt);
        $stmt->execute();
        $array = $stmt->fetchAll();
        
        
        $rqt2 = <<<SQL
        SELECT COUNT(*) AS nb_max
        FROM user
        SQL;
        $stmt2 = $pdo->prepare($rqt2);
        $stmt2->execute();
        $array2 = $stmt2->fetchAll();
        $nbmax = $array2[0]['nb_max'];
    ?>
      
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Contact info</title>
    <link rel="stylesheet" href="../Assets/CSS/CRUD.css">
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
    <form method="post" class="needs-validation">
      <h4>Nombre de résultats : </h4>
      <input type="number" name="i"  placeholder="<?php print($numb);?>"/>
      <button class="btn btn-primary">Changer</button>
    </form>
    <?php
   if($numb>$nbmax)
    {
        $numb = $nbmax;
    }
            for($i=0;$i<$numb;$i++)
            {
                ?>
                <div class="div<?php print($i);?>">
                    <p><?php print_r($array[$i]['email']);  ?></p>
                    <br>
                    <p><?php print_r($array[$i]['prenom']);  ?></p>
                    <br>
                    <p><?php print_r($array[$i]['nom']);  ?></p>
                    <form class='formu' method='POST' action='#'>
                        
                        <label for="supmail">Voulez vous supprimer <?php  print_r($array[$i]['nom']);print(" ");print_r($array[$i]['prenom']); ?> ?</label>
                        <input type="checkbox" name="supmail" />
                        <input type="hidden" name="mail" value="<?php print($array[$i]['email']);?>"/>
                        <input type="hidden" name="numb" value="<?php print($numb);?>"/>
                        <button type='submit'> Supprimer </button>
                    </form>
                </div>
                <br>
                
                <?php
            }     
            if(isset($_POST['supmail'])){
                $supmail = $_POST['supmail'];
                $mail = $_POST['mail'];
                if(isset($supmail)){
                    $rqt = <<<SQL
                    DELETE
                    FROM user
                    WHERE email = :mail
                    SQL;
                    $stmt = $pdo->prepare($rqt);
                    $stmt->execute(['mail' => $mail]);
                    $array = $stmt->fetchAll();
                    print("Utilisateur supprimé !");
                }
            }
        ?>
   
</body>

</html>
    <?php
    }elseif ($_SESSION['role'] == 'user') {
        header('Location: ../Accueil/accueil.php');
        exit();
    }
    ?>