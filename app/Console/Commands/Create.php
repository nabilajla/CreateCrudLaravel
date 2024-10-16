<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Console\Commands\InheritanceAllClasses;
use App\Console\Commands\DevTools;
use App\Console\Commands\MakeView;
use App\helper;
use File;
use Illuminate\Support\Str;

class Create extends MakeView {
    use InheritanceAllClasses;
    private $Code;
    private $StubBody = "platform\DevTools\HeaderShow.stub";
    private $_StubTable = "platform\DevTools\TableShow.stub";
    private $_StubFrom = "platform\DevTools\From.stub";
    private $_StubgroupFrom = "platform\DevTools\group-form.stub";
    private $_Result;

    public function HeaderPage($NM)
    {
        $this->_Result = "@extends(\"CRUD\")" . "\n@section(\"$NM\")\n";
    }

    function BodyPage($NM)
    {
         $this->_Result  .= DevTools::GetSubAnyFile($this->StubBody);
    }

    function CounterForm($NM)
    {
        $StringColumn =  InheritanceAllClasses::ColumnDataBaseAnyNameTable($NM);
        $StringColumn = Str::substr($StringColumn, 3, Str::length($StringColumn));
        $words = explode(",", $StringColumn);
        $Form = DevTools::GetSubAnyFile($this->_StubgroupFrom);
        $Line =  "@csrf\n@Method(\"POST\")\n";
        for ($i = 0 ; $i < (count($words) - 2) ; $i++)
        {
            $Line .= str_replace("{{name}}" , $words[$i] , $Form , $d);
        }
        $Line .= "<input class=\"btn btn-primary\" type=\"submit\" />";
        return $Line;
    }

    function RepCodInCon($NM)
    {
        $this->HeaderPage($NM);
        $this->BodyPage($NM);
        $Form = DevTools::GetSubAnyFile($this->_StubFrom);
        $this->_Result = str_replace("{{ Code }}",$Form, $this->_Result ,$i);
        $this->_Result = str_replace("{{Model}}",$NM, $this->_Result ,$i);
        $this->_Result = str_replace("{{ Code }}",$this->CounterForm($NM), $this->_Result ,$i);
    }
    function StartPage($NM)
    {
        $this->RepCodInCon($NM);
        return $this->_Result;
    }

}
