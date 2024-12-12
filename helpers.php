<?php
function basePath(string $file = '')
{
    return __DIR__ . '/' . $file;
}
/**
 * Dump and die
 *
 * @param [mixed] $data
 * @return void
 */
function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
/**
 * Dump
 *
 * @param [mixed] $data
 * @return void
 */
function inspect($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}
function loadView($name, $data = [])
{
    $viewPath = basePath("app/views/{$name}.view.php");
    if (!file_exists($viewPath)) {
        die("La vista {$name} no existe.");
    }
    extract($data);
    require $viewPath;
}
