<?php

    require('Modele/ModeleAcceuil.php');
      
        $ta= new accueilMap();
        
        $positionAnnonce=$ta->getCoordMap();

    include('Vue/vueAcceuil.php');
?>