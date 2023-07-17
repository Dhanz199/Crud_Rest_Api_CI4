<?php

if (!function_exists("HapusKarakterSpasi")) {
    function HapusKarakterSpasi($string)
    {
        $output = str_replace(" ", "", $string);
        return $output;
    }
}
