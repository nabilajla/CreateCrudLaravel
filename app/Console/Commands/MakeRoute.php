<?php 
namespace App\Console\Commands;

 


    class MakeRoute 
    {
        public $FIlePathRoute = "routes\\";

 
          function RoutesPath($FileName = 'web.php')
        {
            return $this->FIlePathRoute .$FileName;
        }

         function SetRouteInRoutePath($ContentFile)
        {
            $pathFile = self::RoutesPath();
            $fp = fopen($pathFile, 'a');//opens file in append mode  
            fwrite($fp,  $ContentFile);
            fclose($fp);
            
        }


        function SetRouteName($RouteName)
        {
            $devTools = new DevTools();
            $devTools->setStupFileName("Route.stub");
            $GetPathRouteName = $devTools->DevToolsPath . $devTools->getStupFileName();
            $GetStubContentFile = $devTools->GetContentAnyFile($GetPathRouteName);
            $FinishRoute = "\n" . str_replace('{{Route}}' , $RouteName ,$GetStubContentFile) ;
            self::SetRouteInRoutePath($FinishRoute);

        }





        
    }
