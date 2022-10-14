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
            return "return redirect()->action([$ModelName::class, 'index'])->with('Success', 'successfuly );";
        }

        function AllLineStore($ModelName)
        {
        $StringColumn =  InheritanceAllClasses::ColumnDataBaseAnyNameTable($ModelName);
        $words = explode(",", $StringColumn);

        $Line = $this->OneLineInStore($ModelName);

            for ($i = 0 ; $i < count($words) ; $i++)
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
        $words = explode(",", $StringColumn);

        $Line = $this->OneLineInStore($ModelName);
        $Line .= "$"."$ModelName = $ModelName::findOrFail(" ."$". "id);";
            for ($i = 0 ; $i < count($words) ; $i++)
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
        return redirect()->route('$ModelName.index');"; 
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
                Infos(" Full Controller successfully $ModelName." , 1);
        }
        // public function ControllerPath($NameController)
        // {
        //         return dirname(__DIR__ , 3) . "\\app\\Http\\Controllers\\$NameController.php";
        // }



        // public static function EditCreateFunction( $strRePlace ,$NameController , )
        // {
        //     $pathFile = self::ControllerPath($NameController);
        //     $ConConself = self::GetContentControllers($pathFile);

        //     $strRePlace[0] = Str::Upper($strRePlace[0]);
        //     $FirstUppperCase = Str::lower($strRePlace);


        //     $FinishControllers = str_replace("$strRePlace" ,"return View('$NameController.$FirstUppperCase');" ,$ConConself);
        //     return $FinishControllers;
        // }

        // public static function SetControllersInFIles( $setInControllers , $NameController)
        // {
        //     $pageControllers = self::EditCreateFunction( $setInControllers ,$NameController);
        //     $fileOpen = self::ControllerPath($NameController);
            
        //     $fs =  fopen($fileOpen, 'w');
        //     fwrite( $fs , $pageControllers );
        //     fclose($fs);
        // }

        // public static function setControl($NameController)
        // {

        //     self::SetControllersInFIles("Index",$NameController );
        //     self::SetControllersInFIles("Create",$NameController );
        //     self::SetControllersInFIles("Store",$NameController );
        //     self::SetControllersInFIles("Edit",$NameController );
        //     self::SetControllersInFIles("Update",$NameController );
        //     self::SetControllersInFIles("Show",$NameController );
        //     self::SetControllersInFIles("Destroy",$NameController);

        }

