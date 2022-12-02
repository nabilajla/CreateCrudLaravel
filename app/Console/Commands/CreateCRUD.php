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
    public static function  CreateFullRoute($NM)
    {
        Artisan::call("make:model $NM ");
        $MakeRoute = new MakeRoute();
        $MakeRoute->SetRouteName($NM);

    }
    public function handle()
    {

        $NM = $this->argument('WhatIsNameModel');
        self::CreateFullRoute($NM);
        self::CreateFullControllers($NM);
        $MakeView = new MakeView();
        $MakeView->StartView($NM);
    }
}
