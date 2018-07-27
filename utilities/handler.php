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

?>
