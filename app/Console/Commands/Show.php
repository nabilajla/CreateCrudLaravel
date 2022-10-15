<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Console\Commands\InheritanceAllClasses;
use App\Console\Commands\DevTools;
use App\Console\Commands\MakeView;
use App\helper;
use File;
use Illuminate\Support\Str;

class Show extends MakeView {
    use InheritanceAllClasses;

        function HeaderPage($NM)
        {
             $devTools = new DevTools();
             $devTools->setStupFileName("HeaderIndex.stub");
             $Line =  self::OneLineInPage($NM) . "\n\n@section("."'$NM'".")";
            return $Line;
        }

        function StartPage($NM)
        {
            return $this->HeaderPage($NM);
        }

}