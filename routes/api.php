<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() {
    return response()->json(['status' => 'Unauthorized'], 401);
});

Route::apiResource('teste','TesteController');

Route::get('teste2', function() {
    echo "teste2api";
});


Route::prefix('stats/locale')->group(function () {
    Route::get('stats', 'ipLocaleController@stats');
    Route::get('all', 'ipLocaleController@all');
    Route::get('test1/{statementAccess}', 'ipLocaleController@test1');
    
});


Route::get('stats/local/{statementAccess}', 'ipLocaleController@test1');




/*


---- SERVER ----
ssh -p1157 ronny@rsantana.us
mkdir lrv-iplocaletest
cd lrv-iplocaletest
mkdir deploy.git
cd deploy.git
git init --bare

nano hooks/post-receive
#!/bin/sh
GIT_WORK_TREE=/home/ronny/testeeeee git checkout -f

CTRL + X, y, enter
chmod +x hooks/post-receive

---- LOCAL ----
git init

git add *

git commit -m 'Alpha@000001'
# A:ALPHA, B:BETA, R:RELEASE

git remote add deploy ssh://securersantana@secure.rsantana.us:1157/securersantana/lrv-iplocaletest/deploy.git

git remote -v

git push deploy +master:refs/heads/master


*/