<?php
    class proposer
    {
                
        private $cx;
     
        public function __construct()
        {
            require_once("ConnexionBDD.php");
            $this->cx = Connexion::getInstance();
        }
            
        public function insertAnnonce() //retourne 1 si l'annonce est inserree
        {
            $titreAnnonce= $_POST['titreAnnonce'];
            $texteAnnonce= $_POST['texteAnnoce'];
            $qteAnnonce= $_POST['qteAnnonce'];
            $lotAnnonce= $_POST['qteLot'];
            $prixAnnonce= $_POST['prix'];
            
            if(strlen($_FILES['image1']['name'])<1)
            {
                $nomImg1Annonce="";
            }
            else
            {
                $extensionImg1 = pathinfo($_FILES['image1']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
                $nomImg1Annonce= 'J'.date('d').'M'.date('m').'A'.date('Y').'H'.date('H').'M'.date('i').'S'.date('s').'C'.$_SESSION['nro_client'].'R'.'1'.".".$extensionImg1;
            }
            
            if(strlen($_FILES['image2']['name'])<1)
            {
                $nomImg2Annonce="";
            }
            else
            {
                $extensionImg2 = pathinfo($_FILES['image2']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
                $nomImg2Annonce= 'J'.date('d').'M'.date('m').'A'.date('Y').'H'.date('H').'M'.date('i').'S'.date('s').'C'.$_SESSION['nro_client'].'R'.'2'.".".$extensionImg2;
            }
            
            if(strlen($_FILES['image3']['name'])<1)
            {
                $nomImg3Annonce="";
            }
            else
            {
                $extensionImg3 = pathinfo($_FILES['image3']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
                $nomImg3Annonce= 'J'.date('d').'M'.date('m').'A'.date('Y').'H'.date('H').'M'.date('i').'S'.date('s').'C'.$_SESSION['nro_client'].'R'.'3'.".".$extensionImg3;
            }
            
            if(strlen($_FILES['image4']['name'])<1)
            {
                $nomImg4Annonce="";
            }
            else
            {
                $extensionImg4 = pathinfo($_FILES['image4']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
                $nomImg4Annonce= 'J'.date('d').'M'.date('m').'A'.date('Y').'H'.date('H').'M'.date('i').'S'.date('s').'C'.$_SESSION['nro_client'].'R'.'4'.".".$extensionImg4;
            }
            
            $editeurAnnonce= $_SESSION['nro_client'];
            $validiteAnnonce= 0;
            $dateAnnonce= date('Y-m-d');
            
            $reqSQL = "INSERT INTO `annonce` (`idAnnonce`, `titreAnnonce`, `texteAnnonce`, `qteAnnonce`, `lotAnnonce`, `prixAnnonce`, `photo1Annonce`, `photo2Annonce`, `photo3Annonce`, `photo4Annonce`, `editeurAnnonce`, `validiteAnnonce`, `datePublicationAnnonce`) VALUES (NULL, '".$titreAnnonce."', '".$texteAnnonce."', '".$qteAnnonce."', '".$lotAnnonce."', '".$prixAnnonce."', '".$nomImg1Annonce."', '".$nomImg2Annonce."', '".$nomImg3Annonce."', '".$nomImg4Annonce."', '".$editeurAnnonce."', '".$validiteAnnonce."', '".$dateAnnonce."')";
            
            $resultSQL = Connexion::getInstance()->prepare($reqSQL);
                
            $resultSQL->execute();
            
            if($resultSQL->fetch()==false)
            {
                $fonctionne = 1; //Ca a fonctionné
            }
            else
            {
                $fonctionne = 0; //Ca na pas fonctionné
            }
            
            /*On ajoute les images sur le serveur*/
            $extensionImg1 = pathinfo($_FILES['image1']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
            $nomImg1 = "AnnoncesPhotos/".$nomImg1Annonce.".".$extensionImg1;
            $resultatChdir1 = move_uploaded_file($_FILES['image1']['tmp_name'],$nomImg1);
            
            $extensionImg2 = pathinfo($_FILES['image2']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
            $nomImg2 = "AnnoncesPhotos/".$nomImg2Annonce.".".$extensionImg2;
            $resultatChdir2 = move_uploaded_file($_FILES['image2']['tmp_name'],$nomImg2);
            
            $extensionImg3 = pathinfo($_FILES['image3']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
            $nomImg3 = "AnnoncesPhotos/".$nomImg3Annonce.".".$extensionImg3;
            $resultatChdir3 = move_uploaded_file($_FILES['image3']['tmp_name'],$nomImg3);
            
            $extensionImg4 = pathinfo($_FILES['image4']['name'],PATHINFO_EXTENSION); //On récupère l'extension du fichier
            $nomImg4 = "AnnoncesPhotos/".$nomImg4Annonce.".".$extensionImg4;
            $resultatChdir4 = move_uploaded_file($_FILES['image4']['tmp_name'],$nomImg4);

            /*************************************/
            
            return $fonctionne;
        }
            
    }
?>