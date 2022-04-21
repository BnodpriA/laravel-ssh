<?php

use Illuminate\Support\Facades\Route;
// require_once base_path('vendor/spatie/ssh/src/Ssh.php');
use Spatie\Ssh\Ssh;
use App\Http\Controllers\CommandSenderController;
use DivineOmega\SSHConnection\SSHConnection;

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
    $connection = (new SSHConnection())
                 ->to('127.0.0.1')
                 ->onPort(49155)
                 ->as('root')
                 ->withPassword('Binod@12345')
                 ->connect();

    if ($connection) {
        $command = $connection->run('ls');
        return view('welcome')->with('output', json_encode($command->getOutput()));
    } else {
        return 'failed to connect';
    }
                 
    //return view('welcome');
});
Route::post('/send/{cmd}', [CommandSenderController::class, 'sendCommand'])->name('send');