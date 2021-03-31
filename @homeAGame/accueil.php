<!doctype html>
<html lang="fr"> 
	<head >
		<meta charset="utf-8" />
        <title>@ccueil</title>
        <link rel="stylesheet" href="./Assets/CSS/Accueil.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    </head>
    <header>
        <h1 class="title">@ HOME A GAME </h1>
		<div class="topnav">
			<a class="active" href="#Accueil">Home</a>
			<a href="./about.php">A Propos</a>
			<a href="./connexion.php" >Se connecter</a>
			<a href="./Enregistrement.php" >Créer un compte</a>
		  </div>
    </header>
	<body>
		<br/>
		<br/>
		<a class="lien" href="classement.php"><p> Classement général </p> </a>
		<a class="lien" href="article.php"><p> Article  </p> </a>

<?php if (isset($_POST["email"]) && isset($_POST["mdp"])): ?>
		<p>Welcome <strong><?php echo $_POST['email']; ?></strong></p>
		<p><a href="Accueil.php?logout='1'" style="color: red;">Se déconnecter</a></p>
		<?php endif ?>

		
        
        
    </body>
</html> 