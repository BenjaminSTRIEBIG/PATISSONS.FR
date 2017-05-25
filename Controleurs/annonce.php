<?php

    if(isset($_SESSION['login'])) //Si l'utilisateur est connecté il accède a la page
    {
        require('Modele/ModeleAnnonce.php');
        
        $ta= new annonce();
        
        $annonceInfos=$ta->getAnnonceInfos();
        $positionLong=$ta->getUserPositionLong();
        $positionLat=$ta->getUserPositionLat();

        
        include("Vue/vueAnnonce.php");
          
    }
    else
    {
        include('Vue/vueConnexion.php');
    }
