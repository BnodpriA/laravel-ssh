<?php

use Illuminate\Support\Facades\Route;
// require_once base_path('vendor/spatie/ssh/src/Ssh.php');
use Spatie\Ssh\Ssh;
use App\Http\Controllers\CommandSenderController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/send', [CommandSenderController::class, 'sendCommand'])->name('send');