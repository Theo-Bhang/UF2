<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['mail'])) {
  header('Location: 404.php');
  exit();
} else {


?>
  <!doctype html>
  <html>

  <head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./Assets/CSS/Profil.css" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Profil</title>
  </head>

  <body>
  <header>
        <h1 class="title">Mon profil : </h1>
        <div class="topnav">
            <a href="Accueil_connecté.php">Home</a>
            <a href="#">A Propos</a>
            <a href="mission.php">Mission</a>
            <a class="active" href="profil.php">Mon Compte</a>
            <a href="deco.php">Se déconnecter</a>
        </div>
    </header>
  
    <?php
    $db_params = parse_ini_file('db.ini', true);
    $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);

    $mail = $_SESSION['mail'];
    $rqt = <<<SQL
                SELECT id
                FROM User
                WHERE email = :mail
                SQL;
    $stmt = $pdo->prepare($rqt);
    $stmt->execute(['mail' => $mail]);
    $array = $stmt->fetchAll();
    $id = $array[0]['id'];

    if (isset($_POST['nom'])) {
      $change = $_POST['nom'];

      $sql = "UPDATE `User` SET `nom`=? WHERE id=?";
      $pdo->prepare($sql)->execute([$change, $id]);
      $_SESSION['nom'] = $change;
    }
    if (isset($_POST['prenom'])) {
      $change = $_POST['prenom'];

      $sql = "UPDATE `User` SET `prenom`=? WHERE id=?";
      $pdo->prepare($sql)->execute([$change, $id]);
      $_SESSION['prenom'] = $change;
    }

    ?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-body">
              <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                 
                  <div class="card">
                    <div class="card-header">
                      <h4>Coordonées :</h4>
                    </div>
                    <div class="card-body">
                      <div class="py-4">

                        <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $_SESSION['mail'] ?>
                          </span>
                        </p>


                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-12 col-lg-8">
                  <div class="card">
                    <div class="padding-20">
                      <div class="tab-content tab-bordered" id="myTab3Content">

                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                       
                          <form method="post" class="needs-validation">
                            <div class="card-header">
                              <h4>Changer Prénom</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="form-group col-md-6 col-12">
                                  <label>Prénom</label>
                                  <input type=text class="form-control" name="prenom" placeholder='<?php echo $_SESSION['prenom'] ?>' />
                                  
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <button class="btn btn-primary">Changer</button>
                              </div>
                          </form>
                          <form method="post" class="needs-validation">
                            <div class="card-header">
                              <h4>Changer Nom</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">

                                <div class="form-group col-md-6 col-12">
                                  <label>Nom</label>
                                  <input type=text class="form-control" name="nom" placeholder='<?php echo $_SESSION['nom'] ?>' />
                                  
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <button class="btn btn-primary">Changer</button>
                              </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



        </div>
  </body>

  </html>
<?php
}
?>