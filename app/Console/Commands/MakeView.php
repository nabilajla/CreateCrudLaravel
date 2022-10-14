<?php 
namespace App\Console\Commands;
use App\Console\Commands\MakeRoute;
use App\Console\Commands\Index;
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

        function SetExpersion($NM)
        {
            $Index = new Index();
            $fs = fopen($this->FilesIndexInFolder($NM) , 'w');
            fwrite($fs ,$Index->SetTD($NM));
            fclose($fs);
        }
        
    }