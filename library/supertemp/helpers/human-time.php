<?php

/**
 * Returns human friendly time *since*
 */
function human_time($time) {

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'Yr',
        2592000 => 'Mo',
        604800 => 'Wk',
        86400 => 'Day',
        3600 => 'Hr',
        60 => 'Min',
        1 => 'Sec'
    );

    foreach ($tokens as $unit => $text) {

        if ($time < $unit) continue;

        $numberOfUnits = floor($time / $unit);
        
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
