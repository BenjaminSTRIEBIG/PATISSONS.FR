<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
    <link rel="stylesheet" href="Styles/connexionStyle.css" type="text/css" media="screen" />
<body>
    <div id="header">
        <a href="index.php"><img src="Images/logoMenu.png" width="300px"></a>
        <div id="loginSwitch">
            <div id="connexionSwitch" onclick="changeLogConnexion()">
                Connexion
            </div>
            <div id="inscriptionSwitch" onclick="changeLogInscription()">
                Inscription
            </div>
        </div>
    </div>
    
    <form id="formulaire" action="index.php?do=connexionInscription&con=true" method="post"> <!-- formaulaire connexion -->
        <div id="formName">
            Connexion
        </div>
        <div id="pEmail">
            Entrez votre adresse e-mail*
        </div>
        <div id="logEmail">
            <img src="Images/enveloppeCo.png" width="42px" id="enveloppeCo">
            <input type="email" name="logEmail" placeholder="Adresse E-mail">
        </div>
        
        <div id="pMdp">
            Entrez votre mot de passe*
        </div>
        <div id="logMdp">
            <img src="Images/passCo.png" width="42px" id="enveloppeCo">
            <input type="password" name="logPass" placeholder="Mot de passe">
        </div>
        
        <br/>
        
        <input type="submit" value="Connexion" id="submitLogin" align="left">
        
        <br/>
        
        <div id="mdpSave">
            <input type="checkbox" id="saveMdpOrNot">
            <label for="saveMdpOrNot">Rester Connecté</label>
        </div>
        
        <div id="mdpPerdu">
            Mot de Passe Perdu
        </div>
    </form> <!-- Fin formaulaire connexion -->
    
     <form id="formulaireInscr" action="index.php?do=connexionInscription&ins=true" method="post"> <!-- formaulaire inscription --> 
         <div id="colone1">
            <input type="text" name="nom"  id="nom" placeholder="Nom de famille" onchange="verifSubmit(this.name)">
            <br/>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" onchange="verifSubmit(this.name)">
            <br/>
            <input type="email" name="email" id="email" placeholder="Votre adresse email" onchange="verifSubmit(this.name)">
            <br/>
            <input type="password" name="mdp1" id="mdp1" placeholder="Mot de passe" onchange="verifSubmit(this.name)">
            <br/>
            <input type="password" name="mdp2" id="mdp2" placeholder="Confirmez votre mot de passe" onchange="verifSubmit(this.name)">
            <br/>
            <label>Date de naissance :</label>
             <select date-day="naissanceDate" name="naissanceDay"></select>
             <select date-month="naissanceDate" month-language="fr" name="naissanceMonth"></select>
             <select date-year="naissanceDate" name="naissanceYear"></select>
            <br/>
            <input type="radio" name="sexe" id="h" value="0" checked="true">
            <label for="h">Homme</label>
            <input type="radio" name="sexe" id="f" value="1">
            <label for="f">Femme</label>
            
         </div>
         
         <div class="ligne_verticale" ></div>
         
         <div id="colone2">
            <input type="text" name="username" id="username" placeholder="Identifiant" onchange="verifSubmit(this.name)">
            <br/>
            <label>Intéressé par :</label>
            <input type="checkbox" name="interChk1" id="a" value="0">
            <label for="a">Achat</label>
            <input type="checkbox" name="interChk2" id="v" value="1">
            <label for="v">Vente</label>
            <br/>
            <input type="text" name="adresse1" id="adresse1" placeholder="Rue" onchange="verifSubmit(this.name)">
            <br/>
            <input type="text" name="adresse3" id="adresse3" placeholder="Code" onchange="verifSubmit(this.name)">
            <input type="text" name="adresse2" id="adresse2" placeholder="Ville" onchange="verifSubmit(this.name)">
            <br/>
            <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="tel" id="tel" placeholder="Tel" onchange="verifSubmit(this.name)">
            <br/><br/><br/>
            <input type="submit" name="sub2" id="sub2" value="Inscription" >
         </div>
    </form> <!-- fin formulaire d'inscription -->
    
    
    <footer>
            <div class="wrapper">

            </div>
    </footer>
            <script type="text/javascript" src="Script/date.js"></script>
</body>
</html>

<script type="text/javascript">
    
    function changeLogConnexion()
    {
        document.getElementById('connexionSwitch').style.backgroundColor="rgba(218,63,54, 0.2)";
        document.getElementById('inscriptionSwitch').style.backgroundColor="rgba(218,63,54, 1)";
        
        document.getElementById('formulaire').style.display="block";
        document.getElementById('formulaireInscr').style.display="none";
    }
    
    function changeLogInscription()
    {
        document.getElementById('inscriptionSwitch').style.backgroundColor="rgba(218,63,54, 0.2)";
        document.getElementById('connexionSwitch').style.backgroundColor="rgba(218,63,54, 1)";
        
        document.getElementById('formulaire').style.display="none";
        document.getElementById('formulaireInscr').style.display="block";
    }
    
    
    function verifSubmit(elementName)
    {
        if(document.getElementById(elementName).value.length<=2)
        {
            document.getElementById(elementName).style.backgroundColor="red"
        }
        else if(document.getElementById(elementName).value.length>2)
        {
            document.getElementById(elementName).style.backgroundColor="green"
        }
    }
    
    
        function verifEmailSubmit(elementName)
    {
        if(document.getElementById(elementName).value.length<=2)
        {
            document.getElementById(elementName).style.backgroundColor="red"
        }
        else if(document.getElementById(elementName).value.length>2)
        {
            document.getElementById(elementName).style.backgroundColor="green"
        }
    }
    
    
    
</script>