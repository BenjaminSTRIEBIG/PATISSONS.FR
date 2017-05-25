<?php include('calculGeo.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/stylesDeguster.css" rel="stylesheet">
        <title>PATISSON</title>
        
    </head>

        <body>

            <?php include('header.php') ?>
            
            <div id="rchBarre">
                <form id="formulaire" action="index.php?do=deguster&rch=true" method="post">
                    <input type="search" name="rchPatisserie" placeholder="Macarons...">
                    <input type="submit" value="Rechercher !">
                </form>
                <br/><br/>
            </div>
            
            <?php
                foreach($result as $unResultat)
                {
            ?>
                <article>
                    <div class="wrapperAnnonces">
                        <a href="index.php?do=annonce&num=<?php echo $unResultat['idAnnonce']; ?>"><div class="annoncesDiv">
                            <div id="wrapperAnnoncesImg">
                                <img src="AnnoncesPhotos/<?php echo $unResultat['photo1Annonce']; ?>" width="220px">
                            </div>
                            <div id="wrapperAnnoncesTxt">
                                <h3><?php echo $unResultat['titreAnnonce']; ?></h3>
                                <br/><br/>
                                <h4><?php echo $unResultat['prixAnnonce']; ?>€ /pièce</h4>
                                <br/>
                                <h4>Conditionnement : <?php echo $unResultat['lotAnnonce']; ?> pièce(s)</h4>
                                <br/>
                                <h4>Disponibilité : <?php echo $unResultat['qteAnnonce']; ?></h4>
                                <br/>
                                <?php
                                    $resultatDistance = calculeDistance($positionLat, $positionLong, $unResultat['latUtilisateur'] , $unResultat['longUtilisateur']);

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
                                <h4>Distance : <?php echo  $resultatDistance ?></h4>
                                </div> 
                        </div></a>
                    </div>
                </article>  
                    
                    
            <?php    
                    
                }
            ?>
            
            <br/>
        
        </body>
</html>