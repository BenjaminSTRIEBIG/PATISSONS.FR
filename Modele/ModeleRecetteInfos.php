<?php
    class recetteInfos{
        
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
        
        public function getRecetteInfos()
        {
            $reqSQL = "SELECT * FROM recette WHERE idRecette = :numRecette";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->bindValue(":numRecette",$_GET['num'],PDO::PARAM_STR);
            $resultSQL->execute();
            
            return $resultSQL;
        }   
    }
?>