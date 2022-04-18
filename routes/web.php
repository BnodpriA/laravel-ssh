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

Route::get('/', function () {
    $ssh = new Spatie\Ssh;
    $user = 'root';
    $host = '127.0.0.1';
    $port = 49155;

    $process = $ssh->create($user, $host, $port);
    if ($process) {
        return 'connected';
    } else {
        return 'failed to connect';
    }
    
    return view('welcome');
});
