<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index(Request $request)
    {
        // $status = $request->input('status');
        // $serviceName = $request->input('serviceName');
        $services = Service::all();
        
        return view('custom', compact('services'));
    }

    public function service(Request $request)
    {
       
        return back();
    }

    public function start(Request $request)
    {
        // dd($request->input('serviceName'));
        Service::where('name', $request->input('serviceName'))
        ->update(['status' => true]);
        // dd(Service::where('name', $request->input('serviceName'))->get());
        shell_exec('systemctl start '.$request->input('serviceName'));
        $output = shell_exec('systemctl status '.$request->input('serviceName'));
        
        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }
    
    public function stop(Request $request)
    {   
        // dd($request->input('serviceName'));
        Service::where('name', $request->input('serviceName'))
        ->update(['status' => false]);
        // dd($request->input('serviceName'));
        shell_exec('systemctl stop '.$request->input('serviceName'));
        $output = shell_exec('systemctl status '.$request->input('serviceName'));
        
        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }
    
    public function restart(Request $request)
    {   
        Service::where('name', $request->input('serviceName'))
        ->update(['status' => true]);
        shell_exec('systemctl restart '.$request->input('serviceName'));
        $output = shell_exec('systemctl status '.$request->input('serviceName'));
        sleep(2);
        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }

}
