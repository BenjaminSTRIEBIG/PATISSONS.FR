<?php

    class recettes
    {
        
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
        
        
        public function rechercheAll()
        {
            $reqSQL = "SELECT * FROM recette";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->execute();
            
            return $resultSQL;
        }
        
        
        public function rechercheFiltre()
        {
            $motRch= $_POST['rchPatisserie'];
            
            if(strlen($motRch)>0)
            {
                $reqSQL = "SELECT * FROM recette WHERE titreRecette LIKE '%".$motRch."%'";
                $resultSQL = Connexion::getInstance()->prepare($reqSQL);
                $resultSQL->execute(); 
            }
            else
            {
                $reqSQL = "SELECT * FROM recette";
                $resultSQL = Connexion::getInstance()->prepare($reqSQL);
                $resultSQL->execute();
            }
            
            
            return $resultSQL;
        }
    }
?>