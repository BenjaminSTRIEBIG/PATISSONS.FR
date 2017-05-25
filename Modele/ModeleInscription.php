<?php
    class ConnexionInscription
    {
        //Connexion via singletton
        private $cx;
		
		public function __construct()
        {
			require_once("ConnexionBDD.php");
			$this->cx = Connexion::getInstance();
        }
        
        //fonction d inscription
        public function inscription(){
            
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $email=$_POST['email'];
            $identifiant=$_POST['username'];
            $sexe=$_POST['sexe'];
            $interet=$_POST['interChk1'];
            $interet2=$_POST['interChk2'];
            $rue=$_POST['adresse1'];
            $codePostal=$_POST['adresse3'];
            $ville=$_POST['adresse2'];
            $tel=$_POST['tel'];
            $pass=md5($_POST['mdp1']);
            $dateND=$_POST['naissanceDay'];
            $dateNM=$_POST['naissanceMonth'];
            $dateNY=$_POST['naissanceYear'];
            $dateNaiss=$dateNY.'-'.$dateNM.'-'.$dateND;
            $dateInscr=date('Y-m-d');
            $locLat;
            $locLong;
            
            /*On intérroge GeoCodding pour connaitre la position LAT LONG en fonction de l'adresse*/
            $geocoder = "https://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false&key=AIzaSyCKUpvuPjzqke7B_M6ggj3fGKPhdupVYVI";
            
           // $adresseUser = $rue.' '.$codePostal.' '.$ville;
            $adresseUser = $ville;
            
            //On envoie la requete
            $query = sprintf($geocoder, urlencode($adresseUser));
            
            //var_dump($query);
            
            $result = json_decode(file_get_contents($query));
            $json = $result->results[0];
            
            $locLat = (string) $json->geometry->location->lat;
            $locLong = (string) $json->geometry->location->lng;
            
            
            /**************************************************************************************/
            
            if($interet==0 && $interet2==1)
            {
                $interet=2;
            }
            else if($interet==0 && $interet2==null)
            {
                $interet=0;
            }
            else
            {
                $interet=1;
            }
            
            
            //On vérifie que l'utilisateur n'est pas déja inscrit
            $sql = "SELECT idUtilisateur 
                    FROM utilisateur 
                    WHERE emailUtilisateur = '".$_POST["email"]."' 
                    OR identifiantUtilisateur = '".$_POST["username"]."' 
                   ";
            $verifRequete = Connexion::getInstance()->query($sql);
            $verifRequete->execute();
            
            $existe=false;
            if($user=$verifRequete->fetch(PDO::FETCH_OBJ))
            {
                $existe=true;
            }
            
            //Si non, on l'inscrit
            if(!$existe)
            {
                $inscriptionRequete ="INSERT INTO utilisateur(identifiantUtilisateur, nomUtilisateur, PrenomUtilisateur, emailUtilisateur, telUtilisateur, passUtilisateur, rueUtilisateur, cpUtilisateur, villeUtilisateur, interetUtilisateur, sexeUtilisateur, dateInscriptionUtilisateur, dateNaissanceUtilisateur, longUtilisateur,latUtilisateur)
                                      VALUES(:username, :nom, :prenom, :email, :tel, :mdp1, :adresse1, :adresse3, :adresse2, :interChk, :sexe, :dateInscr, :dateNaiss, :long, :lat)
                                     ";
                
                
                $rqtInscription=Connexion::getInstance()->prepare($inscriptionRequete);

                $rqtInscription->bindValue(":username",$identifiant,PDO::PARAM_STR);
                $rqtInscription->bindValue(":nom",$nom,PDO::PARAM_STR);
                $rqtInscription->bindValue(":prenom",$prenom,PDO::PARAM_STR);
                $rqtInscription->bindValue(":email",$email,PDO::PARAM_STR);
                $rqtInscription->bindValue(":tel",$tel,PDO::PARAM_STR);
                $rqtInscription->bindValue(":mdp1",$pass,PDO::PARAM_STR);
                $rqtInscription->bindValue(":adresse1",$rue,PDO::PARAM_STR);
                $rqtInscription->bindValue(":adresse3",$codePostal,PDO::PARAM_STR);
                $rqtInscription->bindValue(":adresse2",$ville,PDO::PARAM_STR);
                $rqtInscription->bindValue(":interChk",$interet,PDO::PARAM_STR);
                $rqtInscription->bindValue(":sexe",$sexe,PDO::PARAM_STR);
                $rqtInscription->bindValue(":dateInscr",$dateInscr,PDO::PARAM_STR);
                $rqtInscription->bindValue(":dateNaiss",$dateNaiss,PDO::PARAM_STR);
                
                $rqtInscription->bindValue(":long",$locLong,PDO::PARAM_STR);
                $rqtInscription->bindValue(":lat",$locLat,PDO::PARAM_STR);
                

                $rqtInscription->execute();
            }
            
            return(!$existe);
            
        }
        
    }