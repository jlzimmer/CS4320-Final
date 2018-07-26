<?php
    /*  Accepts an input hex value ($color) and a maximum random offset value for saturation ($offset), 
    *   then calculates a three-color scheme based on the desired pattern identified by the "mode" radio buttons.
    */

    function monochrome($color, $offset) {
        $hsl = translate($color);

    }

    function compliments($color, $offset) {
        $hsl = translate($color);

    }

    function triad($color, $offset) {
        $hsl = translate($color);

    }

    function analogous($color, $offset) {
        $hsl = translate($color);

    }

    function translate($color) {
        // Hex values converted to decimals and mapped to an array
        $rgb = array_map('hexdec', str_split($color, 2));
        
        // Color science math from http://www.niwa.nu/2013/05/math-behind-colorspace-conversions-rgb-hsl/
        $rgb = array_map(function($n) {return round($n/255, 2);}, $rgb);
        
        // Luminance
        $min = min($rgb);
        $max = max($rgb);
        $l = 100 * round(($min + $max) / 2, 2);

        // Saturation
        if ($l < 0.5) {
            $s = 100 * round(($max - $min) / ($max + $min), 2);
        }
        else {
            $s = 100 * round(($max - $min) / (2 - $max - $min), 2);
        }

        // Hue
        if ($min == $max) {
            $h = 0;
        }
        else {
            switch (array_search(max($rgb), $rgb)) {
                case 0: // max is R
                    $h = ($rgb[1] - $rgb[2]) / ($max - $min);
                    break;
                case 1: // max is G
                    $h = 2 + ($rgb[2] - $rgb[0]) / ($max - $min);
                    break;
                case 2: // max is B
                    $h = 4 + ($rgb[0] - $rgb[1]) / ($max - $min);
                    break;
            }

            $h = round($h * 60);
            if ($h < 0) {
                $h += 360;
            }
        }

        $hsl = [
            "hue" => $h,
            "sat" => $s,
            "lum" => $l,
        ];

        return $hsl;
    }
?>
