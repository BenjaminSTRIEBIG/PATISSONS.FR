<?php include('header.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="Styles/styles.css" rel="stylesheet">
        <title>PATISSON</title>
        
        
        <!--Localisation de l'utilisateur-->
        <!-- Inclusion de l'API Google MAPS -->
		<!-- Le paramètre "sensor" indique si cette application utilise détecteur pour déterminer la position de l'utilisateur -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCKUpvuPjzqke7B_M6ggj3fGKPhdupVYVI&exp&sensor=false&libraries=places"></script>
		<script type="text/javascript">
            
			/*function initialiser() {
				var latlng = new google.maps.LatLng(40.579400,7.7519);
				//objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
				//de définir des options d'affichage de notre carte
				var options = {
					center: latlng,
					zoom: 13,
                    disableDoubleClickZoom:true, //desactive zoom par double-click
                    draggable:false, //desactive la possibilitee de faire glisser la map
                    scrollwheel:false, //desactive le zoom par scroll
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
                */
            
                if(navigator.geolocation) {
                  // L'API est disponible
                } else {
                  // Pas de support, proposer une alternative ?
                }

        </script>
        
        <?php 
        echo
        '<script type="text/javascript">
                function initCarte(position){
                    var infopos = "Position déterminée :\n";
                    infopos += "Latitude : "+position.coords.latitude+"\n";
                    infopos += "Longitude: "+position.coords.longitude+"\n";
                    infopos += "Altitude : "+position.coords.altitude +"\n";
                    infopos += "Vitesse  : "+position.coords.speed +"\n";
                    document.getElementById("carte").innerHTML = infopos;
                    
                      // création de la carte
                      var oMap = new google.maps.Map( document.getElementById("carte"),{
                        "center" : new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                        "zoom" : 12,
                        //"zoomControl" : false,             // supprime licône de contrôle du zoom  
                        //"scrollwheel" : false,             // désactive le zoom avec la molette de la souris 
                        "disableDoubleClickZoom" : true    // désactive le zoom sur le double-clic
                        });
                    
                        
                                              // création de l objet option
                     /* var markerOption = {
                        "icon": "macaron.jpg",
                        "position" : new google.maps.LatLng(47.9076904,7.2039401000000005), // position d ancrage du marker sur la carte
                        "map" : oMap,                                              // l objet carte sur lequel est affiché le marker
                        title:"MACARONS CHCOLAT BLANC",
                        animation: google.maps.Animation.DROP  
                      };
                      // création du marker

                      var oMarker = new google.maps.Marker( markerOption);*/
                    
                      ';
                    
                    
        
                    foreach($positionAnnonce as $unResultat)
                        {
                        echo'
                            
                                  // creation de l objet option
                                  var markerOption = {
                                    //"icon": "AnnoncesPhotos/'; echo $unResultat['photo1Annonce']; echo'",
                                    "position" : new google.maps.LatLng('; echo $unResultat['latUtilisateur']; echo','; echo $unResultat['longUtilisateur']; echo'),
                                    "map" : oMap,
                                    "url" : "/index.php?do=annonce&num='; echo $unResultat['idAnnonce']; echo'",  /*/PATISSON_BTS en localhost*/
                                    title:"'; echo $unResultat['titreAnnonce']; echo'",
                                    animation: google.maps.Animation.DROP  
                                
                                  };
                                  // création du marker
                                  
                                  var oMarker = new google.maps.Marker(markerOption);
                                  
                                google.maps.event.addListener(oMarker, "click", function() {
                                window.location.href = this.url;
                                });
                            
                            ';
                        }
                
                
        
            
                    
                    
                    echo'
                    
                    }
                    // init lorsque la page est chargée
                    google.maps.event.addDomListener( window, "load", initCarte);
            
            
            if(navigator.geolocation)
            navigator.geolocation.getCurrentPosition(initCarte);
            
            
				
                /*
				//constructeur de la carte qui prend en paramêtre le conteneur HTML
				//dans lequel la carte doit s afficher et les options
				var carte = new google.maps.Map(document.getElementById("carte"), options);
			}*/
		</script>
        <script>
            /*function maPosition(position) {

                // Un nouvel objet LatLng pour Google Maps avec les paramètres de position
                latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                // Ajout d un marqueur à la position trouvée
                var marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title:"Vous êtes ici"
                });

                // Permet de centrer la carte sur la position latlng
                carte.panTo(latlng);

            }*/
        </script>
        ';
        ?>
        

    </head>

    <!--<body onload="initialiser()">-->
        <body>
            
        
        <div class ="wrapper">
            <div id="comments">
                <div id="carteMap">
                    <!--<form id="rechercheCarte">
                        <input type="text" id="RchVille" placeholder="Ville">
                        <input type="text" id="RchCP" placeholder="CP">
                        <input type="range" max="99" min="1" step="0" id="RchSlider">
                        <span id="rchSliderValue"></span>
                        <!--<span id="slideMin"></span><span id="slideMax"></span>-->
                       <!-- <input type="submit" id="submitRch" value="Search !">
                    </form>-->
                    <script>
                        var formRechercheCarte=document.getElementById("rechercheCarte")
                        var rchVille=document.getElementById("RchVille")
                        var rchSlider=document.getElementById("RchSlider")
                        var rchSliderValue=document.getElementById("rchSliderValue")
                        /*formRechercheCarte.addEventListener("submit",function(e){
                            if(rchVille.value==""){
                                alert("tu n'as pas rentré la ville")
                                e.preventDefault()
                            }
                        })*/
                        /*rchSlider.addEventListener("input",function(){
                            rchSliderValue.innerText=rchSlider.value+" km";
                        })
                        rchSliderValue.innerText=rchSlider.value+" km"*/

                       /* document.getElementById("slideMin").innerText=rchSlider.getAttribute("min")
                        document.getElementById("slideMax").innerText=rchSlider.getAttribute("max")*/
                    </script>
                    
                    
                    
                    <div id="carte" style="width:100%; height:100%"> <!--536px-->
                    </div>
                    
                    
                     
                </div>
                <div id="comment_1">
                    <h1>DEGUSTEZ DES PATISSERIES !</h1>
                    <h2>GRACE A PATISSONS :</h2><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Dégustez proche de chez vous !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Dégustez du fait maison !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Participez a la communauté !</span></h3><br/>
                </div>
                <div id="comment_2">
                    <h1>PARTAGEZ VOS PATISSERIES !</h1>
                    <h2>Faites vous plaisir...</h2>
                    <h2>Partagez !</h2>
                    <h2>GRACE A PATISSONS :</h2><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Partagez vos idées !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Faites découvrir vos créations !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Compensez vos dépenses !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Vendez près de chez vous !</span></h3><br/>
                    <h3><span class="commentPoint">*</span><span class="commentPink"> Ne gaspillez plus !</span></h3><br/>
                </div>
            </div>
        </div>
           
            
        <footer>
            <div class="wrapper">

            </div>
        </footer>
        
    </body>
    
</html>