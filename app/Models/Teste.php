<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $table = 'test1';
    public $timestamps = false;
    protected $fillable = ['nome'];
}
