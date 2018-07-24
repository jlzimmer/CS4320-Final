<?php
    $color = empty($_POST['color']) ? '' : $_POST['color'];
    $mode = empty($_POST['mode']) ? '' : $_POST['mode'];
    $offset = empty($_POST['offset']) ? 0 : $_POST['offset'];

    if ($offset < 0 || $offset > 50) {
        header("Location: ../index.php?result=invalidOffset");
    }

    if (empty($color) || empty($mode)) {
        header("Location: ../index.php?result=emptyField");
        exit;
    }
?>