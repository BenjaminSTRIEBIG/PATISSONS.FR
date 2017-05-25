<?php
    function degToRad($val)
    {
        return ($val*M_PI/180);
    }
    
    function calculeDistance($latAD, $lonAD, $latBD, $lonBD)
    {
        $rayon = 6367445;
        
        $latA = degToRad($latAD);
        $lonA = degToRad($lonAD);
        $latB = degToRad($latBD);
        $lonB = degToRad($lonAD);
        
        $result= $rayon * acos(sin($latA)*sin($latB)+cos($latA)*cos($latB)*cos($lonA-$lonB));
        
        return $result;
    }

    
?>