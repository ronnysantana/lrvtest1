<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ipLocale;

class ipLocaleController extends Controller {

    private $ipLocale;
    public $ontemDate;
    
    function __construct(ipLocale $ipLocale, Request $request) {
        $this->ipLocale = $ipLocale;
        $this->ontemDate = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
    }

    public function all(Request $request) {
        $list = ipLocale::orderBy('id','desc')->take(50)->get();
        return $list;
        
    }   


    public function stats(Request $request) {
        return response()->json([
            //"s" => $normalTimeLimit,
            "allCount" => $this->ipLocale->count(),
            "hojeCount" => $this->ipLocale->acessosDate()->count(),
            "ontemCount" => $this->ipLocale->acessosDate($this->ontemDate)->count(),
            "statementAccessCount" => [
                "rsantana_onepage" => $this->ipLocale->statementAccessCount("RSANTANA.US/ONEPAGE"),
                "pradotour_combr" => $this->ipLocale->statementAccessCount("PRADOTOUR.COM.BR"),
                "villagemuta_com" => $this->ipLocale->statementAccessCount("VILLAGEMUTA.COM"),
                "miss_monteflash_com" => $this->ipLocale->statementAccessCount("MISSMAN2017.MONTEFLASH.COM"),
                
            ],
        ]);
        
    }

    public function test1(Request $request){
        //$x = $idade >= 18 ? "É maior de idade" : "É menor de idade";
        //dd($d);
        $request->statementAccess = str_replace('-', '/', $request->statementAccess);
        $request->statementAccess = str_replace('_', '.', $request->statementAccess);
        return response()->json([
            "allCount" => $this->ipLocale->statementAccess($request->statementAccess)->count(),
            "all" => $this->ipLocale->statementAccess($request->statementAccess)->take(1),
        ]);
    }

    


}
