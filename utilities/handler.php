<?php
    $color = empty($_POST['color']) ? '' : $_POST['color'];
    $mode = empty($_POST['mode']) ? '' : $_POST['mode'];
    $offset = intval(empty($_POST['offset']) ? 0 : $_POST['offset']);

    if ($offset < -99 || $offset > 99) {
        header("Location: ../index.php?result=invalidOffset");
        exit;
    }

    if (empty($color) || empty($mode)) {
        header("Location: ../index.php?result=emptyField");
        exit;
    }

    require 'transmute.php';

    switch ($mode) {
        case 'mono':
            $palette = monochrome($color, $offset);
            break;
        case 'comp':
            $palette = compound($color, $offset);
            break;
        case 'tri':
            $palette = triad($color, $offset);
            break;
        case 'analog':
            $palette = analogous($color, $offset);
            break;
    } 

    require 'CSSgen.php';

    $css = generate($palette);
   // echo "<p background-color: "$palette["primary"]";>";
   $first = $palette["primary"];
   $second = $palette["secondary"];
   $third = $palette["tertiary"];
    
    echo "<p style='background-color: $first; color: $third;'>";
    echo $palette["primary"];
    echo "</p>";
    echo "<br>";

    echo "<p style='background-color: $second; color: $first;'>";
    echo $palette["secondary"];
    echo "</p>";
    echo "<br>";

    echo "<p style='background-color: $third; color: $second;'>";
    echo $palette["tertiary"];
    echo "</p>";


   /* if(!empty($css)){
    header("Location: ../generated.php");
    }
    else
    {
   header("Location: ../index.php?result=ErrorPleaseTryAgain");
    }*/

?>
