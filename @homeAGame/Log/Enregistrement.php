<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../Assets/CSS/Profil.css"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Enregistrement</title>
</head>

<body>
<header>
        <h1 class="title">@ HOME A GAME </h1>
		<div class="topnav">
			<a href="../Accueil/accueil.php">Home</a>
			<a href="../Divers/about.php">A Propos</a>
			<a href="./connexion.php" >Se connecter</a>
			<a class="active" href="#" >Créer un compte</a>
		  </div>
    </header>
    <?php
    $form = "
                            <h4>Enregistrement</h4>
                     
                        <div class='card-body'>
                            <form method='POST' action='#'>
                                <div class='row'>
                                    <div class='form-group col-6'>
                                        <label for='frist_name'>Prénom</label>
                                        <input id='frist_name' type='text' class='form-control' name='prenom' autofocus>
                                    </div>
                                    <div class='form-group col-6'>
                                        <label for='last_name'>Nom</label>
                                        <input id='last_name' type='text' class='form-control' name='nom'>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='email'>Email</label>
                                    <input id='email' type='email' class='form-control' name='email'>
                                    <div class='invalid-feedback'>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='form-group col-6'>
                                        <label for='password' class='d-block'>Mot de Passe</label>
                                        <input id='password' type='password' class='form-control pwstrength' data-indicator='pwindicator' name='password'>
                                        <div id='pwindicator' class='pwindicator'>
                                            <div class='bar'></div>
                                            <div class='label'></div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group col-6'>
                                        <label for='password2' class='d-block'>Confirmation Mot de Passe</label>
                                        <input id='password2' type='password' class='form-control' name='password-confirm'>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary btn-lg btn-block'>
                  S'enregistrer
                </button>
                                </div>
                            </form>
                        </div>
                        <div class='mb-4 text-muted text-center'>
                            Déjà enregistré ?<a href='accueil.php'> Se connecter</a>
                        </div>
                   ";

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
        $form = "
                        <h4>Cet utilisateur existe déjà ! <br/>Veuillez  renseigner un autre mail</h4>
                            <div class='card-body'>
                                <form method='POST' >
                                    <div class='row'>
                                        <div class='form-group col-6'>
                                            <label for='frist_name'>Prénom</label>
                                            <input id='frist_name' type='text' class='form-control' name='prenom' autofocus>
                                        </div>
                                        <div class='form-group col-6'>
                                            <label for='last_name'>Nom</label>
                                            <input id='last_name' type='text' class='form-control' name='nom'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='email'>Email</label>
                                        <input id='email' type='email' class='form-control' name='email'>
                                        <div class='invalid-feedback'>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='form-group col-6'>
                                            <label for='password' class='d-block'>Password</label>
                                            <input id='password' type='password' class='form-control pwstrength' data-indicator='pwindicator' name='password'>
                                            <div id='pwindicator' class='pwindicator'>
                                                <div class='bar'></div>
                                                <div class='label'></div>
                                            </div>
                                        </div>
                                        <div class='form-group col-6'>
                                            <label for='password2' class='d-block'>Password Confirmation</label>
                                            <input id='password2' type='password' class='form-control' name='password-confirm'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-primary btn-lg btn-block'>
                      S'enregistrer
                    </button>
                                    </div>
                                </form>
                            </div>
                            <div class='mb-4 text-muted text-center'>
                                Déjà enregistré ?<a href='accueil.php'> Se connecter</a>
                            </div>";
        echo $form;
    }
    if ((isset($_POST['nom']) && $_POST['nom'] != '') && (isset($_POST['prenom']) && $_POST['prenom'] != '') && (isset($_POST['password']) && $_POST['password'] != '') && (isset($_POST['email']) && $_POST['email'] != '') && ($_POST['password'] == $_POST['password-confirm']) && (isset($_POST['password-confirm']) && $_POST['password-confirm'] != '')) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['password'];
        $email = $_POST['email'];
        $user = "{$_POST['nom']} {$_POST['prenom']}";
        $_SESSION['username'] = $user;
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['mail'] = $email;
        function valid($pdo, $mdp, $nom, $prenom, $email)
        {
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
                           
                            <div class='card-body'>
                                <form method='POST'>
                                    <div class='row'>
                                        <div class='form-group col-6'>
                                            <label for='frist_name'>Prénom</label>
                                            <input id='frist_name' type='text' class='form-control' name='prenom' autofocus>
                                        </div>
                                        <div class='form-group col-6'>
                                            <label for='last_name'>Nom</label>
                                            <input id='last_name' type='text' class='form-control' name='nom'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='email'>Email</label>
                                        <input id='email' type='email' class='form-control' name='email'>
                                        <div class='invalid-feedback'>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='form-group col-6'>
                                            <label for='password' class='d-block'>Password</label>
                                            <input id='password' type='password' class='form-control pwstrength' data-indicator='pwindicator' name='password'>
                                            <div id='pwindicator' class='pwindicator'>
                                                <div class='bar'></div>
                                                <div class='label'></div>
                                            </div>
                                        </div>
                                        <div class='form-group col-6'>
                                            <label for='password2' class='d-block'>Password Confirmation</label>
                                            <input id='password2' type='password' class='form-control' name='password-confirm'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-primary btn-lg btn-block'>
                      S'enregistrer
                    </button>
                                    </div>
                                </form>
                            </div>
                            <div class='mb-4 text-muted text-center'>
                                Déjà enregistré ?<a href='accueil.php'> Se connecter</a>
                            </div>
                        ";
        echo $form;
    } else {
        echo $form;
    }
    ?>
</body>

</html>