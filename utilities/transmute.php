<?php
    /*  Accepts an input hex value ($color) and a maximum random offset value for saturation ($offset), 
    *   then calculates a three-color scheme based on the desired pattern identified by the "mode" radio buttons.
    */

    function monochrome($color, $offset) {
        $pure = toHSL($color);

        $tint = [
            "hue" => $pure["hue"],
            "sat" => $pure["sat"] + $offset,
            "lum" => rand($pure["lum"], 100),
        ];
        if ($tint["sat"] < 0) {
            $tint["sat"] = 0;
        }
        else if ($tint["sat"] > 100) {
            $tint["sat"] = 100;
        }
        $tint = toHEX($tint);

        $shade = [
            "hue" => $pure["hue"],
            "sat" => $pure["sat"] + $offset,
            "lum" => rand(0, $pure["lum"]),
        ];
        if ($shade["sat"] < 0) {
            $shade["sat"] = 0;
        }
        else if ($shade["sat"] > 100) {
            $shade["sat"] = 100;
        }
        $shade = toHEX($shade);

        $palette = [
            "primary" => $color,
            "secondary" => $tint,
            "tertiary" => $shade,
        ];
        
        return $palette;
    }

    function compound($color, $offset) {
        $pure = toHSL($color);

        $tint = [
            "hue" => ($pure["hue"] + 150) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $pure["lum"],
        ];
        if ($tint["sat"] < 0) {
            $tint["sat"] = 0;
        }
        else if ($tint["sat"] > 100) {
            $tint["sat"] = 100;
        }
        $tint = toHEX($tint);

        $shade = [
            "hue" => ($pure["hue"] + 210) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $pure["lum"],
        ];
        if ($shade["sat"] < 0) {
            $shade["sat"] = 0;
        }
        else if ($shade["sat"] > 100) {
            $shade["sat"] = 100;
        }
        $shade = toHEX($shade);

        $palette = [
            "primary" => $color,
            "secondary" => $tint,
            "tertiary" => $shade,
        ];

        return $palette;
    }

    function triad($color, $offset) {
        $pure = toHSL($color);

        $tint = [
            "hue" => ($pure["hue"] + 120) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $pure["lum"],
        ];
        if ($tint["sat"] < 0) {
            $tint["sat"] = 0;
        }
        else if ($tint["sat"] > 100) {
            $tint["sat"] = 100;
        }
        $tint = toHEX($tint);

        $shade = [
            "hue" => ($pure["hue"] + 240) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $pure["lum"],
        ];
        if ($shade["sat"] < 0) {
            $shade["sat"] = 0;
        }
        else if ($shade["sat"] > 100) {
            $shade["sat"] = 100;
        }
        $shade = toHEX($shade);

        $palette = [
            "primary" => $color,
            "secondary" => $tint,
            "tertiary" => $shade,
        ];

        return $palette;
    }

    function analogous($color, $offset) {
        $pure = toHSL($color);

        $max = rand($pure["lum"], 100);
        $min = rand(0, $pure["lum"]);
        $luma = rand($min, $max);

        $tint = [
            "hue" => ($pure["hue"] + 30) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $luma,
        ];
        if ($tint["sat"] < 0) {
            $tint["sat"] = 0;
        }
        else if ($tint["sat"] > 100) {
            $tint["sat"] = 100;
        }
        $tint = toHEX($tint);

        $shade = [
            "hue" => ($pure["hue"] + 330) % 360,
            "sat" => $pure["sat"] + $offset,
            "lum" => $luma,
        ];
        if ($shade["sat"] < 0) {
            $shade["sat"] = 0;
        }
        else if ($shade["sat"] > 100) {
            $shade["sat"] = 100;
        }
        $shade = toHEX($shade);

        $palette = [
            "primary" => $color,
            "secondary" => $tint,
            "tertiary" => $shade,
        ];

        return $palette;
    }

    function toHSL($color) {
        // Hex values converted to decimals and mapped to an array
        $rgb = array_map('hexdec', str_split($color, 2));
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

    function toHEX($color) {
        $rgb = toRGB($color["hue"], $color["sat"], $color["lum"]);
        $rgb = array_map('round', $rgb);
        $rgb = array_map('dechex', $rgb);
        $rgb = array_map(function($n) {return str_pad($n, 2, "0", STR_PAD_LEFT);}, $rgb);
        
        $hex = strtoupper($rgb["r"] . $rgb["g"] . $rgb["b"]);
        return $hex;
    }

    // Sourced from: https://stackoverflow.com/questions/20423641/php-function-to-convert-hsl-to-rgb-or-hex
    function toRGB($h, $s, $l) {
        $h /= 360;
        $s /= 100;
        $l /= 100;
        $r = $l;
        $g = $l;
        $b = $l;
        $v = ($l <= 0.5) ? ($l * (1.0 + $s)) : ($l + $s - $l * $s);
        if ($v > 0){
              $m;
              $sv;
              $sextant;
              $fract;
              $vsf;
              $mid1;
              $mid2;

              $m = $l + $l - $v;
              $sv = ($v - $m ) / $v;
              $h *= 6.0;
              $sextant = floor($h);
              $fract = $h - $sextant;
              $vsf = $v * $sv * $fract;
              $mid1 = $m + $vsf;
              $mid2 = $v - $vsf;

              switch ($sextant)
              {
                    case 0:
                          $r = $v;
                          $g = $mid1;
                          $b = $m;
                          break;
                    case 1:
                          $r = $mid2;
                          $g = $v;
                          $b = $m;
                          break;
                    case 2:
                          $r = $m;
                          $g = $v;
                          $b = $mid1;
                          break;
                    case 3:
                          $r = $m;
                          $g = $mid2;
                          $b = $v;
                          break;
                    case 4:
                          $r = $mid1;
                          $g = $m;
                          $b = $v;
                          break;
                    case 5:
                          $r = $v;
                          $g = $m;
                          $b = $mid2;
                          break;
              }
        }
        return array('r' => $r * 255.0, 'g' => $g * 255.0, 'b' => $b * 255.0);
    }
?>
