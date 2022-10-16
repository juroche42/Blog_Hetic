<?php

class Validation
{
    /**
     * @param string $str
     * @return string
     */
    public static function validString(string $str) : string
    {
        if (!isset($str) || empty($clean_str = filter_var($str, FILTER_SANITIZE_STRING))) {
            throw new InvalidArgumentException($str . ' is not a valid string');
        }
        var_dump($clean_str);
        return $clean_str;
    }
}