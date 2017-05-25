<?php

    if(isset($_SESSION['login']))
    {
        include("Vue/vueAcceuil.php"); 
    }
    else
    {
        if(isset($_GET['ins']))
        {
            require('Modele/ModeleInscription.php');

            $ta= new ConnexionInscription();

            $reussi=$ta->inscription();

            if($reussi)
            {
                //include('Controleurs/accueil.php');
                header("Location:index.php");
                echo"<script> alert ('Votre inscription a été prise en compte !');</script>";
            }
            else
            {
                include('Vue/vueConnexion.php');
                echo"<script> alert('Email déja présent dans la base de données !');</script>";
            }
        }
        else if(isset($_GET['con']))
        {
            require('Modele/ModeleConnexion.php');
            
            $ta= new Connection();
            
            $Existe=$ta->existe();
            if($Existe==1)
            {
                $uneLigne=$ta->connection();
                //include('Controleurs/accueil.php'); /********/
                header("Location:index.php");
            }
            else
            {
                include('Vue/vueConnexion.php');
                echo"<script> alert('Identifiant ou MDP inccorect !'); </script>";
            }
        }
        else
        {
            include('Vue/vueConnexion.php');
        }
    }


            /*include('Modele/ModeleConnexionInscription.php');
            include('Vue/vueConnexion.php');*/
