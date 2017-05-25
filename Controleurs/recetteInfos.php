<?php

    if(isset($_SESSION['login'])) //Si l'utilisateur est connecté il accède a la page
    {
        require('Modele/ModeleRecetteInfos.php');
        
        $ta= new recetteInfos();
        
        $recetteInfos=$ta->getRecetteInfos();

        
        include("Vue/vueRecetteInfos.php");
          
    }
    else
    {
        include('Vue/vueConnexion.php');
    }
