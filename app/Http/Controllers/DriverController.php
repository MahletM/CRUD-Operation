<?php

namespace App\Http\Controllers;
use App\Models\Driver;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('driver', ['drivers'=>$drivers, 'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('driver', ['drivers'=>$drivers, 'layout'=>'create']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->reg = $request->input('reg');
        $driver->firstName = $request->input('firstName');
        $driver->lastName = $request->input('lastName');
        $driver->userName = $request->input('userName');
        $driver->email = $request->input('email');
        $driver->phonenumber = $request->input('phonenumber');
        $driver->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        $drivers = Driver::all();
        return view('driver', ['drivers'=>$drivers, 'driver'=>$driver,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        $drivers = Driver::all();
        return view('driver', ['drivers'=>$drivers, 'driver'=>$driver,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::find($id);
        $driver->reg = $request->input('reg');
        $driver->firstName = $request->input('firstName');
        $driver->lastName = $request->input('lastName');
        $driver->userName = $request->input('userName');
        $driver->email = $request->input('email');
        $driver->phonenumber = $request->input('phonenumber');
        $driver->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect('/');
    }
}
