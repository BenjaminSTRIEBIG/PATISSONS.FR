<?php

    function monthToFr($month)
    {
        $monthFr;
        if($month == 1) $monthFr = "Janvier";
        if($month == 2) $monthFr = "F&eacute;vrier";
        if($month == 3) $monthFr = "Mars";
        if($month == 4) $monthFr = "Avril";
        if($month == 5) $monthFr = "Mai";
        if($month == 6) $monthFr = "Juin";
        if($month == 7) $monthFr = "Juillet";
        if($month == 8) $monthFr = "Ao&ucirc;t";
        if($month == 9) $monthFr = "Septembre";
        if($month == 10) $monthFr = "Octobre";
        if($month == 11) $monthFr = "Novembre";
        if($month == 12) $monthFr = "D&eacute;cembre";
        
        $monthFr = ' '.$monthFr;
            
        return $monthFr;
    }

    
?>