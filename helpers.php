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
function redirect($url)
{
  header("Location: {$url}");
  exit;
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
function loadPartial($name, $data = [])
{
  $partialPath = basePath("app/views/partials/{$name}.partials.php");
  if (file_exists($partialPath)) {
    extract($data);
    require $partialPath;
  } else {
    echo "Partial '{$name} not found!'";
  }
}

function email($value)
{
  $value = trim($value);

  return filter_var($value, FILTER_VALIDATE_EMAIL);
}
function string_input($value, $min = 1, $limit){
    if (is_string($value)) {
        $value = trim($value);
        $length = strlen($value);
        return $length >= $min && $length <= $limit;
    }
    return false;
}
function jd(){
  echo "SE DETUVO ACA";
  die();
}
function sanitize($dirty)
{
  return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}