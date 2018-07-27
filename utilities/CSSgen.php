<?php
    // Generates a CSS file that is ready to use in a web environment for color schemes
    function generate($palette) {
        $uno = $palette["primary"];
        $dos = $palette["secondary"];
        $tres = $palette["tertiary"];

        $css = <<<FILE
.primary {
    color: #$uno;
    background-color: #$uno;
    border-color: #$uno;
}
.secondary {
    color: #$dos;
    background-color: #$dos;
    border-color: #$dos;
}
.tertiary {
    color: #$tres;
    background-color: #$tres;
    border-color: #$tres;
}
FILE;

        return $css;
    }
?>