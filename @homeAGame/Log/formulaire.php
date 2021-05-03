<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Assets/CSS/connect1.css" />
        <title>Fomulaire d'inscription</title>
    </head>
    <header>
        <img class="logo" src="../Img/LOGO-ON-THE-ROAD.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../Accueil/accueil.php">Accueil</a></li>
                <li><a href="../OTRA/classement.php">Classement</a></li>
                <li><a href="../Divers/about.php">A propos</a></li>
            </ul>
        </nav>
    </header>
    <body>
                       
<?php
    $db_params = parse_ini_file('../db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
    $countacc = 0;
    $rqt1 = <<<SQL
            SELECT email
            FROM user 
        SQL;
    $stmt1 = $pdo->prepare($rqt1);
    $stmt1->execute();
    $array = $stmt1->fetchAll();
    function notvalid()
    {
        ?>
    <h4>Cet utilisateur existe déjà ! <br/>Veuillez  renseigner un autre mail</h4>
    <form class='formu' method='POST' action='#'>
        <h2>Créez votre compte</h2>
        <br/>
        <label for='nom'> Entrez votre nom :</label>
        <input type='text' placeholder='Nom' name='nom' class='inputbasic nom' />
        <br/>
        <label> Entrez votre prenom :</label>
        <input type='text' placeholder='Prenom' name='prenom' class='inputbasic prenom' />
        <br/>
        <label> Entrez votre email :</label>
        <input type='text' placeholder='Email' name='email' class='inputbasic mail' />
        <br/>
        <label> Entrez votre mot de passe :</label>
        <input type='password' placeholder='Mot de passe' name='password' class='inputbasic password' />
        <br/>
        <label for='password2' >Confirmation Mot de Passe</label>
        <input id='password2' type='password' placeholder = 'Mot de passe' name='password-confirm' class='inputbasic password'/>
        </br>
        <button type='submit'> S'enregistrer </button>
        </br></br>
        <p>Déjà membre ? <a href='./connexion.php'>Connectez vous</a></p>
    </form>
                            <?php
    }
    if ((isset($_POST['nom']) && $_POST['nom'] != '') && (isset($_POST['prenom']) && $_POST['prenom'] != '') && (isset($_POST['password']) && $_POST['password'] != '') && (isset($_POST['email']) && $_POST['email'] != '') && ($_POST['password'] == $_POST['password-confirm']) && (isset($_POST['password-confirm']) && $_POST['password-confirm'] != '')) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['password'];
        $email = $_POST['email'];
        
        
        
        function valid($pdo, $mdp, $nom, $prenom, $email)
        {
            $user = "{$_POST['nom']} {$_POST['prenom']}";
            $_SESSION['username'] = $user;
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['mail'] = $email;
            $rqt2 = <<<SQL
                    SELECT role
                    FROM user 
                SQL;
            $stmt2 = $pdo->prepare($rqt2);
            $stmt2->execute();
            $array2 = $stmt2->fetchAll();
            $_SESSION['role'] = $array2[0]['role'];
            $options = [
                'cost' => 12,
            ];
            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
            $stmt = $pdo->prepare("INSERT INTO user( `nom`, `prenom`, `mdp`, `email`) VALUES (:nom,:prenom,:mdp,:email)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->execute();
            header('Location: ../Accueil/Accueil_connecté.php');
            exit();
        }

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]['email'] == $email) {
                $countacc = 1;
            }
        }
        if ($countacc == 1) {
            notvalid();
        } elseif ($countacc == 0) {
            valid($pdo, $mdp, $nom, $prenom, $email);
        }
    } elseif ((isset($_POST['password']) && $_POST['password'] != '') && (isset($_POST['password-confirm']) && $_POST['password-confirm'] != '') && $_POST['password'] != $_POST['password-confirm']) {
        $form = "
                    <h4>Les mots de passe ne correspondent pas !</h4>
                           
                    <form class='formu' method='POST' action='#'>
                    <h2>Créez votre compte</h2>
                    <br/>
                    <label for='nom'> Entrez votre nom :</label>
                    <input type='text' placeholder='Nom' name='nom' class='inputbasic nom' />
                    <br/>
                    <label> Entrez votre prenom :</label>
                    <input type='text' placeholder='Prenom' name='prenom' class='inputbasic prenom' />
                    <br/>
                    <label> Entrez votre email :</label>
                    <input type='text' placeholder='Email' name='email' class='inputbasic mail' />
                    <br/>
                    <label> Entrez votre mot de passe :</label>
                    <input type='password' placeholder='Mot de passe' name='password' class='inputbasic password' />
                    <br/>
                    <label for='password2' >Confirmation Mot de Passe</label>
                    <input id='password2' type='password' placeholder = 'Mot de passe' name='password-confirm' class='inputbasic password'>
                    </br>
                    <button type='submit'> S'enregistrer </button>
                    </br></br>
                    <p>Déjà membre ? <a href='./connexion.php'>Connectez vous</a></p>
                </form>
                        ";
        echo $form;
    } else {
        ?>
    <form class='formu' method='POST' action='#'>
        <h2>Créez votre compte</h2>
        <br/>
        <label for='nom'> Entrez votre nom :</label>
        <input type='text' placeholder='Nom' name='nom' class='inputbasic nom' />
        <br/>
        <label> Entrez votre prenom :</label>
        <input type='text' placeholder='Prenom' name='prenom' class='inputbasic prenom' />
        <br/>
        <label> Entrez votre email :</label>
        <input type='text' placeholder='Email' name='email' class='inputbasic mail' />
        <br/>
        <label> Entrez votre mot de passe :</label>
        <input type='password' placeholder='Mot de passe' name='password' class='inputbasic password' />
        <br/>
        <label for='password2' >Confirmation Mot de Passe</label>
        <input id='password2' type='password' placeholder = 'Mot de passe' name='password-confirm' class='inputbasic password'/>
        </br>
        <button type='submit'> S'enregistrer </button>
        </br></br>
        <p>Déjà membre ? <a href='./connexion.php'>Connectez vous</a></p>
    </form>
        <?php
    }
    ?>
</body>

</html>