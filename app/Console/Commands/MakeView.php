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

    public static function MFView($NM)
        {
            if(!is_dir(self::viewPath() . $NM))
            {
                Infos(" Folder created successfully [ $NM  ]. " , 1);
                mkdir(self::viewPath() . $NM,0777,true);
            } 
        }

        public static function FolderPath($NM)
        {
            return self::viewPath() . $NM;
        }


        public static function MakeFileOne($FileNameInFolder)
        {
            return $FileNameInFolder . ".blade.php\n";
        }


        /** 
        *   This code for get model folder name
        * @param $NM  Is model name
        * F Folder
        * M Model
        * FMPath folder model path
        */
        public static function FMPath($NM)
        {
            return self::FolderPath($NM) . "\\";
        }

        public static function SetWidgth( $stub , $getColumnDataBase)
        {
            
            $GetPathRouteName = DevTools::DevToolsName($stub);
            $GetStubContentFile = DevTools::GetStubContent($GetPathRouteName);
            $FinishRoute = "\n" . str_replace('{{name}}' , $getColumnDataBase ,$GetStubContentFile);
            return $FinishRoute;
        }


        public static function GetPageName($folderNamesss,$FileNameInFolder ,$counter)
        {
            return  $folderNamesss.$FileNameInFolder[$counter].".blade.php";
        }

        public static function getPathPageFIle( $page , $NM )
        {
            return self::viewPath() . $NM . "\\$page.blade.php";
        }


        public static function AddSAndUpperCase($NameMoeld)
        {
            $AddSModels = "";
            if(!($NameMoeld[ Str::length($NameMoeld) - 1] == 's'))
            {
                $AddSModels = $NameMoeld . 's';
            }
            $AddSModels[0] = Str::lower($NameMoeld[0]); 
            return $AddSModels;
        }

        public static function SetPage( $FileStub  , $pageName ,$NM)
        {
            $AddSModels = self::AddSAndUpperCase($NM);
            $columns = Schema::getColumnListing($AddSModels);
                if(self::getPathPageFIle( $pageName ,$NM))
                {
                $fs = fopen( self::getPathPageFIle( $pageName ,$NM),'a');
                for ($j=0; $j < count($columns); $j++) { 
                    
                    fwrite( $fs , self::SetWidgth($FileStub ,$columns[$j]) );
                }

                    fclose($fs);

        }
    }
        /**
         * @param $NM  Name Model
         */
        public static function CreateFile($NM)
        {

            $Files = array( 'index' , 'create' , 'show' , 'edit' );
            // This code for create folder model name
            self::MFView($NM);

            /**
             * This page in Folder View 
             */
            $INDEX = 0;
            $CREATE = 1;
            $SHOW = 2;
            $EDIT = 3;
            
            
            // This code for create Folder by name model
            
            
                /**
                 * F Folder
                 * M Model 
                 * P Path
                 */
             $FMP =  self::FMPath($NM);
            
        for ($i = 0 ; $i < count($Files); $i++) {

            switch ($i) {
                case $CREATE:
                self::SetPage( "group-form.stub" , $Files[$i]  ,  $NM);
                Infos(" Page created successfully [$Files[$i]]." , 1);
                    break;
                
                default:
                File::put( self::GetPageName($FMP , $Files,$i),  "nabil" );
                Infos(" Page created successfully [$Files[$i]]." , 1);
                    break;
            }

            if($i ==  $INDEX)
            {


            }else{

                }
            }
        

        }

        public static function SetViewFolderAndFiles($NM)
        {
            self::CreateFile($NM);
        }
 
    }