<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="biens1.css" />
    <title>Annonces</title>
</head>
<header>
        <h1>Accueil</h1>
		<div class="topnav">
			<a class="active" href="Accueil.php">Home</a>
			<a href="about.html">A Propos</a>
			<a href="contact.html">Contact</a>
			<a href="connection.php" >Se connecter</a>
            <a href="formulaire.html" >Créer un compte</a>
		  </div>
    </header>
<body>
    <?php
        $db_params = parse_ini_file('db.ini', true);
        $pdo = new PDO($db_params['db']['url'], $db_params['db']['user'], $db_params['db']['pass']);
        $rqtville = <<<SQL
        SELECT ville
        FROM biens as b
        GROUP BY ville
        SQL;
        $stmtville = $pdo->prepare($rqtville);
        $stmtville->execute();
        $ville = $stmtville->fetchall(PDO::FETCH_ASSOC);
    ?>
    <form class="formu" method='POST' action='#'>
        <?php
            for($j=0; $j < count($ville);++$j)
            {
                echo"
                <input type='radio' id='{$ville[$j]['ville']}' name='villechoix' value='{$ville[$j]['ville']}'/>
                <label for='{$ville[$j]['ville']}'>     {$ville[$j]['ville']}</label>
                </br>
                ";
            }
        ?>
        </br>
        <input type='submit' value='Choisir'/>
    </form>
    <?php
        if(isset($_POST['villechoix'])){
            $choixville = $_POST['villechoix'];
            $rqt = <<<SQL
            SELECT *
            FROM biens as b
            where ville = '$choixville'
            SQL;
            $stmt = $pdo->prepare($rqt);
            $stmt->execute();
            $allinfos = $stmt->fetchall(PDO::FETCH_ASSOC);
       
            
            
            echo "<h2>Voici la liste des biens près de $choixville : </h2>";
            for($i=0 ; $i < count($allinfos) ; ++$i )
            {
                $type = $allinfos[$i]['type'];
                $cat = $allinfos[$i]['categorie'];
                $sup = $allinfos[$i]['superficie'];
                $des = $allinfos[$i]['descriptions']; 
                $prix = $allinfos[$i]['prix']; 
                $iD = $allinfos[$i]['idLogement'];
                $img = $allinfos[$i]['photo'];
                echo "<form method ='POST' action='bien_details.php'><section id='{$allinfos[$i]['idLogement']}'>";
                echo "<img src='{$img}' />"; 
                echo "<input type='hidden' name='id' value='$iD'/>";
                echo "<p> Type :      $type</p>";
                echo "<p> Categorie :      $cat</p>";
                echo "<p> Superficie :      $sup m²</p>";
                echo "<p> Description :       $des</p>";
                echo "<p> Prix :      $prix € </p>";
                echo "<input type='submit' value ='En savoir plus...'/>";
                echo "</section></form>";
                echo "</br>";
                echo "</br>";
                
            }
            
        }
        
        
        
    ?>
</body>
</html>