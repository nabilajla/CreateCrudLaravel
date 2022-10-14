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
             $Line =  self::OneLineInPage($NM) . "\n\n@section("."$NM".")";
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
            $Line .= str_replace("{{ModelSmall}}",$NM,$Line,$i);
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

    //     public static function MakeFileOne($FileNameInFolder)
    //     {
    //         return $FileNameInFolder . ".blade.php\n";
    //     }


    //     /** 
    //     *   This code for get model folder name
    //     * @param $NM  Is model name
    //     * F Folder
    //     * M Model
    //     * FMPath folder model path
    //     */
    //     public static function FMPath($NM)
    //     {
    //         return self::FolderPath($NM) . "\\";
    //     }

    //     public static function SetWidgth( $stub , $getColumnDataBase)
    //     {
            
    //         $GetPathRouteName = DevTools::DevToolsName($stub);
    //         $GetStubContentFile = DevTools::GetStubContent($GetPathRouteName);
    //         $FinishRoute = "\n" . str_replace('{{name}}' , $getColumnDataBase ,$GetStubContentFile);
    //         return $FinishRoute;
    //     }


    //     public static function GetPageName($folderNamesss,$FileNameInFolder ,$counter)
    //     {
    //         return  $folderNamesss.$FileNameInFolder[$counter].".blade.php";
    //     }

    //     public static function getPathPageFIle( $page , $NM )
    //     {
    //         return self::viewPath() . $NM . "\\$page.blade.php";
    //     }


    //     public static function AddSAndUpperCase($NameMoeld)
    //     {
    //         $AddSModels = "";
    //         if(!($NameMoeld[ Str::length($NameMoeld) - 1] == 's'))
    //         {
    //             $AddSModels = $NameMoeld . 's';
    //         }
    //         $AddSModels[0] = Str::lower($NameMoeld[0]); 
    //         return $AddSModels;
    //     }

    //     public static function SetPage( $FileStub  , $pageName ,$NM)
    //     {
    //         $AddSModels = self::AddSAndUpperCase($NM);
    //         $columns = Schema::getColumnListing($AddSModels);
    //             if(self::getPathPageFIle( $pageName ,$NM))
    //             {
    //             $fs = fopen( self::getPathPageFIle( $pageName ,$NM),'a');
    //             for ($j=0; $j < count($columns); $j++) { 
                    
    //                 fwrite( $fs , self::SetWidgth($FileStub ,$columns[$j]) );
    //             }

    //                 fclose($fs);

    //     }
    // }
    //     /**
    //      * @param $NM  Name Model
    //      */
    //     public static function CreateFile($NM)
    //     {

    //         $Files = array( 'index' , 'create' , 'show' , 'edit' );
    //         // This code for create folder model name
    //         self::MFView($NM);

    //         /**
    //          * This page in Folder View 
    //          */
    //         $INDEX = 0;
    //         $CREATE = 1;
    //         $SHOW = 2;
    //         $EDIT = 3;
            
            
    //         // This code for create Folder by name model
            
            
    //             /**
    //              * F Folder
    //              * M Model 
    //              * P Path
    //              */
    //          $FMP =  self::FMPath($NM);
            
    //     for ($i = 0 ; $i < count($Files); $i++) {

    //         switch ($i) {
    //             case $CREATE:
    //             self::SetPage( "group-form.stub" , $Files[$i]  ,  $NM);
    //             Infos(" Page created successfully [$Files[$i]]." , 1);
    //                 break;
                
    //             default:
    //             File::put( self::GetPageName($FMP , $Files,$i),  "nabil" );
    //             Infos(" Page created successfully [$Files[$i]]." , 1);
    //                 break;
    //         }

    //         if($i ==  $INDEX)
    //         {


    //         }else{

    //             }
    //         }
        

    //     }

    //     public static function SetViewFolderAndFiles($NM)
    //     {
    //         self::CreateFile($NM);
    //     }
 
    }