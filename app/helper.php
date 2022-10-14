<?php

    if(!(function_exists('Infos'))){

    function Infos($string , $COLOR)
    {
    $StartSuccess = " \e[1;37;44m";
    $EndSuccess = "\e[0m ";
    $StartERROR = " \e[1;37;41m";
    $EndERROR = "\e[0m ";
        switch ($COLOR) {
            case 1:
                echo "\n" . $StartSuccess. " Info ". $EndSuccess . "$string" . "\n";
                break;
            case 2:
                   echo "\n" . $StartERROR . " Error " . $EndERROR ."$string" . "\n";
                break;

                }
            }  
    } 
