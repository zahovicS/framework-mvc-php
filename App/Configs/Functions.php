<?php
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