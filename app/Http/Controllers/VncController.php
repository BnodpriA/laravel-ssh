<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\shellcommand\Command;

class VncController extends Controller
{
    public function getVnc()
    {
        return view('vnc');
    }
    public function sendVnc()
    {
        //return 123;
        $command = new Command('cd /home/bunny/bunny/Shell-Scripting/'); //sshpass -p  "Binod@12345" ssh root@127.0.0.1 -p 49155 -L 8081:localhost:8081
        $command->setStdIn('./hello.sh');
        dd($command->execute());
        if ($command->execute()) {
            echo $command->getOutput();
        } else {
            echo $command->getError();
            $exitCode = $command->getExitCode();
        }
        // $command->setStdIn('ls');
        // $command->execute();
        // dd($command->getOutput());
    }
}
