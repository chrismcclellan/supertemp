<?php

/**
 * Returns pretty counts for thousands & millions
 */
function pretty_number($num) {

    if ($num >= 1e6) {
        $num = round($num / 1e6, 2) + "M";
    } else if ($num >= 1e3) {
        $num = round($num / 1e3, 1) + "k";
    }

    return $num;
}
