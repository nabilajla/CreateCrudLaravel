<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Console\Commands\InheritanceAllClasses;
use App\Console\Commands\DevTools;
use App\Console\Commands\MakeView;
use App\helper;
use File;
use Illuminate\Support\Str;

class Index extends MakeView {
    use InheritanceAllClasses;

    function HeaderPage($NM)
        {
             $devTools = new DevTools();
             $devTools->setStupFileName("HeaderIndex.stub");
             $Line =  self::OneLineInPage($NM) . "\n\n@section("."'$NM'".")";
            $Line .= "\n\n" . $devTools->GetContentAnyFile($devTools->DevToolsName($devTools->getStupFileName()));
            return $Line;
        }

        function TabelPageIndex($NM)
        {
            $devTools = new DevTools();
            $devTools->setStupFileName("TableIndex.stub");
            $Line =  $devTools->SearchFileAndReplace("{{Model}}" , $NM , $devTools->DevToolsName($devTools->getStupFileName()));
            return $Line;
 
        }


        function AllIndex($NM)
        {
            $Line = $this->HeaderPage($NM) . "\n" . $this->TabelPageIndex($NM);
            $NM[0] = Str::lower($NM[0]);
            $Line = str_replace("{{ModelSmall}}",$NM,$Line,$i);
            return $Line;
        }

 
        function Th($NM)
        {
            $Lines = "";
            $StringColumn = InheritanceAllClasses::ColumnDataBaseAnyNameTable($NM);
            $Words = explode(",", $StringColumn);
            for ($i=0; $i < count($Words); $i++) { 
                $Lines .= "\t\t<th>". $Words[$i]."</th>\n";
            }
            return $Lines;
        }

        function SetTh($NM)
        {
            $CodeTh = $this->AllIndex($NM);
            $Th = $this->Th($NM);
            $CodeTh = str_replace("{{TH}}",$Th,$CodeTh,$i);
            return $CodeTh;
        }
        function TD($NM)
        {
            $Lines = "";
            $StringColumn = InheritanceAllClasses::ColumnDataBaseAnyNameTable($NM);
            $Words = explode(",", $StringColumn);
            $NM[0] = Str::lower($NM[0]);
            for ($i=0; $i < count($Words); $i++) { 
                $Lines .= "\t\t<td> $$NM->". $Words[$i]."</td>\n";
            }
            return $Lines;
        }

        function SetTD($NM)
        {
            $CodeTh = $this->SetTh($NM);
            $Td = $this->TD($NM);
            $CodeTh = str_replace("{{TD}}",$Td,$CodeTh,$i);
            return $CodeTh;
        }


}