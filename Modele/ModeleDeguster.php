<?php

    class degustation
    {
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
        
        
        public function rechercheAll()
        {
            $reqSQL = "SELECT * FROM annonce AS a, utilisateur AS u WHERE a.editeurAnnonce = u.idUtilisateur AND validiteAnnonce=1";
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
            $resultSQL->execute();
            
            return $resultSQL;
        }
        
        
        public function rechercheFiltre()
        {
            $motRch= $_POST['rchPatisserie'];
            
            if(strlen($motRch)>0)
            {
                $reqSQL = "SELECT * FROM annonce AS a, utilisateur AS u WHERE a.editeurAnnonce = u.idUtilisateur
                AND a.titreAnnonce LIKE '%".$motRch."%' AND validiteAnnonce=1";
                $resultSQL = Connexion::getInstance()->prepare($reqSQL);
                $resultSQL->execute(); 
            }
            else
            {
                $reqSQL = "SELECT * FROM annonce AS a, utilisateur AS u WHERE a.editeurAnnonce = u.idUtilisateur";
                $resultSQL = Connexion::getInstance()->prepare($reqSQL);
                $resultSQL->execute();
            }
            
            
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