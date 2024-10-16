<?php
namespace App\Console\Commands;



class Path{

        public static function viewPath()
        {
            return dirname(__DIR__ , 3) .  "\\resources\\views\\";
        }
        

    }