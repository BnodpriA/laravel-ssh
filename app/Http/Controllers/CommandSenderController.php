<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Ssh\Ssh;

class CommandSenderController extends Controller
{
    //
    public function sendCommand(Request $request)
    {
        $command = $request->command;
        $user = 'root';
        $host = '127.0.0.1';
        $port = 49155;
        $process = Ssh::create($user, $host, $port)->execute($command);
        if ($process) {
            // $process->execute('ls');
            $output = $process->getOutput();
            return view('result')->with('output', json_encode($output));
            // return $process->getOutput();
            // return 'connected';
            
            //return $ouput as json 
            //  return response()->json(['output' => $output]);

        } else {
            return 'failed to connect';
        }
        return $command;
    }
}
