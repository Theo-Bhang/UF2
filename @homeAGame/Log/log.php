<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Connexion</title>
</head>

<body>
    <?php
    $db_params = parse_ini_file('../db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

    if ((isset($_POST['mail']) && $_POST['mail'] != '') && (isset($_POST['mdp']) && $_POST['mdp'] != '')) {
        $mail = $_POST['mail'];

        $rqt = <<<SQL
            SELECT email
            FROM user as u 
            WHERE email = :mail
            SQL;
        $stmt = $pdo->prepare($rqt);
        $stmt->execute(['mail' => $mail]);
        $mailbd = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($mailbd)) {
          $rqt2 = <<<SQL
            SELECT email
            FROM `admin` as a
            WHERE email = :mail
            SQL;
          $stmt = $pdo->prepare($rqt2);
          $stmt->execute(['mail' => $mail]);
          $mailbd = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


    if ((isset($_POST['mdp']) && $_POST['mdp'] != '')  && (isset($_POST['mail']) && $_POST['mail'] != '')) {
        $mdp = $_POST['mdp'];
        $rqtmdp = <<<SQL
            SELECT mdp 
            FROM user 
            WHERE email = :mail
            SQL;
        $stmtMdp = $pdo->prepare($rqtmdp);
        $stmtMdp->execute(['mail' => $mail]);
        $mdpBD = $stmtMdp->fetch(PDO::FETCH_ASSOC);
        if (!empty($mdpBD)) {
          $hashmdp =  $mdpBD['mdp'];
        }
        elseif (empty($mdpBD)) {
          $rqtmdp2 = <<<SQL
            SELECT mdp 
            FROM `admin`
            WHERE email = :mail
            SQL;
          $stmtMdp = $pdo->prepare($rqtmdp2);
          $stmtMdp->execute(['mail' => $mail]);
          $mdpBD = $stmtMdp->fetch(PDO::FETCH_ASSOC);
          $hashmdp =  $mdpBD['mdp'];
        }
    }





    if (isset($mail) && password_verify($mdp, $hashmdp)) {
        
        $mail = $_POST['mail'];
        $rqtprenom = <<<SQL
            SELECT prenom,nom,role
            FROM user
            WHERE email = :mail
        SQL;
        $stmtprenom = $pdo->prepare($rqtprenom);
        $stmtprenom->execute(['mail' => $mail]);
        $array = $stmtprenom->fetchAll();
        if (empty($array)) {
          $rqtprenom2 = <<<SQL
            SELECT prenom,nom,role
            FROM `admin`
            WHERE email = :mail
          SQL;
          $stmtprenom = $pdo->prepare($rqtprenom2);
          $stmtprenom->execute(['mail' => $mail]);
          $array = $stmtprenom->fetchAll();
        }


        $user = "{$array[0]['nom']} {$array[0]['prenom']}";
        $_SESSION['username'] = $user;
        $_SESSION['nom'] = $array[0]['nom'];
        $_SESSION['prenom'] = $array[0]['prenom'];
        $_SESSION['mail'] = $mail;
        $_SESSION['role'] = $array[0]['role'];
        if($array[0]['role'] == 'admin'){
          header('Location: ../Accueil/AdminCenter.php');
          exit();
        }elseif($array[0]['role'] == 'user'){
          header('Location: ../Accueil/Accueil_connecté.php');
          exit();
        }
        
    } elseif (!isset($mdp) || !isset($hashmdp) || password_verify($mdp, $hashmdp) == FALSE) {

        echo "    
                    <h4>Attention erreur d'authentification !<br/>Veuillez vérifier votre mot de passe ou votre email</h4>
                    <form method='POST' action='#' class='formu' novalidate=''>
                        <label for='mail'>Email</label>
                        <input id='mail' type='email' class='form-control' name='mail' tabindex='1' required autofocus>
                  
                  
                          <label for='mdp' class='control-label'>Mot de passe :</label>
                      
                        <input id='password' type='password' class='form-control' name='mdp' tabindex='2' required>
                      
                        <input type='submit' value='Login' tabindex='4'/>
                    </form>
                  Vous n'avez pas de compte ? <a href='enregistrement.php'>En créer un</a>
                
             ";
    }
    ?>
</body>

</html>