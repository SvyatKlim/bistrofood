<?php
function debug_dump($data, $die = false, $dump = true)
{
    echo "<pre>";
    if ($dump) var_dump($data);
    else print_r($data);
    echo "</pre>";
    if ($die) wp_die();
}


function showException (Exception $exception, string $type) {
    echo '<pre> [' . $type . ']' . print_r($exception -> getMessage(), true ) . '</pre>';
    echo $exception->getFile() . ':' . $exception->getLine();
    die();
}