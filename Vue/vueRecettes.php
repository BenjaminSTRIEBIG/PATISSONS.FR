<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/stylesRecettes.css" rel="stylesheet">
        <title>PATISSON</title>
        
    </head>

        <body>
            <?php include('header.php') ?>
            
            <div id="rchBarre">
                <form id="formulaire" action="index.php?do=recettes&rch=true" method="post">
                    <input type="search" name="rchPatisserie" placeholder="Macarons...">
                    <input type="submit" value="Rechercher !">
                </form>
                <br/><br/>
            </div>
            
             <?php
         
                foreach($result as $uneRecette)
                {
                    ?>
                        <article>
                            <div class="wrapper">
                                    <a href="index.php?do=recetteInfos&num=<?php echo $uneRecette['idRecette']; ?>">
                                    <div class="recettes">
                                        <img src="RecettesPhotos/<?php echo $uneRecette['photo1Recette']; ?>" id="imgRec">
                                    <div class="infosRecette">
                                        <label> &nbsp; Cout recette : <?php echo $uneRecette['coutRecette']; ?> €</label>
                                        <br/>
                                        <label> &nbsp; Difficulté : <?php echo $uneRecette['difficulteRecette']; ?></label>
                                        <br/>
                                        <label> &nbsp; Note : </label>
                                        <?php 
                                            if($uneRecette['noteRecette']==1)
                                            {
                                                echo '<img src="Images/etoiles1.png" width="100px" id="imgNote">';
                                            }
                                            else if($uneRecette['noteRecette']==2)
                                            {
                                                echo '<img src="Images/etoiles2.png" width="100px" id="imgNote">';
                                            }
                                            else if($uneRecette['noteRecette']==3)
                                            {
                                                echo '<img src="Images/etoiles3.png" width="100px" id="imgNote">';
                                            }
                                            else if($uneRecette['noteRecette']==4)
                                            {
                                                echo '<img src="Images/etoiles4.png" width="100px" id="imgNote">';
                                            }
                                            else
                                            {
                                                echo '<img src="Images/etoiles5.png" width="100px" id="imgNote">';
                                            }
                                        ?>
                                    </div>
                                    <div class="nomRecette" style="background-color:<?php echo $uneRecette['couleurRecette'] ?>;">
                                        <label><?php echo $uneRecette['titreRecette']; ?></label>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </article>
                    <?php            
                }
                ?>
                    
            
        </body>
</html>