<?php

namespace App\Console\Commands;

use App\Console\Commands\MakeRoute;
use App\Console\Commands\MakeView;
use App\Console\Commands\DevTools;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

use App\Models\Nabil;
use App\Models\User;


use Illuminate\Console\Command;




class CreateCRUD extends Command
{
    //  use DevTools;
    protected $signature = 'make:crud {WhatIsNameModel}';


    protected $description = 'this is command line create curd with model name';

    public static function CreateFullControllers($NM)
    {
        Artisan::call("make:controller $NM" . "Controller --resource ");
        $devTools = new DevTools();
        $devTools->MakeFullController($NM);
    }

    public static function CreateFullRoute($NM)
    {
        Artisan::call("make:model $NM ");
        $MakeRoute = new MakeRoute();
        $MakeRoute->SetRouteName($NM);
        Infos(" Full Route Successfully $NM", 1);
    }


    public function SetYiledNameInCrud($NM)
    {
        $GetPathRouteName = Path::viewPath() . 'CRUD.blade.php';
        $devTools = new DevTools();
        $GetStubContentFile = $devTools->GetContentAnyFile($GetPathRouteName);
        $WordAndModel = "@yield(\"$NM\")\n{{--YIELD--}}\t";
        $FinishRoute = "\n" . str_replace('{{--YIELD--}}', $WordAndModel, $GetStubContentFile);
        return $FinishRoute;

    }
    public function CountFile($pathfile)
    {
        $LengthFile = 0;
        if (file_exists($pathfile)) {
            $LengthFile = count(file($pathfile));
        } else {
            $LengthFile = 0;
        }
        if ($LengthFile <3) {
            $fp = fopen($pathfile, 'c');//open file in append mode
            $devTools = new DevTools();
            $devTools->setStupFileName('CRUD.stub');
            $conetnt = $devTools->GetContentAnyFile($devTools->DevToolsPath . $devTools->getStupFileName());
            fwrite($fp, $conetnt);
            fclose($fp);
        }
    }

    public function SetYiledInFile($NM)
    {

        $pathFile = Path::viewPath() . "CRUD.blade.php";
        $this->CountFile($pathFile);
        $ContentFile = file_get_contents($pathFile);
        $WordAndModel = "@yield(\"$NM\")" . "\n\t{{--YIELD--}}\n";
        $Finish = "\n" . str_replace('{{--YIELD--}}', $WordAndModel, $ContentFile);
        $fp = fopen($pathFile, 'c');//open file in append mode
        fwrite($fp, $Finish);
        fclose($fp);
    }
    public function IsExitFile()
    {
        return file_exists(Path::viewPath() . "CRUD.blade.php");
    }
    public function SetContentFile($Content)
    {


    }
    // public function MakeCrudFile()
    // {
    //     if(!$this->IsExitFile())
    //     {
    //         $devTools = new DevTools();
    //         $PathFile = $devTools->DevToolsName('CRUD.blade.stub');
    //         $finishfile = $devTools->GetContentAnyFile($PathFile);
    //         $pathName = Path::viewPath() . "CRUD.blade.php";
    //         $fs = fopen( $pathName, 'a');
    //         fwrite($fs ,$finishfile);
    //         fclose($fs);
    //     }

    // }

    public function handle()
    {

        $NM = $this->argument('WhatIsNameModel');
        self::CreateFullRoute($NM);
        self::CreateFullControllers($NM);
        $MakeView = new MakeView();
        $MakeView->StartView($NM);
        $this->SetYiledInFile($NM);
    }
}
