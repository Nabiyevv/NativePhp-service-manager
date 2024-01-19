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
        shell_exec('systemctl start ' . $request->input('serviceName'));
        $output = shell_exec('systemctl status ' . $request->input('serviceName'));

        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }

    public function stop(Request $request)
    {
        // dd($request->input('serviceName'));
        Service::where('name', $request->input('serviceName'))
            ->update(['status' => false]);
        // dd($request->input('serviceName'));
        shell_exec('systemctl stop ' . $request->input('serviceName'));
        $output = shell_exec('systemctl status ' . $request->input('serviceName'));

        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }

    public function restart(Request $request)
    {
        Service::where('name', $request->input('serviceName'))
            ->update(['status' => true]);
        shell_exec('systemctl restart ' . $request->input('serviceName'));
        $output = shell_exec('systemctl status ' . $request->input('serviceName'));
        sleep(2);
        $isActive = strpos($output, 'Active: active') !== false;
        return response()->json(['success' => true, 'command' => $output, 'isActive' => $isActive]);
    }


    public function addAllServices(Request $request)
    {
        $services = shell_exec('systemctl list-unit-files --type=service --no-pager');
        $lines = explode("\n", trim($services));

        $serviceArray = [];

        // Iterate over the lines and add each line as an array to the main array
        foreach ($lines as $line) {
            $serviceInfo = preg_split('/\s+/', trim($line));
            if(isset($serviceInfo[2]))
                if(!strpos($serviceInfo[0], '@') !== false)
                {
                    if($serviceInfo[2] == 'enabled')
                        $serviceArray[] = ['name' => $serviceInfo[0],'status' => true];
                    else
                        $serviceArray[] = ['name' => $serviceInfo[0],'status' => false];
                }
        }
        array_pop($serviceArray);
        array_pop($serviceArray);
        array_shift($serviceArray);
        foreach ($serviceArray as $key => $service) {
            $newData  = shell_exec('systemctl status ' . $service['name'] . ' --no-pager');
            $newData = explode("\n", trim($newData), 2);
            $newData = explode(" - ", $newData[0])[1] ?? null;
            if($newData != null)
                $serviceArray[$key]['description'] = $newData;
            else
                $serviceArray[$key]['description'] = 'No description';
        }
        Service::upsert($serviceArray, ['name']);
        dd('done');
        return back();
    }
}
