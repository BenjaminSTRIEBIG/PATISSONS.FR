<?php

    if(isset($_SESSION['login'])) //Si l'utilisateur est connecté il accède a la page
    {
        require('Modele/ModeleDeguster.php');
        
        $ta= new degustation();
        
        $positionLong=$ta->getUserPositionLong();
        $positionLat=$ta->getUserPositionLat();
        
        if(isset($_GET['rch'])) //Si l'utilisateur lance une recherche
        {
            $result=$ta->rechercheFiltre();
        }
        else  //Affiche toutes les annonces sans filtrage
        {
            $result = $ta->rechercheAll();
        }
        
        include("Vue/vueDeguster.php");
          
    }
    else
    {
        include('Vue/vueConnexion.php');
    }


