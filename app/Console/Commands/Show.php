<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Console\Commands\InheritanceAllClasses;
use App\Console\Commands\DevTools;
use App\Console\Commands\MakeView;
use App\helper;
use File;
use Illuminate\Support\Str;

class Show extends MakeView {
    use InheritanceAllClasses;

        private $StubBodyShow = "platform\DevTools\HeaderShow.stub";
        private $_StubTable = "platform\DevTools\TableShow.stub";
        private $_CodeAll;
        private $_Result;

        function setCodeAll($Code)
        {
            $this->_CodeAll = $Code;
        }

        function CodeAll()
        {
            return $this->_CodeAll;
        }

        function HeaderPage($NM)
        {
             $this->_Result = "@extends(\"CRUD\")" . "\n@section(\"$NM\")\n";
        }

        function BodyPage($NM)
        {
             $this->_Result  .= DevTools::GetSubAnyFile($this->StubBodyShow);
        }

        function TableFunction($NM)
        {
            $this->HeaderPage($NM);
            $this->BodyPage($NM);

            $Table = DevTools::GetSubAnyFile($this->_StubTable);
            $this->_Result = str_replace("{{ Code }}",$Table, $this->_Result ,$i);
        }


        function AddUpdateInTable($NM)
        {
            $LowerCase = InheritanceAllClasses::FirstLowerCase($NM);

            // return
        }

        function ChangeCh( $tag , $NM)
        {
            $StringColumn =  InheritanceAllClasses::ColumnDataBaseAnyNameTable($NM);
            $words = explode(",", $StringColumn);
            $Line = "";
                switch ($tag) {
                    case 'th':
                        $Line .= "<tr>
                            <th>Name</th>
                            <th>Action</th>
                            </tr>";
                        break;
                    case 'td':
            for ($i = 0 ; $i < count($words) ; $i++)
            {
                // $First = InheritanceAllClasses::FirstLowerCase($NM);
                $Line .=  "<tr>
                <$tag>$words[$i]</$tag>
                <$tag>{{" . "$" . "$NM->" . $words[$i] . "}}</$tag>

                </tr>\n\t";
            }
                $Line .= $this->AddUpdateInTable($NM);
                        break;
                }
            return $Line;

        }


        function StartPage($NM)
        {
            $this->TableFunction($NM);
            $th =  $this->ChangeCh( "th" , $NM);
            $this->_Result = str_replace("{{TH}}",$th, $this->_Result ,$i);
            $td =  $this->ChangeCh( "td" , $NM);
            $this->_Result = str_replace("{{TD}}",$td, $this->_Result ,$i);
            // $First = InheritanceAllClasses::FirstLowerCase($NM);
            // $this->_Result = str_replace("{{ModelSmall}}",$First, $this->_Result ,$i);
            // $this->_Result = str_replace("{{Model}}",$NM, $this->_Result ,$i);
            echo $th;
            return $this->_Result;

        }

}
