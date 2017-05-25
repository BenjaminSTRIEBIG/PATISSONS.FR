<?php include('calculGeo.php') ?>
<?php include('dateEnglishToFrench.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/stylesAnnonce.css" rel="stylesheet">
        <title>PATISSON</title>
        
    </head>

        <body>
            
            <?php include('header.php') ?>
            
            <?php 
                $resultAnnonceInfos=$annonceInfos->fetch(PDO::FETCH_ASSOC); 
            ?>
            
            <div id="Annonce">
                <div id="headerAnnonce">
                    ANNONCE
                </div>
                <div id="PhotosAnnonce">
                    <h2><?php echo $resultAnnonceInfos['titreAnnonce']; ?></h2>
                    <br/>
                    <div id="Photo1">
                        <img src="AnnoncesPhotos/<?php echo $resultAnnonceInfos['photo1Annonce']; ?> ">
                    </div>
                    <div id="Photo2">
                        <img src="AnnoncesPhotos/<?php echo $resultAnnonceInfos['photo2Annonce']; ?> ">
                    </div>
                    <div id="Photo3">
                        <img src="AnnoncesPhotos/<?php echo $resultAnnonceInfos['photo3Annonce']; ?> ">
                    </div>
                    <div id="Photo4">
                        <img src="AnnoncesPhotos/<?php echo $resultAnnonceInfos['photo4Annonce']; ?> ">
                    </div>
                    <br/>
                    </div>
                    <div class="txtAnnonceUser">
                       <?php $date = date_create($resultAnnonceInfos['datePublicationAnnonce']); ?>
                        Mise en ligne par <b><?php echo $resultAnnonceInfos['identifiantUtilisateur']; ?></b> le <b><?php echo date_format($date,'d');  echo monthToFr(date_format($date,'n')); ?></b>
                        <br/>
                        Tel : <b><?php echo $resultAnnonceInfos['telUtilisateur']; ?></b>
                        <br/>
                        E-mail : <b><?php echo $resultAnnonceInfos['emailUtilisateur']; ?></b>
                    </div>
                    <table class="txtAnnonce">
                        <tr>
                            <td class="orangeTab">Prix</td>
                            <td><?php echo $resultAnnonceInfos['prixAnnonce']; ?>€</td>
                        </tr>
                        <tr>
                            <td class="orangeTab">Conditionnement :</td>
                            <td><?php echo  $resultAnnonceInfos['lotAnnonce']; ?> Pièce(s)</td>
                        </tr>
                        <tr>
                            <td class="orangeTab">Disponibilité :</td>
                            <td><?php echo  $resultAnnonceInfos['qteAnnonce']; ?></td>
                        </tr>
                        <tr>
                            <?php
                                    $resultatDistance = calculeDistance($positionLat, $positionLong, $resultAnnonceInfos['latUtilisateur'] , $resultAnnonceInfos['longUtilisateur']);

                                    $partieEntiere = intval($resultatDistance/1000);

                                    if($partieEntiere>0)
                                    {
                                        $resultatDistance = $partieEntiere.' Km';
                                    }
                                    else
                                    {
                                        $resultatDistance = $resultatDistance*1000 .' m';
                                    }
                                ?>
                            <td class="orangeTab">Lieu :</td>
                            <td><?php echo $resultAnnonceInfos['villeUtilisateur']; ?> <?php echo $resultAnnonceInfos['cpUtilisateur']; ?> &nbsp;(<?php echo  $resultatDistance ?>)</td>
                        </tr>
                        <tr>
                            <td class="orangeTab">Description :</td>
                            <td><?php echo  nl2br($resultAnnonceInfos['texteAnnonce']); ?></td>
                        </tr>
                    </table>
                
            </div>
            
        </body>
</html>