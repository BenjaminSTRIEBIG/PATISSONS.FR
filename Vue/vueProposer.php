<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/stylesProposer.css" rel="stylesheet">
        <title>PATISSON</title>
        
    </head>

    <body>

        <?php include('header.php') ?>    
        <form method="post" action="index.php?do=proposer&sub=true" enctype="multipart/form-data">
            <div id="annonce">
                <div id="annonceZone">
                    VOTRE PROPOSITION
                </div>
                <div id="txtZone">
                    <label on="titreAnnonce">Titre de l'annonce </label>
                    <br/>
                    <input type="text" name="titreAnnonce" id="titreAnnonce">
                    <br/><br/>
                    <label on="">Texte de l'annonce </label>
                    <br/>
                    <textarea name="texteAnnoce" id="texteAnnoce"></textarea>
                    <br/><br/>
                    <label on="qteAnnonce">Disponiblité</label>
                    <br/>
                    <select name="qteAnnonce" id="qteAnnonce">
                        <option>Sur demande</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                    <br/><br/>
                    <label on="qteLot">Quantité par lot </label>
                    <br/>
                    <input type="number" name="qteLot" id="qteLot">
                    <br/><br/>
                    <label on="prix">Prix </label>
                    <br/>
                    <input type="number" name="prix" id="prix"> €
                    <br/><br/>
                    <label>PHOTO PRINCIPALE</label>
                    <br/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image1">
                    <br/><br/>
                    <label>PHOTO 2</label>
                    <br/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image2">
                    <br/><br/>
                    <label>PHOTO 3</label>
                    <br/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image3">
                    <br/><br/>
                    <label>PHOTO 4</label>
                    <br/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image4">
                    <br/><br/>
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="PROPOSER !" />
                </div>
            </div>
        </form>
        <br/>
        
    </body>
</html>