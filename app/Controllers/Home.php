<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Helper
    public function __construct()
    {
        helper(["custom"]);
    }
    public function index()
    {
        $string = "Ini contoh Penggunaan Helper"; //Output spasi di hilangkan

        echo HapusKarakterSpasi($string);
        return view('welcome_message');
    }
}
