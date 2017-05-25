<?php
    //On démarre la session
    session_set_cookie_params(3600); 
    session_start();
 
    header("Content-Type: text/html;charset=utf-8");   
					
    if(!isset($_GET['do']))
    {
        include 'Controleurs/accueil.php';
    }
    else 
    {
        switch($_GET['do'])
        {
            case 'connexionInscription':
            {
                include("Controleurs/connexionInscription.php");
                break;
            }
                
            case 'deguster':
            {
                include("Controleurs/deguster.php");
                break;
            }
                
            case 'recettes':
            {
                include("Controleurs/recettes.php");
                break;
            }
                
            case 'proposer':
            {
                include("Controleurs/proposer.php");
                break;
            }
                
            case 'annonce':
            {
                include("Controleurs/annonce.php");
                break;
            }
                
            case 'recetteInfos':
            {
                include("Controleurs/recetteInfos.php");
                break;
            }
             
            case 'deconnection':
            {
                include("Controleurs/deconnection.php");
                break;
            }  
     

        }

    }   

