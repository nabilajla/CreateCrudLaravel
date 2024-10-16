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
                // Infos(" Folder created successfully [ $NM  ]. " , 1);
            }
            else
            {
                // Infos(" This Folder $NM alerted ." , 2);
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

        function FilesShowInFolder($NM)
        {
            return $this->PathView($NM) . "\\show.blade.php";
        }

        function FilesCreateInFolder($NM)
        {
            return $this->PathView($NM) . "\\create.blade.php";
        }

        function FilesUpdateInFolder($NM)
        {
            return $this->PathView($NM) . "\\edit.blade.php";
        }

        function SetIndex($NM)
        {
            $Index = new Index();
            $fs = fopen($this->FilesIndexInFolder($NM) , 'w');
            fwrite($fs ,$Index->SetTD($NM));
            fclose($fs);
        }

        function SetShow($NM)
        {
            $show = new Show();
            $fs = fopen($this->FilesShowInFolder($NM) , 'w');
            fwrite($fs ,$show->StartPage($NM));
            fclose($fs);
        }

        function SetCreate($NM)
        {
            $create = new Create();
            $fs = fopen($this->FilesCreateInFolder($NM) , 'w');
            fwrite($fs ,$create->StartPage($NM));
            fclose($fs);
        }

        function SetUpdate($NM)
        {
            $edit = new Edit();
            $fs = fopen($this->FilesUpdateInFolder($NM) , 'w');
            fwrite($fs ,$edit->StartPage($NM));
            fclose($fs);
        }

        function StartView($NM)
        {
            $this->MakeViewFolder($NM);
            $this->SetIndex($NM);
            $this->SetShow($NM);
            $this->SetCreate($NM);
            $this->SetUpdate($NM);
        }

    }
