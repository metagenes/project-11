<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\AuthController@index')->name('public');

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', 'App\Http\Controllers\AuthController@index')->name('masuk');
    Route::post('/masuk', 'App\Http\Controllers\AuthController@masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/keluar', 'App\Http\Controllers\AuthController@keluar')->name('keluar');
    Route::get('/pengaturan', 'App\Http\Controllers\UserController@pengaturan')->name('pengaturan');
    Route::get('/profil', 'App\Http\Controllers\UserController@profil')->name('profil');
    Route::get('/tambah-admin', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::get('/user/{user}', function (){return abort(404);});
    Route::get('/kelola-admin', 'App\Http\Controllers\UserController@kelolaAdmin')->name('user.kelola-admin');
    Route::resource('user', 'App\Http\Controllers\UserController')->except('create','show');
    Route::patch('/update-pengaturan/{user}', 'App\Http\Controllers\UserController@updatePengaturan')->name('update-pengaturan');
    Route::patch('/update-profil/{user}', 'App\Http\Controllers\UserController@updateProfil')->name('update-profil');

    Route::get('/profil-desa', 'App\Http\Controllers\DesaController@index')->name('profil-desa');
    Route::patch('/update-desa/{desa}', 'App\Http\Controllers\DesaController@update')->name('update-desa');

    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');

    Route::get('/tambah-dtksd', 'App\Http\Controllers\DTKSdController@create')->name('dtksd.create');
    Route::get('/dtksd/{dtksd}', function (){return abort(404);});
    Route::get('/exportdtksd', 'App\Http\Controllers\DTKSdController@dtksdexport')->name('exportdtksd');
    Route::post('/importdtksd', 'App\Http\Controllers\DTKSdController@dtksdimport')->name('importdtksd');
    Route::resource('dtksd', 'App\Http\Controllers\DTKSdController')->except('create','show');

    Route::get('/tambah-bpnt', 'App\Http\Controllers\BpntController@create')->name('bpnt.create');
    Route::get('/bpnt/{bpnt}', function (){return abort(404);});
    Route::get('/exportbpnt', 'App\Http\Controllers\BpntController@bpntexport')->name('exportbpnt');
    Route::post('/importbpnt', 'App\Http\Controllers\BpntController@bpntimport')->name('importbpnt');
    Route::resource('bpnt', 'App\Http\Controllers\BpntController')->except('create','show');

    Route::get('/tambah-kisehat', 'App\Http\Controllers\KisehatController@create')->name('kisehat.create');
    Route::get('/kisehat/{kisehat}', function (){return abort(404);});
    Route::get('/exportkisehat', 'App\Http\Controllers\KisehatController@kisehatexport')->name('exportkisehat');
    Route::post('/importkisehat', 'App\Http\Controllers\KisehatController@kisehatimport')->name('importkisehat');
    Route::resource('kisehat', 'App\Http\Controllers\KisehatController')->except('create','show');

    Route::get('/tambah-kip', 'App\Http\Controllers\KipController@create')->name('kip.create');
    Route::get('/kip/{kip}', function (){return abort(404);});
    Route::get('/exportkip', 'App\Http\Controllers\KipController@kipexport')->name('exportkip');
    Route::post('/importkip', 'App\Http\Controllers\KipController@kipimport')->name('importkip');
    Route::resource('kip', 'App\Http\Controllers\KipController')->except('create','show');

    Route::get('/tambah-pkh', 'App\Http\Controllers\PkhController@create')->name('pkh.create');
    Route::get('/pkh/{pkh}', function (){return abort(404);});
    Route::get('/exportpkh', 'App\Http\Controllers\PkhController@pkhexport')->name('exportpkh');
    Route::post('/importpkh', 'App\Http\Controllers\PkhController@pkhimport')->name('importpkh');
    Route::resource('pkh', 'App\Http\Controllers\PkhController')->except('create','show');

    Route::get('/tambah-bpjs-mandiri', 'App\Http\Controllers\BpjsMandiriController@create')->name('bpjs-mandiri.create');
    Route::get('/bpjs-mandiri/{bpjs-mandiri}', function (){return abort(404);});
    Route::get('/exportbpjsmandiri', 'App\Http\Controllers\BpjsMandiriController@bpjsmandiriexport')->name('exportbpjsmandiri');
    Route::post('/importbpjsmandiri', 'App\Http\Controllers\BpjsMandiriController@bpjsmandiriimport')->name('importbpjsmandiri');
    Route::resource('bpjs-mandiri', 'App\Http\Controllers\BpjsMandiriController')->except('create','show');

    Route::get('/tambah-dusun', 'DusunController@create')->name('dusun.create');
    Route::resource('dusun', 'DusunController')->except('create','show');
    Route::resource('detailDusun', 'DetailDusunController')->except('create','edit');

});

Route::fallback(function () {
    abort(404);
});

