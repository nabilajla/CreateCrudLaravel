<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
trait InheritanceAllClasses
{
    static function AddSAndUpperCase($NameMoeld)
    {
        $AddSModels = "";
        if(!($NameMoeld[ Str::length($NameMoeld) - 1] == 's'))
        {
            $AddSModels = $NameMoeld . 's';
        }
        $AddSModels[0] = Str::lower($NameMoeld[0]); 
        return $AddSModels;
    }

    static function ColumnDataBaseAnyNameTable($NameModel)
    {
        $AddSModels =  self::AddSAndUpperCase($NameModel);
        $columns = Schema::getColumnListing($AddSModels);
        return implode(",", $columns);
    }
    static function OneLineInPage()
    {
        return "@extends("."'CRUD'".")";
    }

}