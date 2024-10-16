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
        // $AddSModels =  self::AddSAndUpperCase($NameModel);
        $columns = Schema::getColumnListing($NameModel);
        return implode(",", $columns);

    }

    static function OneLineInPage()
    {
        return "@extends(\"CRUD\")";
    }

    static  function FirstUpperCase($Text)
    {
        $FirstText = $Text[0];
        $FirstText = Str::Upper($Text[0]);
        return $FirstText . Str::substr($Text,1);
    }

    static  function FirstLowerCase($Text)
    {
        $FirstText = $Text[0];
        $FirstText = Str::lower($Text[0]);
        return $FirstText . Str::substr($Text,1);
    }

}
