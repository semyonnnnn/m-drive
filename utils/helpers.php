<?php

function _file(string $base_path_with_file): string
{
    return BASE_PATH . "$base_path_with_file.php";
}

function dd(mixed $param): never
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die();
}

function _include(string $base_path_with_file)
{
    return include _file($base_path_with_file);
}