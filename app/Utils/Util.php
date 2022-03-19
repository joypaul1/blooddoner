<?php
namespace App\Utils;

class Util
{
    public static function slug($string, $separator = '-', $lowercase = true)
    {
        $str = preg_replace('/([?]|\p{P}|\s)+/u', $separator, $string);
        $slug = $lowercase ? mb_strtolower($str) : $str;

        return trim($slug, $separator);
    }
    public static function trimZeroes($value, $precision = 2)
    {
        return rtrim(round($value, $precision), '.') + 0;
    }
}
