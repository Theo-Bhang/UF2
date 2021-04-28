<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['mail'])){
        unset($_SESSION['username']);
        unset($_SESSION['nom']); 
        unset($_SESSION['prenom']);  
        unset($_SESSION['mail']);  
        session_destroy();
  
    }
    if(isset($_SESSION['nom'])==false && isset($_SESSION['mail'])==false)
    {
        header('Location: ../Accueil/accueil.php');
        exit();
          
    }else{
        echo 'ERREUR';
    }
