<?php
function dd($value)
{
    dump($value);
    exit;
}
function dump($value)
{
    echo "<pre style='background: #0E1215; color: white;padding: 20px;border-radius: 10px;'>";
    var_dump($value);
    echo "</pre>";
}
function is_empty_array(array $array)
{
    $result = false;
    foreach ($array as $key => $value) {
        if ($value == "" || $value == null || empty($value)) {
            $result = true;
        }
    }
    return $result;
}
function getExtension($str)
{
    $ext = explode(".", $str);
    return $ext[1];
}