<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\InheritanceAllClasses;
use App\helper;
use File;
use Illuminate\Support\Str;
class DevTools
{
        use InheritanceAllClasses;
        public $DevToolsPath = "platform\DevTools\\";
        public $ConPath = "app\Http\Controllers\\";
        public $StupFileName;

        function setStupFileName($NameStup)
        {
            $this->StupFileName = $NameStup;
        }

        function getStupFileName()
        {
            return $this->StupFileName;
        }

        function DevToolsName($WhatIsNameFile = "Route.stub")
        {
            return $this->DevToolsPath . $WhatIsNameFile;
        }

        function DevToolsNameCon($WhatIsNameCon)
        {
            return $this->ConPath . $WhatIsNameCon;
        }

        function GetContentAnyFile($pathFIle)
        {
            return file_get_contents($pathFIle);
        }

        public static function GetSubAnyFile($pathFIle)
        {
            return file_get_contents($pathFIle);
        }
        /**
         * @param $search
         * @param $replace
         * @param $PathFile
         * @return str_replace
         */

         function SearchFileAndReplace($search , $replace , $PathFile)
        {
            $ContentFIle = $this->GetContentAnyFile($PathFile);
            $FinishControllers = str_replace($search,$replace,$ContentFIle,$i);
            return $FinishControllers;
        }

        function FileController( $Serach , $replace ,$ModelName)
        {
            $FileSearch = $this->DevToolsNameCon($ModelName) . 'Controller.php' ;
            return $this->SearchFileAndReplace("$Serach" , $replace , $FileSearch );
        }

        function ReplaceCodeInController($SearchInCode , $Code , $ModelName)
        {
            $fileOpen = $this->DevToolsNameCon($ModelName) . 'Controller.php' ;
            $FileFinsi = $this->FileController($SearchInCode , $Code ,$ModelName);
            $fs =  fopen($fileOpen, 'w');
            fwrite( $fs , $FileFinsi );
            fclose($fs);
        }

        function Index($ModelName)
        {
        return "return view('$ModelName.index' , [
            '$ModelName' => $ModelName::all()
        ]);";
        }

        function Create($ModelName)
        {
            return "return view('$ModelName.create');";
        }

        function OneLineInStore($ModelName)
        {
            return "$$ModelName = new $ModelName();\n";
        }

        function Column($ModelName , $ColumnName)
        {
            return "\n$$ModelName->$ColumnName = " .  "$" ."request->input('$ColumnName');";
        }

        function SaveStore($ModelName)
        {
            return "\n$$ModelName->"."save();";
        }

        function Redirect($ModelName)
        {
            return "return redirect()->action([\App\Http\Controllers\\$ModelName"."Controller::class, 'index'])->with('success', 'successfuly' );";
        }

        function AllLineStore($ModelName)
        {
        $StringColumn =  InheritanceAllClasses::ColumnDataBaseAnyNameTable($ModelName);
        $StringColumn = Str::substr($StringColumn, 3, Str::length($StringColumn));
        $words = explode(",", $StringColumn);

        $Line = $this->OneLineInStore($ModelName);

            for ($i = 0 ; $i < count($words) - 2 ; $i++)
            {
                $Line .= $this->Column($ModelName,$words[$i]);
            }
        $Line .= $this->SaveStore($ModelName);

        $Line .= "\n" . $this->Redirect($ModelName);
            return $Line;
        }

        function Store($ModelName)
        {
            return $this->AllLineStore($ModelName);
        }

        function Edit($ModelName)
        {
        return "return view('$ModelName.edit' , [
            '$ModelName' => $ModelName::findOrFail(". "$"."id)
        ]);";
        }

        function Update($ModelName)
        {
        $StringColumn =  InheritanceAllClasses::ColumnDataBaseAnyNameTable($ModelName);
        $StringColumn = Str::substr($StringColumn, 3, Str::length($StringColumn));

        $words = explode(",", $StringColumn);

        $Line = $this->OneLineInStore($ModelName);
        $Line .= "$"."$ModelName = $ModelName::findOrFail(" ."$". "id);";
            for ($i = 0 ; $i < count($words) - 2 ; $i++)
            {
                $Line .= $this->Column($ModelName,$words[$i]);
            }
        $Line .= $this->SaveStore($ModelName);

        $Line .= "\n" . $this->Redirect($ModelName);

        return $Line;

        }

        function Show($ModelName)
        {
        return "return view('$ModelName.show' , [
            '$ModelName' => $ModelName::findOrFail(". "$"."id)
        ]);";
        }

        function Destroy($ModelName)
        {
        return "$"."to_delet = $ModelName::findOrFail(". "$" ."id);" . "\n$" . "to_delet->delete();
        return redirect()->action([\App\Http\Controllers\\$ModelName"."Controller::class, 'index'])->with('success', 'Deleted successfuly' );";
        }

        function MakeFullController($ModelName)
        {
            $this->ReplaceCodeInController("[MNINCon]",$ModelName,$ModelName);
            $this->ReplaceCodeInController("[index]",$this->Index($ModelName),$ModelName);
            $this->ReplaceCodeInController("[create]",$this->Create($ModelName),$ModelName);
            $this->ReplaceCodeInController("[store]",$this->Store($ModelName),$ModelName);
            $this->ReplaceCodeInController("[edit]",$this->Edit($ModelName),$ModelName);
            $this->ReplaceCodeInController("[show]",$this->Show($ModelName),$ModelName);
            $this->ReplaceCodeInController("[destroy]",$this->Destroy($ModelName),$ModelName);
            $this->ReplaceCodeInController("[update]",$this->Update($ModelName),$ModelName);
                // Infos(" Full Controller successfully $ModelName." , 1);
        }
        }

