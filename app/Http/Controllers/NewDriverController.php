<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Garbage;

class NewDriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::pluck('userName', 'id');
        $garbages = Garbage::where('level', '>', 50)->get();

        return view('driver.index', compact('drivers', 'garbages'));
    }

    public function assignDriver(Request $request)
{
    try {
        $driverData = $request->all();
        
        foreach ($driverData as $garbageId => $driverId) {
            // Find the driver record
            $driver = Driver::where('userName', $driverId)->first();
            if (!$driver) {
                throw new \Exception('Invalid driver username');
            }
            
            // Assign the garbage ID to the assignedto column
           // $driver->assignedto = $garbageId;
            //$driver->save();
            $assignedTo = json_decode($driver->assignedto, true) ?? [];
            $assignedTo[] = $garbageId;
            $driver->assignedto = json_encode($assignedTo);
            $driver->save();
        }

        // Redirect back with success message
        return redirect()->route('drivers.index')->with('success', 'Drivers assigned successfully');
    } catch (\Exception $e) {
        // Log the error or handle it as needed
        // You can also add some debugging statements to help identify the issue
        dd($e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'Error assigning drivers');
    }
}
//new
/*
public function showChart()
{
    // Retrieve the assigned bins data from the Driver model or any other relevant logic
    $assignedBins = Driver::pluck('assignedto');

    // Retrieve the levels data from the Garbage model or any other relevant logic
    $levels = Garbage::pluck('level');

    return view('driver.chart', compact('assignedBins', 'levels'));
}
*/

}
