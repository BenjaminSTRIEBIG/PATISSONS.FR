<?php

    class accueilMap
    {
        
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
        
        
        public function getCoordMap()
        {
            $reqSQL = "SELECT * FROM annonce AS a, utilisateur AS u WHERE a.editeurAnnonce = u.idUtilisateur AND validiteAnnonce=1";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->execute();
            
            return $resultSQL;
        }
        
        
    }

?>  