<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ipLocale extends Model
{
    protected $connection = "mysql2";
    protected $table = 'ipLocale';
    public $timestamps = false;
    //protected $fillable = ['nome'];

    public function acessosDate($d=null){
        //$x = $idade >= 18 ? "É maior de idade" : "É menor de idade";
        $d = $d != null ? $d : date("Y-m-d");
        //dd($d);
        return $this->where('date','LIKE',$d)->get();
    }

    public function statementAccessCount($access){
        //$x = $idade >= 18 ? "É maior de idade" : "É menor de idade";
        //dd($d);
        return $this->where('siteaccess','LIKE',$access)->count();
    }


    public function statementAccess($access=null){
        $access = $access != null ? $access : '';
        //dd($access);
        return $this->where('siteaccess','LIKE',$access)->get();
    }

    



}
