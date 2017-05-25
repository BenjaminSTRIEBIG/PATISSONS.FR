<?php

    if(isset($_SESSION['login'])) //Si l'utilisateur est connecté il accède a la page
    {

        if(isset($_GET['sub']))
        {
            require('Modele/ModeleProposer.php');
        
            $ta= new proposer();
            
            $reussiteRqt=$ta->insertAnnonce();
            
            if($reussiteRqt==0)
            {
                echo"<script> alert ('Un problème est survenu !');</script>";
            }
            else
            {
                header("Location:index.php");
                echo '<script type="text/javascript">';
                echo 'alert("Votre annonce a bien été enregistrée.\nElle sera mise en ligne après vérification.\n\nMerci !");';
                echo '</script>';
            }
        }
        
        include("Vue/vueProposer.php");
          
    }
    else
    {
        include('Vue/vueConnexion.php');
    }
    
?>