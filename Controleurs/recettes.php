<?php

    if(isset($_SESSION['login'])) //Si l'utilisateur est connecté il accède a la page
    {
        require('Modele/ModeleRecettes.php');
        
         $ta= new recettes();
        
            if(isset($_GET['rch'])) //Si l'utilisateur lance une recherche
            {
                $result=$ta->rechercheFiltre();
            }
            else  //Affiche toutes les annonces sans filtrage
            {
                $result = $ta->rechercheAll();
            }
        
        include("Vue/vueRecettes.php");
          
    }
    else
    {
        include('Vue/vueConnexion.php');
    }
