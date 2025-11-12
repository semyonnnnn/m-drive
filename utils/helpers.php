<?php

function _file(string $path): string
{
    return __DIR__ . "/../$path.php";
}

function dd(mixed $param): never
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die();
}