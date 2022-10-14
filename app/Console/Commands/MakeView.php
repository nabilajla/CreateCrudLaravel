<?php 
namespace App\Console\Commands;
use App\Console\Commands\MakeRoute;
use Illuminate\Console\Command;
use Illuminate\Console\Concerns\InteractsWitIO;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use App\helper;
use App\Console\Commands\Path;

class MakeView extends Path
{
    use InheritanceAllClasses;

    public $ViewPathF = "resources\\views\\";

    function PathView($NM)
    {
        return $this->ViewPathF . $NM;
    }


    function MakeViewFolder($NM)
        {
            
            if(!is_dir($this->PathView($NM)))
            {
                mkdir($this->PathView($NM),0777,true);
                Infos(" Folder created successfully [ $NM  ]. " , 1);
            }
            else
            {
                Infos(" This Folder $NM alerted ." , 2);
            } 
        }

        function MakeFourFiles($NM)
        {
           $Files = array( 'index' , 'create' , 'show' , 'edit' );
           for ($i=0; $i < 4; $i++) { 
               $fs = fopen($this->PathView($NM) . "\\" . $Files[$i] .".blade.php" , 'a');
               fclose($fs);
           }
        }

        
        
        function FilesIndexInFolder($NM)
        {
            return $this->PathView($NM) . "\\index.blade.php";
        }

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

        function SetExpersion($NM)
        {
            // echo $this->SetTh($NM);
            $fs = fopen($this->FilesIndexInFolder($NM) , 'w');
            fwrite($fs ,$this->SetTD($NM));
            fclose($fs);
        }
    }