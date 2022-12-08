<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenController;
use Zxing\QrReader;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\DecodeQrController;
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

 
       /*
|--------------------------------------------------------------------------
| The road below are responsible for genearting and mangeing qr code
|--------------------------------------------------------------------------
|
|
*/
Route::get('/generateqr', [GenController::class, 'index']);

Route::post('/genqr', [GenController::class, 'generateqrcode']);

Route::get('/downloadqrpdf/{qr}', [GenController::class, 'downloadqrpdf']);

Route::get('/showqr',[GenController::class, 'showqr']);

Route::post('/deleteqr/{id}', [GenController::class, 'delete']);

       /*
|--------------------------------------------------------------------------
| The route below are responsible for sanning or rather reading qr from 
users
|--------------------------------------------------------------------------
|
|
*/
Route::get('/decodeqr',[DecodeQrController::class, 'index']);
Route::post('/scanqr',[DecodeQrController::class, 'scanqr']);


Route::get('/', function () {
 return view('welcome');
});
