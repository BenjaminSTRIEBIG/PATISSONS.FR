<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/stylesRecetteInfos.css" rel="stylesheet">
        <title>PATISSON</title>
        
    </head>

        <body>
            
            <?php include('header.php') ?>
            
            <?php 
                $resultRecetteInfos=$recetteInfos->fetch(PDO::FETCH_ASSOC); 
            ?>
            
            <div id="Annonce">
                <div id="headerAnnonce">
                    ANNONCE
                </div>
                <div id="PhotosAnnonce">
                    <h2><?php echo $resultRecetteInfos['titreRecette']; ?></h2>
                    <br/>
                    <label>Note :</label>
                    <?php 
                                            if($resultRecetteInfos['noteRecette']==1)
                                            {
                                                echo '<img src="Images/etoiles1.png" width="100px" id="imgNote">';
                                            }
                                            else if($resultRecetteInfos['noteRecette']==2)
                                            {
                                                echo '<img src="Images/etoiles2.png" width="100px" id="imgNote">';
                                            }
                                            else if($resultRecetteInfos['noteRecette']==3)
                                            {
                                                echo '<img src="Images/etoiles3.png" width="100px" id="imgNote">';
                                            }
                                            else if($resultRecetteInfos['noteRecette']==4)
                                            {
                                                echo '<img src="Images/etoiles4.png" width="100px" id="imgNote">';
                                            }
                                            else
                                            {
                                                echo '<img src="Images/etoiles5.png" width="100px" id="imgNote">';
                                            }
                                        ?>
                    <br/>
                    <br/>
                    <label>Difficulté : <?php echo $resultRecetteInfos['difficulteRecette']; ?></label>
                    <br/>
                    <br/>
                    <label>Cout moyen : <?php echo $resultRecetteInfos['coutRecette']; ?> €</label>
                    <br/>
                    <br/>
                    <div id="Photo1">
                        <img src="RecettesPhotos/<?php echo $resultRecetteInfos['photo1Recette']; ?> ">
                    </div>
                    <div id="Photo2">
                        <img src="RecettesPhotos/<?php echo $resultRecetteInfos['photo2Recette']; ?> ">
                    </div>
                    <div id="Photo3">
                        <img src="RecettesPhotos/<?php echo $resultRecetteInfos['photo3Recette']; ?> ">
                    </div>
                    <div id="Photo4">
                        <img src="RecettesPhotos/<?php echo $resultRecetteInfos['photo4Recette']; ?> ">
                    </div>
                    <br/>
                    </div>
                    <table class="txtAnnonce">
                        <tr>
                            <td class="orangeTab">Ingredients :</td>
                            <td><?php echo nl2br($resultRecetteInfos['IngredientsRecette']); ?></td>
                        </tr>
                        <tr>
                            <td class="orangeTab">Préparation :</td>
                            <td><?php echo nl2br($resultRecetteInfos['texteRecette']); ?></td>
                        </tr>
                    </table>
            </div>
            <br/>
            
        </body>
</html>