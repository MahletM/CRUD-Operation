<?php

namespace App\Http\Controllers;
use App\Models\Garbage;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class GarbageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garbages = Garbage::all();
        return view('garbage', ['garbages'=>$garbages, 'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createg()
    {
        $garbages = Garbage::all();
        return view('garbage', ['garbages'=>$garbages, 'layout'=>'createg']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeg(Request $request)
    {
        $garbage = new Garbage();
        $garbage->reg = $request->input('reg');
        $garbage->latitude = $request->input('latitude');
        $garbage->longtiude = $request->input('longtiude');
        $garbage->level = $request->input('level');
       
        $garbage->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showg($id)
    {
        $garbage = Garbage::find($id);
        $garbages = Garbage::all();
        return view('garbage', ['garbages'=>$garbages, 'garbage'=>$garbage,'layout'=>'showg']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editg($id)
    {
        $garbage = Garbage::find($id);
        $garbages = Garbage::all();
        return view('garbage', ['garbages'=>$garbages, 'garbage'=>$garbage,'layout'=>'editg']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateg(Request $request, $id)
    {
        $garbage =Garbage::find($id);
        $garbage->reg = $request->input('reg');
        $garbage->latitude = $request->input('latitude');
        $garbage->longtiude = $request->input('longtiude');
        $garbage->level = $request->input('level');
        
        $garbage->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyg($id)
    {
        $garbage = Garbage::find($id);
        $garbage->delete();
        return redirect('/');
    }
}
