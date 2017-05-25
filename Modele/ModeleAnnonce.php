<?php
    class annonce{
        
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
        
        public function getAnnonceInfos()
        {
            $reqSQL = "SELECT * FROM annonce AS a, utilisateur AS u WHERE a.editeurAnnonce = u.idUtilisateur AND validiteAnnonce=1 AND idAnnonce = :numAnnonce";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->bindValue(":numAnnonce",$_GET['num'],PDO::PARAM_STR);
            $resultSQL->execute();
            
            return $resultSQL;
        }
        
        public function getUserPositionLong()
        {
            $reqSQL = "SELECT longUtilisateur FROM utilisateur WHERE emailUtilisateur=:emailSession";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->bindValue(":emailSession",$_SESSION['login'],PDO::PARAM_STR);
            $resultSQL->execute();
            
            foreach($resultSQL as $unResult)
            {
              $resultSQLLong = $unResult['longUtilisateur'];  
            }
            
            return $resultSQLLong;
        }
        
        public function getUserPositionLat()
        {
            $reqSQL = "SELECT latUtilisateur FROM utilisateur WHERE emailUtilisateur=:emailSession";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->bindValue(":emailSession",$_SESSION['login'],PDO::PARAM_STR);
            $resultSQL->execute();
            
             foreach($resultSQL as $unResult)
            {
              $resultSQLLat = $unResult['latUtilisateur'];  
            }
            
            return $resultSQLLat;
        }
            
    }
?>